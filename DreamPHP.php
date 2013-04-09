<?php
/**
 * 框架入口文件
 * @author 易鹏程<yipengcheng1991@gmail.com>
 * @link http://blog.kan2020.com/
 * @copyright 2013 
 * @license http://dreamphp.kan2020.com/license/
 * @since 1.0
 */
 
 //设置时区
 date_default_timezone_set("PRC");
 
 //设置框架运行开始时间
 defined('DREAM_BEGIN_TIME') or define('DREAM_BEGIN_TIME',microtime);
 
 //设置框架目录
 defined('DREAM_PATH') or define('DREAM_PATH',dirname(__FILE__).'/');
 
 //设置框架核心文件目录
 defined('DREAM_CORE_PATH') or define('DREAM_CORE_PATH',DREAM_PATH.'Core/');
 
 //设置框类库目录
 defined('DREAM_LIBRARIES_PATH') or define('DREAM_LIBRARIES_PATH',DREAM_PATH.'Libraries/');
 
 //设置项目的默认名称,如果没有设置则使用当前文件名来作为项目名称
 defined('PROJECT_NAME') or define('PROJECT_NAME', ucfirst(pathinfo($_SERVER['SCRIPT_FILENAME'],PATHINFO_FILENAME)));
 
 //设置项目目录路径,如果没有设置则使用当前文件所在的路径加项目名称作为项目目录
 defined('PROJECT_PATH') or define('PROJECT_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/'.PROJECT_NAME);
 
 //设置项目控制器目录
 defined('Controller_PATH') or define('Controller_PATH',PROJECT_PATH.'/Controller/');
 
 //设置项目模型目录
 defined('Model_PATH') or define('Model_PATH',PROJECT_PATH.'/Model/');
 
 //设置项目模版目录
 defined('TEMPLATE_PATH') or define('TEMPLATE_PATH',PROJECT_PATH.'/Tpl/');
 
 //设置系统包含目录
 $system_include = get_include_path();
 $system_include .= PATH_SEPARATOR.DREAM_CORE_PATH; //包含框架核心类目录
 $system_include .= PATH_SEPARATOR.Controller_PATH; //包含控制器目录
 
 //设置include包含文件所在的所有目录
 set_include_path($system_include);
 
 //加载框架方法库
 include DREAM_LIBRARIES_PATH.'function.inc.php';

 //项目不存在则创建项目
 if(!file_exists(Controller_PATH)){
 	dream_create_project();
 }
