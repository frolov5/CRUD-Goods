<?php
/**
 * @var $this \yii\web\View
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $searchModel app\models\search\GoodSearch
 *
 */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Товары';
?>

<div class="good-search">

    <h1>
        <?= Html::tag('h1', Html::encode($this->title), ['class' => 'text-center']) ?>
    </h1>

    <div class="good-table">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-condensed table-hover'
            ],
            'columns' => [
                'id',
                'title',
                'price',
                'description',
                'category_id',
                'status',
                [
                    'class' => '\yii\grid\ActionColumn'
                ]
            ]
        ])?>

        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-primary pull-right']) ?>

    </div>

</div>


