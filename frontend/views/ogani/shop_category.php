<?php

use common\models\ShopCategory;
use yii\helpers\Url;

$category = ShopCategory::find()->where('status=1')->limit(15)->all();
$id = Yii::$app->request->get('id');

foreach($category as $cate){
    if($cate->id==$id){
        echo '<li class="pl-4 label-danger bg-primary"><a href="'.Url::to(['ogani/category','id'=>$cate->id]).'">'.$cate->category_name.'</a></li>';
    }else{
        echo '<li class=""><a href="'.Url::to(['ogani/category','id'=>$cate->id]).'">'.$cate->category_name.'</a></li>';

    }
}

?>