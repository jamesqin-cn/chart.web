<?php

// ȫ������
define("DEBUG",			false);
define('WEB_ROOT',		dirname($_SERVER['SCRIPT_NAME']));
define('DOC_ROOT',		$_SERVER['DOCUMENT_ROOT'] . WEB_ROOT);
	
// Ŀ¼����
define('CONF_DIR',		'configs');
define('CTRLLER_DIR',	'controllers');
define('MODEL_DIR',		'models');
define('VIEW_DIR',		'views');
define('SCRIPT_DIR',	'scripts');
define('TMPL_DIR',		'templates');
define('LOG_DIR',		'logs');
define('CACHE_DIR',		'caches');
define('LANG_DIR',		'langs');

// ·������
define('CONF_PATH',     DOC_ROOT . '/' . CONF_DIR);
define('CTRLLER_PATH',  DOC_ROOT . '/' . CTRLLER_DIR);
define('MODEL_PATH',    DOC_ROOT . '/' . MODEL_DIR);
define('VIEW_PATH',     DOC_ROOT . '/' . VIEW_DIR);
define('SCRIPT_PATH',   DOC_ROOT . '/' . VIEW_DIR . '/' . SCRIPT_DIR);
define('TMPL_PATH',     DOC_ROOT . '/' . TMPL_DIR);
define('LOG_PATH',      DOC_ROOT . '/' . LOG_DIR);
define('CACHE_PATH',	DOC_ROOT . '/' . CACHE_DIR);
define('LANG_PATH',		DOC_ROOT . '/' . LANG_DIR);

// ��־����
define('LOG_LEVEL',		Zend_Log::DEBUG);									// ��־���˼���
define('LOG_NAME',		LOG_PATH . '/message' . date('Y-m-d') .'.log');		// ��־�ļ�

// ģ������
define('TMPL_STYLE',    'default');
define('TMPL_WEBPATH',	WEB_ROOT . '/' . TMPL_DIR . '/' . TMPL_STYLE);

// ��������
define('CONF_NAME',     CONF_PATH . '/config.ini');

?>
