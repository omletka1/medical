<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;


$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните форму</p>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'signup-form']);

        echo $form->field($us, 'surname')->textInput(['autofocus' => true]);
        echo $form->field($us, 'name')->textInput(['autofocus' => true]);

echo $form->field($us, 'username')->textInput(['autofocus' => true]);
echo $form->field($us, 'password')->passwordInput();
echo $form->field($us, 'password_repeat')->passwordInput();
echo $form->field($us, 'email')->textInput(['autofocus' => true]);

?>
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
    <label class="form-check-label" for="flexCheckDefault">
        Согласен с правилами
    </label>
</div>
<div class="form-group">
    <div>
        <br>

<?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>
</div>
</div>
</div>