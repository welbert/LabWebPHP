<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Meus Dados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-entry-data">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      Você digitou a seguinte informação: 
    </p>

    <ul>
      <li><label>Name: </label> <?=Html::encode($model->name) ?></li>
      <li><label>Email: </label> <?=Html::encode($model->email) ?></li>
    </ul>

</div>
