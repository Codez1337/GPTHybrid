<?php
$_GET['os']=strip_tags($_GET['os']);
$p=$_GET['os'];
if(isset($p))
{
	switch($p)
	{
		default:
		case "home";
		include "pages/home.php";
		break;

		case "learn";
        include "pages/how.php";
        break;

        case "jackpot";
        include "pages/jackpots.php";
        break;

        case "sitemap";
        include "pages/sitemap.php";
        break;

        case "coin-flip";
        include "pages/coin-flip.php";
        break;

        case "hi-lo";
        include "pages/hilo.php";
        break;

        case "forums";
        include "pages/forums/forums.php";
        break;

        case "cwinners";
        include "pages/contestw.php";
        break;

        case "jwinners";
        include "pages/jwinners.php";
        break;

        case "upgrade";
        include "pages/upgrades.php";
        break;

        case "promo";
        include "pages/promo.php";
        break;

        case "news";
        include "pages/news.php";
        break;
		
		case "mailbox";
        include "pages/mailbox.php";
        break;

		case "send-pm";
        include "pages/send_pm.php";
        break;
		
		case "read-pm";
        include "pages/read_pm.php";
        break;
		
		case "pm-sent";
        include "pages/msent.php";
        break;
        
		case "denied";
		include "pages/denied.php";
		break;

        case "login";
        include "pages/login.php";
        break;

        case "signup";
        include "pages/signup.php";
        break;
		
		case "rewards";
		include "pages/rewards.php";
		break;
		
        case "next";
        include "pages/auth.php";
        break;

        case "verify";
        include "pages/verify.php";
        break;

        case "offers";
		include "pages/offers.php";
		break;

        case "offers-pending";
        include "pages/pendo.php";
        break;

        case "offers-completed";
        include "pages/completedo.php";
        break;

        case "offers-reversed";
        include "pages/reversedo.php";
        break;

        case "offers-ignored";
        include "pages/ignoredo.php";
        break;

        case "cashout";
        include "pages/cashout.php";
        break;

        case "complist";
        include "pages/completed.php";
        break;

        case "profile";
        include "pages/profile.php";
        break;
        
        case "pchange";
        include "pages/passchange.php";
        break;

		case "ref";
		include "pages/ref.php";
		break;
		
		case "comp";
		include "pages/comp.php";
		break;
		
		case "rules";
		include "pages/rules.php";
		break;

		case "terms";
		include "pages/tos.php";
		break;

        case "logout";
        include "pages/logout.php";
        break;
        
        case "user";
        include "pages/user.php";
        break;
        
        case "admin";
        include "pages/admin.php";
        break;

        case "status-completed";
        include "pages/withdrawc.php";
        break;

        case "status-pending";
        include "pages/withdrawp.php";
        break;

        case "status-denied";
        include "pages/withdrawd.php";
        break;

        case "reward-completed";
        include "pages/rewc.php";
        break;

        case "reward-pending";
        include "pages/rewp.php";
        break;

        case "reward-denied";
        include "pages/rewd.php";
        break;

        case "raffle";
        include "pages/raffles.php";
        break;

        case "e-raffle";
        include "pages/enterraf.php";
        break;

        case "convert";
        include "pages/converter.php";
        break;

        case "pwall";
        include "pages/pwall.php";
        break;

        case "blvd";
        include "pages/blvd.php";
        break;

        case "virool";
        include "pages/virool.php";
        break;

        case "trialpay";
        include "pages/tpay.php";
        break;

        case "super";
        include "pages/superpoints.php";
        break;

        case "supersonic";
        include "pages/supersonic.php";
        break;

        case "jampp";
        include "pages/jampp.php";
        break;

        case "radium";
        include "pages/radium.php";
        break;

        case "plab";
        include "pages/plab.php";
        break;

        case "point-history";
        include "pages/ch.php";
        break;

        case "cash-history";
        include "pages/cch.php";
        break;

        case "locked-history";
        include "pages/chh.php";
        break;

        case "report";
        include "pages/report.php";
        break;

        case "refer";
        include "pages/refer.php";
        break;

        case "referrals";
        include "pages/referrals.php";
        break;

        case "refcontest";
        include "pages/refcontest.php";
        break;

        case "offcontest";
        include "pages/offcontest.php";
        break;

        case "ads";
        include "pages/advertise.php";
        break;

        case "ticket";
        include "pages/support.php";
        break;
        
        case "theme-switcher";
        include "pages/ts.php";
        break;

        case "shout";
        break;
    }
}
?>