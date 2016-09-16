<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bike */

$this->registerJsFile('@web/js/jquery.inputmask.bundle.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsfile('@web/js/maskBikeCreate.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'Create Bike';
$this->params['breadcrumbs'][] = ['label' => 'Bikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
