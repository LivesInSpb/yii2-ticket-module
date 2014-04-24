<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use istt\ticket\models\Ticket;
?>

    <h1><small><?= \Yii::t('app', 'Ticket'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <h3><?= \Yii::t('ticket', 'Customer Information')?></h3>
  					<?= DetailView::widget([
					        'model' => $model,
					        'attributes' => [
					            'customer_fullname',
					            'customer_company',
					            'customer_phone',
					            'customer_email:email',
					]]); ?>
<?php if ($model->type == Ticket::TYPE_RMA):?>
    <h3><?= \Yii::t('ticket', 'RMA Information')?></h3>
  					<?=  DetailView::widget([
					        'model' => $model,
					        'attributes' => [
					            'system',
					             ['attribute' => 'priority', 'value' => is_null($model->priority)?NULL:Ticket::priorityOptions($model->priority)],
					            ['attribute' => 'detail', 'value' => kartik\markdown\Markdown::convert($model->detail), 'format' => 'html'],
					            ['attribute' => 'suggestion', 'value' => kartik\markdown\Markdown::convert($model->suggestion), 'format' => 'html'],
					            'created_at:datetime',
					            'updated_at:datetime',
					            'requested_at',
					            'replied_at',
					            'fixed_begin',
					            'fixed_end',
					            ['attribute' => 'cause', 'value' => kartik\markdown\Markdown::convert($model->cause), 'format' => 'html'],
					            ['attribute' => 'solution', 'value' => kartik\markdown\Markdown::convert($model->solution), 'format' => 'html'],
					             ['attribute' => 'status', 'value' => is_null($model->status)?NULL:Ticket::statusOptions($model->status)],
					            'site',
					            'hardware_type',
					            'hardware_part',
					            'hardware_serial',
					        ],
					    ]) ?>
<?php endif; ?>

<?php if ($model->type == Ticket::TYPE_CSR):?>
<h3><?= \Yii::t('ticket', 'CSR Information')?></h3>
  					<?=  DetailView::widget([
					        'model' => $model,
					        'attributes' => [
					            'system',
					            ['attribute' => 'priority', 'value' => is_null($model->priority)?NULL:Ticket::priorityOptions($model->priority)],
					            ['attribute' => 'detail', 'value' => kartik\markdown\Markdown::convert($model->detail), 'format' => 'html'],
					            ['attribute' => 'suggestion', 'value' => kartik\markdown\Markdown::convert($model->suggestion), 'format' => 'html'],
					            'requested_at:datetime',
					            'replied_at:datetime',
					            'fixed_begin:datetime',
					            'fixed_end:datetime',
					            ['attribute' => 'cause', 'value' => kartik\markdown\Markdown::convert($model->cause), 'format' => 'html'],
					            ['attribute' => 'solution', 'value' => kartik\markdown\Markdown::convert($model->solution), 'format' => 'html'],
					            ['attribute' => 'status', 'value' => is_null($model->status)?NULL:Ticket::statusOptions($model->status)],
					        ],
					    ]) ?>
<?php endif; ?>