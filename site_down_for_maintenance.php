<?
// YUMP "SITE DOWN" MAINTENANCE PAGE
// To activate this maintenance page and block access to the whole site, add these lines to your .htaccess
// 		 RewriteCond %{HTTP_COOKIE} !YumpDev
//		 RewriteRule .* site_down_for_maintenance.php?until=2030 [last]		# last four digits should be the time you expect to return (24h time)

$downUntil = strtotime($_GET['until']);
$minsRemaining = ceil(($downUntil - time()) / 60);
$downUntil = date('g:ia', $downUntil);

// Return a 503 error code which is better for SEO
$protocol = "HTTP/1.0";
if ("HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"])
	$protocol = "HTTP/1.1";
header("$protocol 503 Service Unavailable", true, 503);
header("Retry-After: 300");  
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SITE DOWN</title>
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
		@-webkit-keyframes rotating /* Safari and Chrome */ {
		  from {
		    -ms-transform: rotate(0deg);
		    -moz-transform: rotate(0deg);
		    -webkit-transform: rotate(0deg);
		    -o-transform: rotate(0deg);
		    transform: rotate(0deg);
		  }
		  to {
		    -ms-transform: rotate(360deg);
		    -moz-transform: rotate(360deg);
		    -webkit-transform: rotate(360deg);
		    -o-transform: rotate(360deg);
		    transform: rotate(360deg);
		  }
		}
		@keyframes rotating {
		  from {
		    -ms-transform: rotate(0deg);
		    -moz-transform: rotate(0deg);
		    -webkit-transform: rotate(0deg);
		    -o-transform: rotate(0deg);
		    transform: rotate(0deg);
		  }
		  to {
		    -ms-transform: rotate(360deg);
		    -moz-transform: rotate(360deg);
		    -webkit-transform: rotate(360deg);
		    -o-transform: rotate(360deg);
		    transform: rotate(360deg);
		  }
		}
		.rotating {
		  -webkit-animation: rotating 8s linear infinite;
		  -moz-animation: rotating 8s linear infinite;
		  -ms-animation: rotating 8s linear infinite;
		  -o-animation: rotating 8s linear infinite;
		  animation: rotating 8s linear infinite;
		}
		svg.rotating {
			float: right; 
			margin-top: -20px; 
			margin-right: 0px; 
			width: 70px
		}
		@media (max-width: 767px) {
			.wrapper {
				margin-top: 0;
				margin-bottom: 0;
			}
			svg.rotating {
				float: none;
				display: block;
				width: 55px;
			}
		}
	</style>
</head>
<body>
	<div class="wrapper">
	
		<!-- Cog graphic, just to add a little cute touch -->
		<svg version="1.1" id="cog3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="96px" height="96px" viewBox="0 0 96 96" enable-background="new 0 0 96 96" xml:space="preserve" class="rotating">
			<g>
				<g>
					<path fill="#444444" d="M87.311,48c0-0.983-0.076-1.947-0.148-2.912c3.84-1.227,6.88-2.397,8.838-3.441l-0.704-3.963
						c-2.198-0.316-5.456-0.385-9.481-0.236c-0.535-1.89-1.203-3.719-2.006-5.48c3.178-2.452,5.628-4.58,7.105-6.225l-2.027-3.484
						c-2.176,0.449-5.263,1.491-8.997,2.998c-1.148-1.582-2.397-3.084-3.767-4.476c2.141-3.381,3.709-6.211,4.53-8.257l-3.106-2.586
						c-1.886,1.157-4.419,3.175-7.398,5.849c-1.615-1.095-3.333-2.041-5.108-2.891c0.848-3.912,1.347-7.108,1.413-9.313l-3.811-1.375
						c-1.377,1.731-3.066,4.499-4.952,8.036c-1.884-0.475-3.804-0.854-5.785-1.047C51.354,5.249,50.723,2.088,50.027,0h-4.055
						c-0.695,2.088-1.327,5.249-1.878,9.196c-1.981,0.194-3.902,0.573-5.785,1.047c-1.886-3.537-3.575-6.305-4.952-8.036l-3.811,1.375
						c0.066,2.205,0.565,5.401,1.413,9.313c-1.775,0.85-3.493,1.796-5.108,2.891c-2.979-2.674-5.513-4.692-7.398-5.849l-3.106,2.586
						c0.821,2.045,2.39,4.875,4.529,8.257c-1.368,1.392-2.617,2.894-3.766,4.476c-3.734-1.507-6.821-2.549-8.998-2.998l-2.028,3.484
						c1.479,1.645,3.929,3.772,7.106,6.225c-0.803,1.762-1.471,3.591-2.006,5.48c-4.026-0.148-7.283-0.08-9.481,0.236L0,41.646
						c1.958,1.044,4.998,2.215,8.837,3.441C8.766,46.053,8.689,47.017,8.689,48c0,0.982,0.076,1.947,0.147,2.912
						C4.998,52.139,1.958,53.309,0,54.354l0.704,3.963c2.198,0.316,5.456,0.385,9.481,0.236c0.535,1.89,1.203,3.719,2.006,5.48
						c-3.178,2.452-5.628,4.58-7.106,6.225l2.028,3.484c2.176-0.448,5.263-1.49,8.998-2.998c1.148,1.582,2.397,3.085,3.766,4.477
						c-2.14,3.381-3.708,6.211-4.529,8.257l3.106,2.585c1.886-1.156,4.419-3.176,7.398-5.849c1.615,1.095,3.333,2.04,5.108,2.891
						c-0.849,3.911-1.347,7.108-1.413,9.312l3.811,1.376c1.377-1.731,3.066-4.499,4.952-8.037c1.883,0.475,3.804,0.854,5.785,1.049
						c0.551,3.946,1.183,7.107,1.878,9.195h4.055c0.695-2.088,1.327-5.249,1.878-9.195c1.981-0.194,3.901-0.574,5.785-1.049
						c1.885,3.538,3.575,6.306,4.952,8.037l3.811-1.376c-0.066-2.204-0.565-5.401-1.413-9.312c1.775-0.851,3.493-1.796,5.108-2.891
						c2.979,2.673,5.513,4.692,7.398,5.849l3.106-2.585c-0.821-2.046-2.39-4.876-4.529-8.257c1.368-1.392,2.617-2.895,3.766-4.477
						c3.734,1.508,6.821,2.55,8.997,2.998l2.027-3.484c-1.478-1.645-3.928-3.772-7.105-6.225c0.803-1.762,1.471-3.591,2.006-5.48
						c4.025,0.148,7.283,0.08,9.481-0.236L96,54.354c-1.958-1.045-4.998-2.215-8.838-3.441C87.234,49.947,87.311,48.982,87.311,48z
						 M48,15c17.213,0,31.342,13.182,32.858,30H62.697c-1.39-6.847-7.44-12-14.697-12c-1.225,0-2.396,0.188-3.536,0.464l-9.19-15.917
						C39.19,15.908,43.488,15,48,15z M54,48c0,3.314-2.687,6-6,6c-3.314,0-6-2.686-6-6s2.686-6,6-6C51.313,42,54,44.686,54,48z M15,48
						c0-11.571,5.96-21.745,14.974-27.636l9.054,15.682C35.388,38.783,33,43.096,33,48s2.388,9.217,6.027,11.954l-9.055,15.682
						C20.96,69.744,15,59.57,15,48z M48,81c-4.511,0-8.81-0.908-12.727-2.547l9.19-15.917C45.604,62.812,46.775,63,48,63
						c7.257,0,13.308-5.153,14.697-12h18.161C79.341,67.818,65.213,81,48,81z"/>
				</g>
			</g>
		</svg>

	
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

