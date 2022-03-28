<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="contact-form spad">
        <div class="container">
            <?php $form = ActiveForm::begin();?>
            <?=$form->field($model,'name')->textInput()?>
            <?=$form->field($model,'phone')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '+999-99-999-9999',       
                    ])->textInput(['value'=>'+998'])?>
            <?=$form->field($model,'text')->textarea()?>

            <?=Html::submitButton("Jo'natish",['class'=>'btn btn-primary'])?>

            <?php ActiveForm::end();?>



        </div>
    </div>