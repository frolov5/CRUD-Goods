<?php
/**
 * @var $this \yii\web\View
 * @var $model \app\forms\good\UpdateForm
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Good;

$this->title = 'Обновление товара';
$status = Good::getStatuses();

?>

<?php $form = new ActiveForm(['method' => 'post'])?>

<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <?= Html::tag('h1', Html::encode($this->title), ['class' => 'text-center']) ?>

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'title')->textInput() ?>

        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'description')->textarea(['rows' => '10']) ?>

        <?= $form->field($model, 'category_id')->dropDownList(['Техника', 'Авто', 'Недвижимость']) ?>

        <?= $form->field($model, 'status')->dropDownList($status) ?>

        <?= Html::submitButton('Обновить товар', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>

    </div>

</div>
