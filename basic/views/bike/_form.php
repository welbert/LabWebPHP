<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bike */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bike-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fabricante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marchar')->dropDownList([ 'sim' => 'Sim', 'nao' => 'Nao', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'marchadocambio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proprietario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
