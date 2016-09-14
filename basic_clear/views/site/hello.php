<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My first View Page';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-hello">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::encode($message) ?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
