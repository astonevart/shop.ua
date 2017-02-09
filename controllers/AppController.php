<?php
/**
 * Created by PhpStorm.
 * User: Sansey
 * Date: 28.01.2017
 * Time: 21:06
 */

namespace app\controllers;
use yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => "$keywords"
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => "$description"
        ]);

    }
}