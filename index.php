<?php
/*==============================================*/
/* GPTHybrid Script Lite
/* Version: 1.0.0
/* Created By: Gregory Smith
/* Bug Testing By: Don Buck
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
/* index.php
/*==============================================*/
ob_start();
session_start();
define('OS_PB','1');
$root = (defined('OS_ROOT')) ? OS_ROOT : './';
//shoutbox autoload
require 'vendor/autoload.php';
//site settings file
$cnfig = $root.'includes/security/settings.xml';
if(file_exists($cnfig))
{
    $cfig = simplexml_load_file($cnfig);
	 /*foreach($cfig->config as $sys )
       {
         $config['$sys->name'] = "$sys->value";
       }*/
		foreach($cfig->config as $sys)
		{
			$config["$sys->name"] = "$sys->value";
		}

		if(isset($config['theme']))
		{
			require_once($root . 'connect.php');
			//class path 
			define('CLASS_DIR', $root.'includes/classes/', true);

			$croot = CLASS_DIR;

			require_once $croot."Smarty/libs/Smarty.class.php";
			$smarty = new Smarty();
			$smarty->setTemplateDir($root.'Themes/Default/');
			$smarty->setCompileDir($root.'Themes_Compile/');
			$smarty->setConfigDir($root.'Theme_Configs/');
			$smarty->setCacheDir($root.'Theme_Cache/');
			//** un-comment the following line to show the debug console
			$smarty->debugging = false;
			//
			$smarty->error_reporting = E_ALL & ~E_NOTICE;
			
			
			$smarty->assign("sitetitle", $config['site_name']);
			$smarty->assign("site_domain", $config['site_domain']);
			$smarty->assign("TD_css", $root.'Themes/Default/'.$config['theme_css_dir']);
			$smarty->assign("TD_image", $root.'Themes/Default/'.$config['theme_img_dir']);
			$smarty->assign("TD_js", $root.'Themes/Default/'.$config['theme_js_dir']);
			require_once($root . 'functions/functions.php');
			
			/*
			if($settings['captcha_type'] == 3)
			{
				require "securimage/securimage.php";
				$securimage = new Securimage();
			}
			*/
			if(isset($config['maintenance_mode']) && $config['maintenance_mode'] == 1)
			{
				require("mm.php");
				exit;
			}		
			$view = $_REQUEST['os'];
			if(isset($view))
			{
				switch($view)
				{
					case $view;
					$cview=basename($view, '.php');
					$smarty->assign('page_header', ucfirst($cview));
					$sfile="$cview.tpl";
					$fileinfo=$root.'pages/'.$view.'.php';
					if(file_exists($fileinfo))
					{
						if(isset($_SESSION['login']))
						{
							if(isset($_SESSION['userid']) && $_SESSION['userid'] != 0)
							{
								$smarty->assign("logged", 1);
							}
						}
						else
						{
							$smarty->assign("logged", 0);
						}
						if($view == "home")
						{
							$smarty->assign("oss", "active_home");
						}
						///$smarty->assign("act", "active");
						$smarty->assign("act", "");
						
						include_once($fileinfo);
					}
					else
					{
						header("HTTP/1.0 404 Not Found"); 
						include_once($root."pages/404.php");
					}
					break;
				}
			}
			else
			{
				$smarty->assign("oss", "active_home");
				$_SESSION['userid'] = 0;
				$logged = 0;
				include_once($root.'pages/home.php');
			}
		}
		else
		{
			var_dump($config['theme']);
			die("Theme Var couldn't be loaded");
		}
}
else
{
	//production sites will need this uncommented.
	die("Missing Site settings.xml");
}
//require_once($root . 'includes/config.php');

$ui = 1;
/*

//Check if IP is banned
$ip = $_SERVER['REMOTE_ADDR'];
/*$checkbanned  = $os_DB->query("SELECT * FROM banned WHERE ip_addr='$ip'");
		
while($reason = $os_DB->fetch($checkbanned))
{
	if($os_DB->num($checkbanned) != 0) 
    {
	    header("Location: site/banned");
    }
}
if($settings['proxstop_on'] == 1)
{
	//check if ip is a proxy
	require_once('includes/classes/ProxStop.php');

	// Perform Lookup
	$result = $ProxStop->proxyLookup($ip,$ref);

	// The lookup failed, print the error message.
	if($result===false)
	{
		echo 'The lookup failed with the error "'.$ProxStop->errors['code'].': '.$ProxStop->errors['msg'].'"';
	}

	// The IP is a proxy
	elseif((int)$result->score>1)
	{
		$os_DB->query("INSERT INTO banned VALUES ('$ip')");
		$os_DB->query("UPDATE accounts SET level=2 WHERE ip='$ip'");
		header("Location: site/banned");
	}
}
*/
//Save Referral
if(isset($_REQUEST['ref']) && $_REQUEST['ref'] != "")
{
	$ref = $_REQUEST['ref'];
	setcookie("Referral", $ref, time()+3600, "/", $domain);
}
$os_DB = null;
?>