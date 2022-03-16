<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="contact-form spad">
        <div class="container">
            <!-- <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form> -->

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