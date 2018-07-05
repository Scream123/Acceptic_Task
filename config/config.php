<?php
/**
 *Файл настроек  шаблонизатора Smarty
 */
//> константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

$base_url='http://accepticnew.loc:81';
define('BaseUrl', $base_url);
//<
//> Используемый шаблон
$template = 'default';

//пути к файлам шаблонов (*.tpl)
define('TemplatePrefix',"/views/{$template}/");

define('TemplatePostFix', '.tpl');

// Пути к файлам шаблонов в вебпространстве
//define('TemplateWebPath', "/templates/{$template}/");


//> Инициализация шаблонизатора Smarty
// put full path to Smarty.class.php
require (ROOT .'/library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();


//место хранения шаблонов
$smarty->setTemplateDir(TemplatePrefix);
//скомпилированные шаблоны
$smarty->setCompileDir('../tmp/smarty/templates_c') ;
//конфигурация
$smarty->setConfigDir('../library/Smarty/configs');
//кеш шаблонов
$smarty->setCacheDir('../tmp/smarty/cache') ;


