<?php

use dosamigos\selectize\SelectizeTextInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'form_skills')->widget(SelectizeTextInput::className(), [
        'loadUrl'       => ['site/skills-list'],
        'options'       => ['class' => 'form-control'],
        'clientOptions' => [
            'plugins'     => ['remove_button'],
            'valueField'  => 'name',
            'labelField'  => 'name',
            'searchField' => ['name'],
            'create'      => true,
        ],
    ])->hint('Use commas to separate skills') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
