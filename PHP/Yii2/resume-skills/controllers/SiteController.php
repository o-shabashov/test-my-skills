<?php

namespace app\controllers;

use app\models\Skill;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Your controller action to fetch the list
     *
     * @param string $query
     *
     * @return array
     */
    public function actionSkillsList($query)
    {
        $models = Skill::find()->byName($query)->all();
        $items  = [];

        foreach ($models as $model) {
            $items[] = ['name' => $model->name];
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $items;
    }
}
