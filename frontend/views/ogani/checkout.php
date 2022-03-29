<?php

use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = "Checkout";
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            
            <?php $form = ActiveForm::begin();?>

            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <?=$form->field($model,'first_name');?>
                        </div>
                        <div class="col-lg-6">
                            <?=$form->field($model,'last_name');?>
                        </div>
                    </div>
                    <?=$form->field($model,'address');?>
                    <div class="row">
                        <div class="col-lg-6">
                            <?=$form->field($model,'email');?>
                        </div>
                        <div class="col-lg-6">
                            <?=$form->field($model,'phone')->widget(MaskedInput::class,[
                                'mask'=>'+999-99-999-9999',
                            ]);?>
                        </div>
                    </div>
                </div>
           
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <?php foreach($_SESSION['card'] as $product): ?>
                                <li><?=$product['name']?> <span>$<?=$product['price_new']*$product['soni']?></span></li>
                                <?php endforeach;?>
                            </ul>
                            <div class="checkout__order__total">Total <span>$<?=$_SESSION['card.sum']?></span></div>

                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>

            <?php ActiveForm::end();?>


        </div>
    </div>
</section>
<!-- Checkout Section End -->