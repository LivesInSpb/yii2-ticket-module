<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use istt\ticket\models\Ticket;

/**
 * @var yii\web\View $this
 * @var istt\ticket\models\Ticket $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'CSR'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1><small><?= \Yii::t('ticket', 'CSR'); ?>:</small> <?= Html::encode($this->title) ?></h1>

				<h3><?= \Yii::t('ticket', 'Customer Information')?></h3>
  					<?= DetailView::widget([
					        'model' => $model,
  							'template' => "<tr><th class='col-xs-3'>{label}</th><td class='col-xs-9'>{value}</td></tr>",
					        'attributes' => [
					            'customer_fullname',
					            'customer_company',
					            'customer_phone',
					            'customer_email:email',
					]]); ?>
				<h3><?= \Yii::t('ticket', 'RMA Information')?></h3>
  					<?=  DetailView::widget([
					        'model' => $model,
  							'template' => "<tr><th class='col-xs-3'>{label}</th><td class='col-xs-9'>{value}</td></tr>",
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
    <p>
        <?= Html::a(Yii::t('ticket', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('ticket', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('ticket', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
