<?php

namespace app\controllers;


use app\forms\good\CreateForm;
use app\forms\good\UpdateForm;
use app\models\Good;
use app\models\search\GoodSearch;
use app\services\GoodService;
use yii\base\Module;
use yii\web\Controller;

class GoodController extends Controller
{

    private $service;

    public function __construct($id, Module $module, GoodService $service, array $config = [])
    {
        $this->service = $service;

        parent::__construct($id, $module, $config);
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GoodSearch();

        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        return $this->render('index' , [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CreateForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            if ($this->service->create($model)){

                \Yii::$app->session->setFlash('success', 'Товар '. $model->title .' успешно добавлен');

                return $this->redirect('/good');
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $good = Good::findOne($id);

        $good->delete();

        \Yii::$app->session->setFlash('success', 'Товар '. $good->title .' Успешно удален');

        return $this->redirect('/good');
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        $model = UpdateForm::findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            if ($this->service->update($model)){

                \Yii::$app->session->setFlash('success', 'Товар '. $model->title .' успешно обновлен');

                return $this->redirect('/good');

            }else

                \Yii::$app->session->setFlash('error', 'Ошибка обновления товара '. $model->title);

        }

        return $this->render('update', [

            'model' => $model

        ]);


    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $good = Good::findOne($id);

        return $this->render('view', [

            'good' => $good

        ]);
    }
}