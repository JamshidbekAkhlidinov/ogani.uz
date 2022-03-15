<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\People;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PeopleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Peoples');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create People'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>'status',
                'format'=>'html',
                'value'=>function($data){
                    if($data->status==0){
                        $message = "<span class='label label-success'>Yangi buyurtma</span>";
                    }else{
                        $message = "<span class='label label-primary'>Ko'rildi</span>";

                    }
                    return $message;
                }
            ],
            // 'first_name',
            [
                'attribute'=>'first_name',
                'format'=>'html',
                'value'=>function($data){
                    return Html::a($data->first_name,url::to(['people/view','id'=>$data->id]));
                }
            ],
            'last_name',
            // 'email:email',
            'address',
            'phone',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, People $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
