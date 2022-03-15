<?php

use common\models\BlogCategory;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$category = BlogCategory::find()->where('status=1')->all();
$data = ArrayHelper::map($category,'id','category_name');

?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'img')->widget(FileInput::classname(), [
    'pluginOptions' => [
        'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        'browseLabel' =>  'Select Photo'
    ],
]);
?>

    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => 'Categoriyani tanlang'],
]); ?>

<?=$form->languageSwitcher($model)?>
    
    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'content')->textArea(['rows'=>15]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'Aktiv','0'=>'Aktiv emas']) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
