<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Javoblar */

$this->title = Yii::t('app', 'Create Javoblar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Javoblars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="javoblar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
