<?php

use common\models\ShopCategory;
use yeesoft\multilingual\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

$category = ShopCategory::find()->orderBy('created_at DESC')->all();
$data = ArrayHelper::map($category,'id','category_name');

?>

<div class="shop-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="col-lg-6">

    <?=$form->languageSwitcher($model)?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'shipping')->textInput() ?>
    <?= $form->field($model, 'content')->textArea(['rows'=>10]) ?>

    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
    'data' => $data,
    'options' => [
        'placeholder' => 'Select a color ...', 
        // 'multiple' => true,
    ],
    'pluginOptions' => [
        // 'tags' => true,
        'maximumInputLength' => 10
    ],
    ]);
    ?>
    </div>

   
    <div class="col-lg-6">

    <?= $form->field($model, 'weight')->textInput() ?>
    <?= $form->field($model, 'sale')->textInput() ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price_new')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->dropdownList(['1'=>"Aktiv",'0'=>'Aktiv emas']) ?>

    <?= $form->field($model, 'img[]')->widget(FileInput::classname(), [
        'name' => 'attachment_49[]',
        'pluginOptions' => [
            'showPreview' => false,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'previewFileType' => 'image'
        ],
        'options' => ['multiple' => true, 'accept' => 'image/*'],

    ]); ?>


    </div>


    <div class="col-lg-12">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
    </div>
    </div>






  

    <?php ActiveForm::end(); ?>

</div>