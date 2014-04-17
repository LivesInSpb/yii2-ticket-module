Yii2 Ticket Module
==============

Yii2 Ticket Module

## Install

Modify the composer.json of your project:

~~~
[json]
 "repositories": [
        ...
        {
          "type": "vcs",
          "url": "https://github.com/istt/yii2-ticket-module",
          "reference":"master"
        },
        ...
],
"require": {
                ...
                "istt/yii2-ticket-module":"*",
                ...
        },
~~~

Then run the following commands:

~~~
[bash]
php composer.phar update
./yii migrate/up --migratioticketath=@vendor/istt/yii2-ticket-module/migrations
~~~

Last, add the module to your config file

~~~
[php]
	'modules' => [
		...
		'ticket' => 'istt\ticket\TicketModule',
		...
	],
~~~

In your main layout file:

~~~
[php]
$items =  [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        Yii::$app->user->isGuest ?
            ['label' => 'Login', 'url' => ['/site/login']] :
            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']],
    ];
 foreach (\Yii::$app->modules as $id => $child) {
	$module = \Yii::$app->getModule($id);
	if ($module && (file_exists($phpFile = $module->getViewPath() . '/layouts/_menu' . ucfirst($id) . '.php'))) {
		$items = array_merge_recursive($items, require($phpFile));
	}
}
~~~