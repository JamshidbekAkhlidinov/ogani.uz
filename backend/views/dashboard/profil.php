<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
$user = Yii::$app->user->identity;
?>
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?=url::to('/backend/web/imgs/user/'.$user->img)?>"
                        alt="User profile picture">
                    <h3 class="profile-username text-center"><?=$user->name??"Admin"?></h3>
                    <ul class="list-group list-group-unbordered">
                        <!-- <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?=$user->email??"jk@example.com"?></a>
                        </li> -->
                        
                    </ul>
                    <a href="<?=url::to(['dashboard/logout'])?>" class="btn btn-primary btn-block"><b>Chiqish</b></a>
                </div>

            </div>


           

        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">About Me</a></li>
                    <li><a href="#timeline" data-toggle="tab">Edit Name</a></li>
                    <li><a href="#settings" data-toggle="tab">Edit Pasword</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                    <div>
               

                <div class="box-body">

                    <strong><i class="fa fa-book margin-r-5"></i> Name</strong>
                    <p class="text-muted">
                        <?=$user->name?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-book margin-r-5"></i> Email</strong>
                    <p class="text-muted">
                        <?=$user->email?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-book margin-r-5"></i> Username</strong>
                    <p class="text-muted">
                        <?=$user->username?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-book margin-r-5"></i> Ro'yxatdan o'tgan</strong>
                    <p class="text-muted">
                        <?=date('d-M Y H:i:s',$user->created_at)?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-book margin-r-5"></i> Taxrirlangan</strong>
                    <p class="text-muted">
                        <?=date('d-M Y H:i:s',$user->updated_at)?>
                    </p>
                    
                </div>

            </div>

                    </div>

                    <div class="tab-pane" id="timeline">

                   <?php $form  = ActiveForm::begin(['options'=>[
                    //    'class'=>"form-horizontal",
                   ]]); ?>

                   <?=$form->field($model,'name',['template'=>"<div class='form-group'>\n<div class='col-sm-2 control-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10 form-group'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>
                   
                   <?=$form->field($model,'username',['template'=>"<div class='form-group'>\n<div class='col-sm-2 control-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10 form-group'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>

                   <?=$form->field($model,'email',['template'=>"<div class='form-group'>\n<div class='col-sm-2 control-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10 form-group'>{input}</div>\n{error}\n{hint}\n</div>"])->textInput()?>
                   
                   <?=Html::submitButton("Saqlash",['class'=>'btn btn-success'])?>
                   
                   <?php ActiveForm::end()?>
                     
                    </div>

                    <div class="tab-pane" id="settings">
                    <?php $form  = ActiveForm::begin(['options'=>[
                    //    'class'=>"form-horizontal",
                   ]]); ?>

                   <?=$form->field($parol,'parol0',['template'=>"<div class='form-group'>\n<div class='col-sm-2 control-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10 form-group'>{input}</div>\n</div>"])->passwordInput()?>
                   
                   <?=$form->field($parol,'parol1',['template'=>"<div class='form-group'>\n<div class='col-sm-2 control-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10 form-group'>{input}</div>\n</div>"])->passwordInput()?>

                   <?=$form->field($parol,'parol2',['template'=>"<div class='form-group'>\n<div class='col-sm-2 control-label'>{beginLabel}\n{labelTitle}\n{endLabel}</div>\n<div class='col-sm-10 form-group'>{input}</div>\n</div>"])->passwordInput()?>
                   
                   <?=Html::submitButton("Saqlash",['class'=>'btn btn-success'])?>
                   
                   <?php ActiveForm::end()?>
                     
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>