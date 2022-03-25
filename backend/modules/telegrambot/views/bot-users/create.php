<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\telegrambot\models\BotUsers */

$this->title = Yii::t('app', 'Create Bot Users');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bot Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
