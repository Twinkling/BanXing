<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/7
 * Time: 15:43
 */
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");
error_reporting(E_ALL^E_DEPRECATED^E_NOTICE);
session_start();
require_once('config.php');
require_once('framework/XT.php');
XT::run($config);