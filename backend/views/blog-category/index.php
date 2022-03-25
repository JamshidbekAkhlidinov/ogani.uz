<?php

use common\models\BlogCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blog Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Blog Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'status',
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
            // 'img',
            [
                'attribute'=>'img',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img(url::to('/backend/web/imgs/blogcategory/'.$data->img),['width'=>'100px']);
                }
            ],
            'created_at:date',
            'updated_at:date',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlogCategory  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
