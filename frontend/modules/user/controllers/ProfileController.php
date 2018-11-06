<?php
/**
 * Created by PhpStorm.
 * User: Murzik
 * Date: 05.11.2018
 * Time: 18:40
 */

namespace frontend\modules\user\controllers;


use frontend\models\User;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionView($id)
    {
        $user = User::find(['id' => $id])->one();
        return $this->render('view',[
        'user' => $user,
            ]);
    }


}