<?php
/**
 * Created by PhpStorm.
 * User: Sansey
 * Date: 26.01.2017
 * Time: 18:56
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'category';
    }


    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}