<?php

use common\models\ShopCategory;
use yii\helpers\Url;

$category = ShopCategory::find()->where('status=1')->limit(15)->all();
$id = Yii::$app->request->get('id');
if($id==0){
    $class = 'pl-4 bg-success';
}else{
    $class = '';
}
echo '<li class="'.$class.'"><a href="'.Url::to(['ogani/category','id'=>0]).'">Hammasi</a>';
foreach($category as $cate){
    if($cate->id==$id){
        echo '<li class="pl-4 bg-success"><a href="'.Url::to(['ogani/category','id'=>$cate->id]).'">'.$cate->category_name.'('.$cate->shopscount.')</a></li>';
    }else{
        echo '<li class=""><a href="'.Url::to(['ogani/category','id'=>$cate->id]).'">'.$cate->category_name.' ('.$cate->shopscount.')</a></li>';

    }
}

?>