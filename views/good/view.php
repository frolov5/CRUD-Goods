<?php
/**
 * @var $this \yii\web\View
 * @var $good \app\models\Good
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Товар'
?>

<div class="col-md-12">

    <?= Html::tag('h1', Html::encode($this->title), ['class' => 'text-center']) ?>

    <?= DetailView::widget([
        'model' => $good,
        'attributes' => [
            'title',
            'price',
            'description',
            'category_id',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <?= Html::a('Список товаров', ['index'], ['class' => 'btn btn-primary pull-right']) ?>

</div>

