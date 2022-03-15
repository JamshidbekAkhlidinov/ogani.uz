<?php

use common\models\Orders;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\People */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peoples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="people-view">

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
            'first_name',
            'last_name',
            'email:email',
            'address',
            'phone',
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


    <h2>Qilgan buyurtmalari</h2>
    <table class="table table-bordered table-striped">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Narxi</th>
            <th>Soni</th>
            <th>SUM</th>
        </tr>

        <?php
        
        $products = Orders::find()->where(['order_id'=>$model->id])->all();
        $n = 0; $sum =0;$soni =0;
        foreach($products as $product){ 
            $n++; $soni +=$product->product_count;
            $sum +=$product->product_sum;
            ?>

            <tr>
                <td><?=$n?></td>
                <td><?=$product->product_name?></td>
                <td><?=$product->product_price?></td>
                <td><?=$product->product_count?></td>
                <td><?=$product->product_sum?></td>   
            </tr>

        <?php

        }
        
        ?>

        <tr>
            <th colspan="4" class="text-center"> 
                Soni
            </th>
            <th>
                <?=$soni?>
            </th>
        </tr>


        <tr>
            <th colspan="4" class="text-center"> 
                Jami summa
            </th>
            <th>
                <?=$sum?>
            </th>
        </tr>



    </table>

</div>