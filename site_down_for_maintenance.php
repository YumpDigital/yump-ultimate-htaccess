<?
// SURFACE DIGITAL "SITE DOWN" MAINTENANCE PAGE
// To activate this maintenance page and block access to the whole site, add these lines to /app/webroot/.htaccess
// 		 RewriteCond %{HTTP_COOKIE} !SurfaceDig
//		 RewriteRule .* site_down_for_maintenance.php?until=2030 [last]		# last four digits should be the time you expect to return (24h time)

$downUntil = strtotime($_GET['until']);
$minsRemaining = ceil(($downUntil - time()) / 60);
$downUntil = date('g:ia', $downUntil);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>SITE DOWN</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style type="text/css">
		h1 { 
			margin: 0 0 30px; 
			font-size: 50px; 
			font-weight: normal; 
			xfont-style: italic;
			letter-spacing: -3px;
			xfont-family: Georgia, sans-serif;
			line-height: 1;
		}
		.wrapper { 
			background-color: #ddd; 
			color: #333; 
			margin: 150px auto; 
			max-width: 700px; 
			padding: 35px 35px 20px; 
			border-radius: 15px;
			box-shadow: 0 0px 50px #000000;
			-moz-box-shadow: 0 0px 50px #000000;
			-o-box-shadow: 0 0px 50px #000000;
			-webkit-box-shadow: 0 0px 50px #000000;			
		}
		body { 
			font-family: Open Sans, sans-serif;
			font-weight: 300;
			font-size: 120%;
			background: #222;
			line-height: 1.8;
		}
		a { font-weight: bold; color: #444 }
	</style>
</head>
<body>
	<div class="wrapper">
	
		<h1>
			<? if ($minsRemaining > 2 && $minsRemaining <= 60) { ?>
				Back in <?= $minsRemaining ?> minutes...			
			<? } else { ?>
				We'll be back shortly...
			<? } ?>
		</h1>
		
		<div class="message">
			We're currently upgrading the site and expect to be finished 
			<? if ($minsRemaining > -10) { ?>
				approx <?= $downUntil ?>.
			<? } else { ?>
				very soon.
			<? } ?>
			<br/>
			Grab a coffee, then hit <a href="javascript:location.reload()">refresh</a> and we should be back in action.
		</div>
		
		
		<div style="margin-top: 35px; text-align: right">
			<a href="https://yump.com.au/" target="_blank"><img src="http://yump.com.au/themes/yump/img/yump_footer.png" alt="Yump" class="logo" border="0" width="100"/></a>
		</div>
	</div>
</body>
</html>

