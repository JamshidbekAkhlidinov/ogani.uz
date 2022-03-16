<?php

use yii\bootstrap4\Html as Bootstrap4Html;
use yii\bootstrap\Html as BootstrapHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Coments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Coments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coments-view">

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
                 return Bootstrap4Html::a($data->blogs->title,Url::to(['blog/view','id'=>$data->blogs->id]));
              }
            ],
            'phone',
            'name',
            'text:ntext',
            // 'status',
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
            // 'created_at',
            // 'updated_at',
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
        ],
    ]) ?>

</div>
