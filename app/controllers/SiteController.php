<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => 'error.twig',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'mellon' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index.twig');
    }

    public function actionContact()
    {
        $model = new ContactForm();

        if (
            $model->load(Yii::$app->request->post()) &&
            $model->contact(Yii::$app->params['adminEmail'])
        ) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact.twig', ['model' => $model]);
    }

    public function actionAbout()
    {
        return $this->render('about.twig');
    }
}
