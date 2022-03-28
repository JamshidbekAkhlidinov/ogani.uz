<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Home */

$this->title = Yii::t('app', 'Create Home');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Homes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
