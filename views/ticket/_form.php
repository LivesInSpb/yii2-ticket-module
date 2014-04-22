<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\istt\ticket\models\Ticket $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suggestion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cause')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solution')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requested_at')->textInput() ?>

    <?= $form->field($model, 'replied_at')->textInput() ?>

    <?= $form->field($model, 'fixed_begin')->textInput() ?>

    <?= $form->field($model, 'fixed_end')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'customer_fullname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'customer_company')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'customer_email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'system')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hardware_type')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hardware_part')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hardware_serial')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('ticket', 'Create') : Yii::t('ticket', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
