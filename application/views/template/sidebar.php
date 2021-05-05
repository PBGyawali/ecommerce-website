<?php  

$user_type= (isset($_SESSION['type']))?$_SESSION['type']:'';
$username=(isset($_SESSION['user_name']))?ucwords($_SESSION['user_name']):'';
$user_id=(isset($_SESSION['user_id']))?$_SESSION['user_id']:'';

$profile_image=(!empty($_SESSION['profile_image']))?$_SESSION['profile_image']:'user_profile.png';
?>
</head>
<body class="p-0" id="page-top">
<div class="container-fluid bg-dark d-inline p-0 " style="z-index:10;">
		<div class="col-12 text-center pl-0 ">
			<div class="d-flex flex-column" >
                <nav class="navbar navbar-light bg-dark navbar-expand topbar text-white static-top p-0 m-0">
					<ul class="nav navbar-nav flex-nowrap ml-auto text-left text-white">					
					
					<li ><a  class="nav-link text-white" href="<?php echo base_url();?>dashboard"><span class="btn mr-1"><i class="fa fa-tachometer"></i> Dashboard</span></a></li>
					<li ><a  class="nav-link text-white" href="<?php echo base_url();?>users"><span class="btn mr-1"><i class="fa fa-users"></i> Users</span></a></li>
					<li ><a  class="nav-link text-white" href="<?php echo base_url();?>store"><span class="btn mr-1"><i class="fa fa-id-card"></i> Store</span></a></li>	
					<li class="nav-item">
					<a class="nav-link text-white h4" ><?=isset($title)&& in_array($title,array('Dashboard','dashboard'))?$title:(isset($title)?$title.' Management':'ADMIN PANEL')?> <img src="<?php echo ICONS_URL;?>civue.png" width="40" height="40"></a>
					</li>
					
					<li ><a  class="nav-link text-white" href="<?php echo base_url();?>product/manage"><span class="btn mr-1"><i class="fas fa-warehouse"></i> Product</span></a></li>		
					<li ><a  class="nav-link text-white" href="<?php echo base_url();?>category"><span class="btn mr-1"><i class="fa fa-sitemap"></i> Category</span></a></li>
					<li ><a  class="nav-link text-white" href="<?php echo base_url();?>brand"><span class="btn mr-1"><i class="fa fa-list"></i> Brand</span></a></li>
					<li ><a class="nav-link text-white" href="<?php echo base_url();?>home/logout" ><span class="btn mr-1">Logout</a></span></li>
					
					</div>
	</div>
</div>

   
	