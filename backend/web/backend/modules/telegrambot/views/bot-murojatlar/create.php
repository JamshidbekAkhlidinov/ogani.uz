<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\telegrambot\models\BotMurojatlar */

$this->title = Yii::t('app', 'Create Bot Murojatlar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bot Murojatlars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-murojatlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
