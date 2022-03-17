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
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience"
                                        placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>