<?php 
/*==============================================*/
/* Hybrid GPT Script
/* Version: 0.1a
/* Created By: Gregory Smith & Casey Carson
/* 
/* http://www.offerscript.net/
/*
/* COPYRIGHT AND LICENSE NOTICE
/* This script is not released under GNU/GPL
/* Opensource and can not be resold. Taking code
/* from this script can not be used in other
/* scripts and/or then resold as/is your own creation.
/* 
/* All Copyrights Must stay intact in all files.
/* All Powered By areas must stay intact, you
/* are not allowed to remove these under any
/* circumstances.
/*==============================================*/
/* connect.php
/*==============================================*/

include "database.php";

$os_DB = new PDO('mysql:host='.$DB['hostname'].';dbname='.$DB['database'].';charset=utf8', $DB['username'], $DB['password']);
$os_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$os_DB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$mintime15 = time() - ( 60 * 15 );
$timeminus24 = time() - ( 60 * 60 * 24 );
$timeminus1 = time() - (60 * 60);

$time=time();
date_default_timezone_set('America/New_York');
$date=date("d M Y H:i",$time);
?>