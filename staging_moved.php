<?
// Want to enable this "Staging Moved" message so that staging users are redirected to production?
// Just uncomment the appropriate lines in /.htaccess

$newServer = isset($_GET['newdomain']) 
	? 'http://' . $_GET['newdomain']
	: 'http://membership.melbournestorm.com.au';		// can hardcode URL here if needed (no trailing slash!)
$newUrl = $newServer . $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<!-- Need to enable this staging site again?  look in /.htaccess -->
<html>
<head>
	<title>Moved...</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noindex">
	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style type="text/css">
		h1 { 
			margin: 0 0 10px; 
			font-size: 55px; 
			font-weight: normal; 
			xfont-style: italic;
			letter-spacing: -3px;
			xfont-family: Georgia, sans-serif;
			line-height: 1;
		}
		.wrapper { 
			background-color: #ddd; 
			color: #333; 
			margin: 150px auto 20px; 
			width: 700px; 
			padding: 35px; 
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
		<h1>This site is now live...</h1>
		<div class="message">
			<p>Update your bookmarks and shortcuts. The page you were after is now here:</p>
			<p style="margin: 20px 0; text-align: center"><a href="<?= $newUrl ?>" style="font-weight: bold; font-size: 140%" id="link"><?= $newUrl ?></a></p>
		</div>
	</div>
	<div style="margin: 35px auto 20px; text-align: center">
		<a href="http://yump.com.au/" target="_blank"><img width=50 src="https://dl.dropboxusercontent.com/u/9911892/Yump/yump3.png" alt="Yump"></a>
	</div>
</body>
</html>

