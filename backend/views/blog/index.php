<?php

use common\models\Blog;
use yii\bootstrap4\Html as Bootstrap4Html;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blogs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Blog'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'img',
            // 'category_id',
            // 'status',
            // 'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'attribute'=>'img',
                'format'=>'html',
                'value'=>function($data){
                    return Bootstrap4Html::img(url::to('/backend/web/imgs/blogs/'.$data->img),['width'=>'100px']);
                }
            ],
            [
                'attribute'=>'category_id',
                'format'=>'html',
                'value'=>function($data){
                    return $data->category->category_name;
                }
            ],
            'title',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Blog $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
