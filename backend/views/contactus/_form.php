<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Contactus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contactus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6">
    <?= $form->field($model, 'logo')->widget(FileInput::class,[
         'pluginOptions' => [
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
    ],
   ]) ?>

<?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '+999-99-999-99-99',
]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


  
    </div>
  
    <div class="col-lg-6">
        
    


    <?=$form->languageSwitcher($model)?>

    <?= $form->field($model, 'location')->textArea(['rows'=>5]) ?>
    <?= $form->field($model, 'support_time')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'open_time')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
    </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
