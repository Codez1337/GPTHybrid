<?php
/*==============================================*/
/* Offerscript GPT Script
/* Version: 2.9.9 Final
/* Created By: Gregory Smith
/* 
/* http://www.offerscript.com/
/* http://www.offerscript.net/
/*
/* COPYRIGHT AND LICENSE NOTICE
/* This script is not released under GNU/GPL
/* Opensource and can not be resold. Taking code
/* from this script can not be used in other
/* scripts and/or then resold as your own creation.
/* 
/* All Copyrights Must stay intact in all files.
/* All Powered By areas must stay intact, you
/* are not allowed to remove these under any
/* circumstances.
/*==============================================*/
include 'connect.php';
include 'includes/config.php';
include "header.php";

$ip = $_SERVER['REMOTE_ADDR'];
$checkbanned  = $os_DB->query("select * from banned where ip_addr='$ip'");
while($reason = $os_DB->fetch($checkbanned))
{
	if($os_DB->num($checkbanned) != 0)
	{
		//Banned account error
		print "<p>".$error_msg['17']."</p>";
		include "footer.php";
		exit;
	}
}
?>