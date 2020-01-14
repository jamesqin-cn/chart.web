<?php
//error_reporting(E_ALL | E_NOTICE);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
date_default_timezone_set('Asia/Chongqing');

require_once 'vendor/autoload.php';

/**
 * Zend_Loader::Zend_Loader::registerAutoload is deprecated as of 1.8.0 and will be removed with 2.0.0; 
 * use Zend_Loader_Autoloader instead 
 */
// �������Զ�������
if (Zend_Version::compareVersion('1.8.0') <= 0) {
	// 1.8.0���ϵİ汾(��1.8.0)ʹ��Zend_Loader_Autoloader
	Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);
} else {
	// 1.8.0���µİ汾ʹ��Zend_Loader
	Zend_Loader::registerAutoload();
}

// ���������ļ�
require_once('./configs/defines.php');

// ��ʼ����־ģ��
$logger = new Zend_Log();
$filter = new Zend_Log_Filter_Priority(LOG_LEVEL);
$writer = new Zend_Log_Writer_Stream(LOG_NAME, 'a');
$logger->addFilter($filter);
$logger->addWriter($writer);
Zend_Registry::set('logger', $logger);

try {
	// cht������ѡ
	$charttype = $_REQUEST['cht'];
	if ((empty($charttype)) || (!file_exists('./charttype/' . $charttype . '.php'))) {
		$error = "The parameter &#39;cht={$charttype}&#39; does not match the expected format.";
		require_once(MODEL_PATH . '/BadRequestException.php');
		throw new BadRequestException($error);
	}
	
	// chs������ѡ
	if (empty($_REQUEST['chs'])) {
		$error = "The parameter 'chs' must have a width of at least 1 pixel. ";
		require_once(MODEL_PATH . '/BadRequestException.php');
		throw new BadRequestException($error);
	}
	
	// chd������ѡ
	if (empty($_REQUEST['chd'])) {
		$error = "The parameter 'chd' missing. ";
		require_once(MODEL_PATH . '/BadRequestException.php');
		throw new BadRequestException($error);
	}
	
	require_once('./charttype/'.$charttype.'.php');	
	$instance = new $charttype();
	$instance->run();
	
	$logger->info("run success, ip={$_SERVER['REMOTE_ADDR']}, url={$_SERVER['REQUEST_URI']}");
	
} catch (BadRequestException $e) {
	echo "<H1>Bad Request</H1> <br />\n";
	echo "Your client has issued a malformed or illegal request.";
	$msg = $e->getMessage();
	if (!empty($msg)) {
		echo "<ul><li>{$msg}</li></ul>";
	}
	
	$logger->err("catch " . get_class($e) . ", ip={$_SERVER['REMOTE_ADDR']}, url={$_SERVER['REQUEST_URI']}");
	
} catch (Exception $e) {
	echo "Caught PHP exception: " . get_class($e) . "<br />\n";
	echo "Message: " . $e->getMessage() . "\n";
	
	$logger->err("catch " . get_class($e) . ", ip={$_SERVER['REMOTE_ADDR']}, url={$_SERVER['REQUEST_URI']}");
}
