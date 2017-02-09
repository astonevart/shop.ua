<?php
/**
 * Created by PhpStorm.
 * User: Sansey
 * Date: 28.01.2017
 * Time: 21:05
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\controllers\AppController;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $this->setMeta('E-SHOPER');
        $hits = Product::find()->where(['hit'=>1])->limit(6)->all();
       return $this->render('index', compact('hits'));
    }

    public function actionView($id)

    {
        $category = Category::findOne($id);

        if (empty($category))  throw new \yii\web\HttpException(404, 'Такой категории нет');

        //получаем продукты по даному номеру(айди)
       // $products = Product::find()->where(['category_id'=>$id])->all();
        $query = Product::find()->where(['category_id'=>$id]);
        $pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>3, 'forcePageParam' => false, 'pageSizeParam'=>false]);

        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        $this->setMeta('E-SHOPER|'. $category->name,$category->keywords, $category->description);
        return $this->render('view', compact('products','pages', 'category'));
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPER|'. $q);
        if (!$q) return $this->render('search');
        $query = Product::find()->where(['like','name',$q]);
        $pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>3, 'forcePageParam' => false, 'pageSizeParam'=>false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('pages','products','q'));

    }
}





















