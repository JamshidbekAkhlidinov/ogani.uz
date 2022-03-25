<?php

use common\models\Javoblar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JavoblarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Javoblars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="javoblar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Javoblar'), ['coments/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'coments_id',
            [
                'attribute'=>'coments_id',
                'format'=>'html',
                'value'=>function(Javoblar $data){
                    return html::a($data->coments->name,url::to(['coments/view','id'=>$data->coments->id]));
                }
            ],
            'text:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Javoblar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
