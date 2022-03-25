<?php

use kartik\file\FileInput;
use yii\helpers\Html;

use kartik\switchinput\SwitchInput;
use yeesoft\multilingual\widgets\ActiveForm;

?>

<div class="blog-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6">
        <?=$form->languageSwitcher($model);?>

        <?= $form->field($model, 'status')->widget(SwitchInput::classname(), []);?>


        <?= $form->field($model, 'category_name')->textInput() ?>


        <?= $form->field($model, 'img')->widget(FileInput::class,[]); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    </div>




    <?php ActiveForm::end(); ?>

</div>