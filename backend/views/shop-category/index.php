<?php

use common\models\ShopCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Shop Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Shop Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'img',
                'format'=>'html',
                'value'=>function($data){
                    return html::img('/backend/web/imgs/shopcategory/'.$data->img,['width'=>'100px']);
                }
            ],
            'category_name',
            // 'status',
            [
                'attribute'=>'status',
                'format'=>'html',
                'value'=>function($data){
                    return ($data->status)?"<span class='label label-primary'>Ko'rinadi</span>":"<span class='label label-danger'>Ko'rinmaydi</span>";
                }
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            //'updated_by',
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ShopCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
