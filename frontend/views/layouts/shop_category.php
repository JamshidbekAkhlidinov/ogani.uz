<?php

use common\models\ShopCategory;
use yii\helpers\Url;

$category = ShopCategory::find()->where('status=1')->limit(15)->all();

foreach($category as $cate){
    echo '<li><a href="'.Url::to(['ogani/category','id'=>$cate->id]).'">'.$cate->category_name.'</a></li>';
}

?>