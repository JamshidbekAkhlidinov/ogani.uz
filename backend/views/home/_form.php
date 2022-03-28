<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Home */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="home-form">

    <?php $form = ActiveForm::begin(); ?>

   <div class="col-lg-6">

<?= $form->field($model, 'imgrek1')->widget(FileInput::class,[
    'pluginOptions' => [
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
    ],
]) ?>
<?= $form->field($model, 'imgrek2')->widget(FileInput::class,[
      'pluginOptions' => [
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
    ],
]) ?>

   </div>

    <div class="col-lg-6">
   <?= $form->field($model, 'img')->widget(FileInput::class,[
         'pluginOptions' => [
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
    ],
   ]) ?>
   <?=$form->languageSwitcher($model)?>
    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'btn_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
    </div>
    </div>




   

    <?php ActiveForm::end(); ?>

</div>
