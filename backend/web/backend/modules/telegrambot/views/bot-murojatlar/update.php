<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\telegrambot\models\BotMurojatlar */

$this->title = Yii::t('app', 'Update Bot Murojatlar: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bot Murojatlars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bot-murojatlar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
