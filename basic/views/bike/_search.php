<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BikeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bike-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fabricante') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'cor') ?>

    <?= $form->field($model, 'marchar') ?>

    <?php // echo $form->field($model, 'marchadocambio') ?>

    <?php // echo $form->field($model, 'proprietario') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
