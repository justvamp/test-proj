<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Сауны в Вологде',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'bootstrap',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		// for different helpers
		'application.helpers.*',
		// for yii-user
		'application.modules.user.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		// for rights
		'application.modules.rights.*',
		'application.modules.rights.models.*',
		'application.modules.rights.components.*',
	),

	'modules'=>array(
		// for rights
		'rights' => array(
			//'install' => true, // uncomment only for installing the module
			'superuserName' => 'Admin',
			'userClass' => 'User', // model class, that contains users
			'userIdColumn' => 'id',
			'userNameColumn' => 'username',
		),
		// for yii-user, as well
		'user' => array(
			'tableUsers' => 'tbl_users',
			'tableProfiles' => 'tbl_profiles',
			'tableProfileFields' => 'tbl_profiles_fields',
			'registrationUrl' => array('/register'),
			'captcha' => array('registration'=>false),
		),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			// the next lines are for amazing bootstrap extension
			'generatorPaths'=>array(
				'bootstrap.gii',
			),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			// for yii-user, too
			'loginUrl'=>array('site/login'),
			//'loginUrl'=>array('site/index'),
			// for rights
			'class'=>'RWebUser',
		),
		// uncomment the following to enable URLs in path-format

		// for rights, again
		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('Authenticated','Guest'), // default role
		),

		// for bootstrap
		'bootstrap'=>array(
			'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
			'coreCss'=>true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
			'responsiveCss'=>true, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
			'plugins'=>array(
				// Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
				// To prevent a plugin from being loaded set it to false as demonstrated below
				'transition'=>true, // disable CSS transitions
				'tooltip'=>array(
					'selector'=>'a.tooltip', // bind the plugin tooltip to anchor tags with the 'tooltip' class
					'options'=>array(
						'placement'=>'bottom', // place the tooltips below instead
					),
				),
            // If you need help with configuring the plugins, please refer to Bootstrap's own documentation:
            // http://twitter.github.com/bootstrap/javascript.html
			),
		),
		
		'cache'=>array(
            'class'=>'system.caching.CApcCache',
        ),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'register'=>'/user/registration',
			),
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=sauna',
			'username' => 'root',
			'password' => '',

			'emulatePrepare' => true,			
			'charset' => 'utf8',
			// для работы дебаг-панели
			'enableParamLogging' => true,
			'enableProfiling' => true,
			// для кэширования запросов SHOW COLUMNS FROM и SHOW CREATE TABLE
			//'schemaCachingDuration' => 10, // кол-во секунд, когда данные в кэше валидны
			//'schemaCachingExclude'=>array(), // список таблиц, метаданные которых кэшировать не нужно
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				array(
					'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					//'ipFilters'=>array('127.0.0.1','192.168.1.215'), // localhost only by default
				),				
				
			),
		),
	),

	'language' => 'ru',
	
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'siteTitle'=>'Сауны в Вологде',
		'adminEmail'=>'webmaster@example.com',
		'imgPath'=>'/photos/',
		//'companyName'=>'ООО "Фотоходы"',
		//'companyPhone'=>'(8172) 70-00-00',
		//'image_not_found_address'=>'img/img_not_found.jpg',
	),
);