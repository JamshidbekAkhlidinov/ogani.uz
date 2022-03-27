<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BlogCategory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blog-category-view">

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
            'category_name',

            [
                'attribute'=>'status',
                'format'=>'html',
                'value'=>function($data){
                    if($data->status==0){
                        return "Aktiv emas";
                    }
                    return "Aktiv";
                }
            ],
            // [
            //     'attribute'=>'img',
            //     'format'=>'html',
            //     'value'=>function($data){
            //         return Html::img(Url::to('/backend/web/imgs/blogcategory/'.$data->img),['width'=>'100px']);
            //     }
            // ],
            'created_at:date',
            'updated_at:date',
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
