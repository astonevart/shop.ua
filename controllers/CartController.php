<?php
/**
 * Created by PhpStorm.
 * User: Sansey
 * Date: 31.01.2017
 * Time: 15:09
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use Yii;
use app\models\Order;
use app\models\OrderItems;

class CartController extends AppController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        echo '333';
        $qty = !$qty ? 1 : $qty ;
        $product = Product::findOne($id);
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));

    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));

    }

    public function actionShow()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        if ($order->load(Yii::$app->request->post()))
        {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if($order->save()) {
                //вызываем функцию которая записывает в таблицу order_item данные про товар
                $this->saveOrderItem($session['cart'],$order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Ожидайте звонок от нашего менеджера!');
                //отправляем корзину на почту
                Yii::$app->mailer->compose('order', compact('session'))
                    ->setFrom(['kpiieeon21@mail.ru'=>'sexshop.ua'])
                    ->setTo($order->email)
                    ->setSubject('Заказ з сайта shop.ua')
                    ->send();
               // очищаем корзину после отправки данных в базу
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                //просто перезагружаем страницу
                return $this->refresh();}
                    else Yii::$app->session->setFlash('error', 'Ошибка оформления заказа!');
        }
        return $this->render('view', compact('session','order'));
    }

    protected function saveOrderItem ($items, $order_id)
    {
        foreach ($items as $id=>$item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['price']*$item['qty'];
            $order_items->save();
        }
    }
}