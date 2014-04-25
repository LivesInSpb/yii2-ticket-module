<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use istt\ticket\models\Ticket;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <h2><?= \Yii::t('ticket', 'Customer Information')?></h2>

  					<?= DetailView::widget([
					        'model' => $model,
  							'template' => "<strong>{label}: </strong><em>{value}</em><br>",
					        'attributes' => [
					            'customer_fullname',
					            'customer_company',
					            'customer_phone',
					            'customer_email:email',
					]]); ?>
<?php if ($model->type == Ticket::TYPE_RMA):?>
    <h2><?= \Yii::t('ticket', 'RMA Information')?></h2>

  					<?=  DetailView::widget([
					        'model' => $model,
  							'template' => "<strong>{label}: </strong><em>{value}</em><br>",
					        'attributes' => [
					            'system',
					            ['attribute' => 'priority', 'value' => is_null($model->priority)?NULL:Ticket::priorityOptions($model->priority)],
					            'created_at:datetime',
					            'updated_at:datetime',
					            'requested_at',
					            'replied_at',
					            'fixed_begin',
					            'fixed_end',
					            ['attribute' => 'status', 'value' => is_null($model->status)?NULL:Ticket::statusOptions($model->status)],
					            'site',
					            'hardware_type',
					            'hardware_part',
					            'hardware_serial',
					        ],
					    ]) ?>

  					<h3><?= Yii::t('ticket', 'Detail') ?></h3>

  					<?= kartik\markdown\Markdown::convert($model->detail); ?>

  					<h3><?= Yii::t('ticket', 'Suggestion') ?></h3>

  					<?= kartik\markdown\Markdown::convert($model->suggestion); ?>

<?php endif; ?>

<?php if ($model->type == Ticket::TYPE_CSR):?>
<h2><?= \Yii::t('ticket', 'CSR Information')?></h2>

  					<?=  DetailView::widget([
					        'model' => $model,
  							'template' => "<strong>{label}: </strong><em>{value}</em><br>",
					        'attributes' => [
					            'system',
					            ['attribute' => 'priority', 'value' => is_null($model->priority)?NULL:Ticket::priorityOptions($model->priority)],
					            'requested_at:datetime',
					            'replied_at:datetime',
					            'fixed_begin:datetime',
					            'fixed_end:datetime',
					            ['attribute' => 'status', 'value' => is_null($model->status)?NULL:Ticket::statusOptions($model->status)],
					        ],
					    ]) ?>

					<h3><?= Yii::t('ticket', 'Detail') ?></h3>

  					<?= kartik\markdown\Markdown::convert($model->detail); ?>

  					<h3><?= Yii::t('ticket', 'Suggestion') ?></h3>

  					<?= kartik\markdown\Markdown::convert($model->suggestion); ?>

  					<h3><?= Yii::t('ticket', 'Cause') ?></h3>

  					<?= kartik\markdown\Markdown::convert($model->cause); ?>

  					<h3><?= Yii::t('ticket', 'Solution') ?></h3>

  					<?= kartik\markdown\Markdown::convert($model->solution); ?>
<?php endif; ?>