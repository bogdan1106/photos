<?php
namespace frontend\controllers;

use Composer\Factory;
use frontend\models\User;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

        ];
    }



    public function actionIndex()
    {





        $users = User::find()->all();
        return $this->render('index',[
            'users' => $users,

            ]);
    }



}
