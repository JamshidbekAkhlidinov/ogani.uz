<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Xabarlar */

$this->title = Yii::t('app', 'Create Xabarlar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xabarlars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xabarlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
