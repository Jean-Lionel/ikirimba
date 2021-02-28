<!DOCTYPE HTML>

<html>
<head>
	<title>AEJT BURUNDI</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
	<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')"></script>
	<script src="{{ asset('js/skel.min.js') }}"></script>
	<script src="{{ asset('js/skel-panels.min.js') }}"></script>
	<script src="{{ asset('js/init.js') }}"></script>
	<noscript>
		<link rel="stylesheet" href="asset('css/skel-noscript.css')" />
		<link rel="stylesheet" href="asset('css/style.css')" />
		<link rel="stylesheet" href="asset('css/style-desktop.css')" />
	</noscript>
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
</head>
<body class="homepage">

@yield("content");

<div id="footer">
		<div class="container">
			<div class="row">
				<div class="6u">
					<section>
						<h2>Nos activités récentes</h2>
					
							<div class="ballon-bgbtm">&nbsp;</div>
							
						</section>
					</div>
					<div class="6u" id="contact">
						<section>
							<h2>Contact</h2>
						</section>
					</div>
					
				</div>
			</div>
		</div>
		<!-- /Footer -->

		<!-- Copyright -->
		<div id="copyright" class="container">
			&copy; BURUNDI - <span> 
				<script>
				 document.write(new Date());
				</script> 

				</span>
		</div>


	</body>
	</html>