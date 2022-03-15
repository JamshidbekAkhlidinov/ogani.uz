<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\People */

$this->title = Yii::t('app', 'Create People');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peoples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
