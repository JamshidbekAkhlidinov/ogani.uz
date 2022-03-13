<?php

use common\models\ProductsImgs;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Shop */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'img',
            // 'category_id',
            [
                'attribute'=>'category_id',
                'value'=>function($data){
                    return $data->category->category_name;
                }
            ],
            'price',
            'price_new',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            [
                'attribute'=>'status',
                'format'=>'html',
                'value'=>function($data){
                    return ($data->status)?"<span class='label label-primary'>Ko'rinadi</span>":"<span class='label label-danger'>Ko'rinmaydi</span>";
                }
            ],
            [
                'attribute'=>'created_at',
                'value'=>function($data){
                    return date('d-M Y H:i',$data->created_at);
                }
            ],
            [
                'attribute'=>'updated_at',
                'value'=>function($data){
                    return date('d-M Y H:i',$data->updated_at);
                }
            ],
            [
                'attribute'=>'created_by',
                'value'=>function($data){
                    return $data->createdBy->username;
                }
            ],
            [
                'attribute'=>'updated_by',
                'value'=>function($data){
                    return $data->updatedBy->username;
                }
            ],
        ],
    ]) ?>

</div>

<h2>Rasmlar</h2>
<?php
$rasmlar = ProductsImgs::find()->where('products_id='.$model->id)->all();
foreach($rasmlar as $rasm){
    echo html::a(Html::img(Url::to('/backend/web/imgs/products/'.$rasm->name),['height'=>'200px']),url::to(['shop/delimg','id'=>$rasm->id]));
}

?>
