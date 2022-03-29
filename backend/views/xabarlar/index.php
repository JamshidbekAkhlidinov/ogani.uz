<?php

use common\models\Xabarlar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\XabarlarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Xabarlars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xabarlar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'status',
            [
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>function($data){
                        if($data->status==0){
                            return "<span class='label label-primary'>Yangi</span>";
                        }else{
                            return "<span class=''>Ko'rildi</span>";
                        }
                }
            ],
            'name',
            'phone',
            'text:ntext',
            // 'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Xabarlar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
