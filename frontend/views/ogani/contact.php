<?php

use common\models\Contactus;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Contact";
$this->params['breadcrumbs'][] = $this->title;
$contact =  Contactus::find()->limit(1)->orderBy('id desc')->one();



?>
<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Phone</h4>
                    <p><?=$contact->phone?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Address</h4>
                    <p><?=$contact->address?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Open time</h4>
                    <p><?=$contact->open_time?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p><?=$contact->email?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">

    <?=$contact->location?>

</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Leave Message</h2>
                </div>
            </div>
        </div>
        <?php $form = ActiveForm::begin()?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?=$form->field($model,'name',['template'=>'{input}{error}'])->textInput(['placeholder'=>yii::t('app',"Your name")])?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?=$form->field($model,'phone',['template'=>'{input}{error}'])->widget(\yii\widgets\MaskedInput::class, [
                    'mask' => '+999-99-999-9999'])->textInput(['placeholder'=>yii::t('app',"Your Phone")])?>
            </div>
            <div class="col-lg-12 text-center">
                <?=$form->field($model,'text',['template'=>'{input}{error}'])->textarea(['placeholder'=>yii::t('app',"Your message")])?>
                <?=Html::submitButton(Yii::t('app','SEND MESSAGE'),['class'=>'site-btn'])?>
            </div>

            <?php ActiveForm::end()?>
        </div>
    </div>
    <!-- Contact Form End -->
</div>