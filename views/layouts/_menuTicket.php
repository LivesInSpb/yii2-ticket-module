<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 */
return [

	['label' => \Yii::t('ticket','CSR'), 'url' => ['/ticket/csr/index']],
	['label' => \Yii::t('ticket','RMA'), 'url' => ['/ticket/rma/index']],
	['label' => \Yii::t('user', 'User'), 'url' => ['/user/admin'], 'title' => 'Administrator panel'],

];