<?php
/**
 * Created by PhpStorm.
 * User: Sansey
 * Date: 03.02.2017
 * Time: 13:15
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;


class AppAdminController extends Controller
{
    public function behaviors()
    {
// ограничываем доступ к админке
     return ['access' =>[
            'class' => AccessControl::className(),
            'rules' => [
                //разрешаем всем контролерам которые наследуют данный только с ролью "авторизованный пользователь что и укажем в roles"
               [ 'allow' => true,
                'roles' => ['@']],
            ],
    ]
     ];
    }
}