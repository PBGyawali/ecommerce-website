<?php include_once("user_templates/header.php"); ?>
<style>
body, html {
  height: 100%;
  min-height:700px;
}
body {
  background-image: url('<?=BANNERS_URL?>simple.jpg');
  background-repeat: no-repeat;
  background-size: 100% 100%;
  color:white;
  }
  
</style>
<?php include_once("user_templates/navbar_top.php"); ?>
<?php include_once("user_templates/navbar_bottom.php"); ?>


</head>
<body>

<div class="container container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="text-center text-warning">
		  		<h1>COMING SOON</h1>
		  		<p id="time_remaining" style="font-size:30px">Enable your javascript to fully view the remaining days</p>
			</div>
			<div class=" fixed-bottom text-warning text-left ml-5 mb-1" >
		  		<p >Thank you for your Understanding</p>
			</div>
		</div>

	</div>
</div>	
	  </div>	




<script src="<?php echo JS_URL?>comingsoon.js" type="text/javascript" charset="utf-8"></script>