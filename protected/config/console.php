<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=sauna',
			'username' => 'root',
			'password' => '',
			/*
			'connectionString' => 'mysql:host=localhost;dbname=justv185_fh',
			'username' => 'justv185_admin',
			'password' => '9mjmfG__',
			 */
			'emulatePrepare' => true,			
			'charset' => 'utf8',
			// ��� ������ �����-������
			'enableParamLogging' => true,
			'enableProfiling' => true,
			// ��� ����������� �������� SHOW COLUMNS FROM � SHOW CREATE TABLE
			//'schemaCachingDuration' => 10, // ���-�� ������, ����� ������ � ���� �������
			//'schemaCachingExclude'=>array(), // ������ ������, ���������� ������� ���������� �� �����
		),
	),
);