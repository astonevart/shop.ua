<?php
/**
 * Created by PhpStorm.
 * User: Sansey
 * Date: 30.01.2017
 * Time: 14:50
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\controllers\AppController;
use Yii;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne($id);
        if (empty($product))  throw new \yii\web\HttpException(404, 'Такого продукта нет');
        $hits = Product::find()->where(['hit'=>1])->limit(6)->all();
        $this->setMeta('E-SHOPER|'. $product->name,$product->keywords, $product->description);
        return $this->render('view', compact('product','hits'));
    }
}