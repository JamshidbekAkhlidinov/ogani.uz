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

    <?=$form->languageSwitcher($model)?>

    <?= $form->field($model, 'name')->textInput() ?>
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
    <?= $form->field($model, 'shipping')->textInput() ?>
    <?= $form->field($model, 'weight')->textInput() ?>
    <?= $form->field($model, 'content')->textArea() ?>
    <?= $form->field($model, 'sale')->textInput() ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price_new')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput() ?>

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









    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>