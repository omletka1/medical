<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); // Убрали enctype

$items = \app\models\Spektakl::find()
    ->select(['title'])
    ->indexBy('id')
    ->column();
?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'spektakl_id')->dropDownList(
    $items,
    ['prompt' => 'Выберите спектакль']
) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>