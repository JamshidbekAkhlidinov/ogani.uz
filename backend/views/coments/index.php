<?php

use common\models\Coments;
use yii\bootstrap4\Html as Bootstrap4Html;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Coments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coments-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'category_id',
            // 'owner_id',
            [
              'attribute'=>'category_id',
              'value'=>function($data){
                  if($data->category_id==1){
                      return "SHOP";
                  }else{
                      return "POST";
                  }
              }
            ],
            [
                'attribute'=>'owner_id',
                'format'=>'html',
                'value'=>function($data){
                    return Bootstrap4Html::a(substr($data->blogs->title,0,40),Url::to(['blog/view','id'=>$data->blogs->id]));

                }
              ],
            'phone',
            'name',
            //'text:ntext',
            //'status',
            [
                'attribute'=>'status',
                'format'=>'html',
                'value'=>function($data){
                   if($data->status==1){
                       return "<span class='label label-primary'>Ko'rinadi</span>";
                   }else{
                    return "<span class='label label-danger'>Ko'rinmaydi</span>";
                   }
                }
              ],
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Coments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
