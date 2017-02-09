<?php

namespace app\modules\admin;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

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
