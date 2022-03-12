<?php

namespace backend\controllers;


class DashboardController extends DefaultController
{
 
    public function actionIndex()
    {
        return $this->render('index');
    }

   
}
