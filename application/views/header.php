<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
	<!-- Pixel Admin's stylesheets -->
	<link href="<?=base_url()?>assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
		<link href="<?=base_url()?>assets/stylesheets/multiple-select.css" rel="stylesheet" type="text/css">
	<link href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

		
	<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/javascripts/ie.min.js"></script>
	<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="<?=base_url()?>assets/javascripts/common.js"></script>
<script src="<?=base_url()?>assets/javascripts/default.js"></script>
<script src="<?=base_url()?>assets/javascripts/jquery.multiple.select.js"></script>
<script src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>





<script type='text/javascript'>
		 var base_url = '<?=base_url()?>';
		
	</script>
</head>
<body class="theme-default main-menu-animated page-profile">
<script>var init = [];</script>
<div id="main-wrapper">
	<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
		<button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>		
		<div class="navbar-inner">
			<div class="navbar-header">
				<!-- Logo -->
				<a href="<?=site_url('home')?>" class="navbar-brand"><div><img alt="ERP Admin" src="<?=base_url()?>assets/images/"></div>Admin Panel</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>
			</div>
			<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
				<div>
					
					<div class="right clearfix">
						<ul class="nav navbar-nav pull-right right-navbar-nav">
							
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                                                                    <span>Welcome:<?=" ".ucfirst($this->session->userdata('name'))?></span>
								</a>
								<ul class="dropdown-menu">
								
									<li><a href="<?=site_url('login/logoff')?>"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
								</ul>
							</li>
						</ul> <!-- / .navbar-nav -->
					</div> <!-- / .right -->
				</div>
			</div> <!-- / #main-navbar-collapse -->
		</div> <!-- / .navbar-inner -->
	</div> <!-- / #main-navbar -->
	
	<div id="main-menu" role="navigation">
		<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div id="main-menu-inner" style="overflow: hidden; width: auto; height: 100%;">
			<div class="menu-content top animated fadeIn" id="menu-content-demo">
<!--				<div>
					<div class="text-bg"><span class="text-slim">Welcome,</span> <span class="text-semibold">admin</span></div>
					<div class="btn-group">
					
						<a href="http://localhost/vascon/login/logoff" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
					</div>
					<a href="#" class="close">&times;</a>
				</div>-->
			</div>			
     <ul class="navigation">
				<li class=" active">
					<a lc_data="index" lc_model="dashboard" lc_link="yes" href="<?=base_url()?>Home"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Dashboard</span></a>
				</li>
				
				
						
				<li class="mm-dropdown mm-dropdown-root open">
							<a tabindex="-1" href="#"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Masters</span><span class="label label-info"></span></a>
							<ul class="mmc-dropdown-delay animated fadeInLeft" style="">
								<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_city" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">City</span><span class="label label-info"></span></a>
								
								</li>
									<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_location" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Location</span><span class="label label-info"></span></a>
								
								</li>
								
						<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_propertytype" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Property Type</span><span class="label label-info"></span></a>
								
								</li>
								
									<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_propertystatus" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Property Status</span><span class="label label-info"></span></a>
								
								</li>
<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_amenities" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Property Amenities</span><span class="label label-info"></span></a>
								
								</li>
								
							<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_units" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Property Units</span><span class="label label-info"></span></a>
								
								</li>	
								
												<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_projects" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Project Master</span><span class="label label-info"></span></a>
								
								</li>	
								
</ul>
				</li>
				
				
				
					<!--<li class="mm-dropdown mm-dropdown-root open">
							<a tabindex="-1" href="<?=base_url()?>ImgGallery/view"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Image Gallary</span><span class="label label-info"></span></a>
							</li>
				<li class="mm-dropdown mm-dropdown-root open">
							<a tabindex="-1" href="<?=base_url()?>Slokas/view"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Slokas</span><span class="label label-info"></span></a>
							</li>
							<li class="mm-dropdown mm-dropdown-root open">
							<a tabindex="-1" href="<?=base_url()?>VideoGallery/view"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Video Gallary</span><span class="label label-info"></span></a>
							</li>
							<li class="mm-dropdown mm-dropdown-root open">
							<a tabindex="-1" href="<?=base_url()?>PoojaSamagri/view"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Pooja Samagri </span><span class="label label-info"></span></a>
							</li>-->
							<li class="mm-dropdown mm-dropdown-root open">
							<a tabindex="-1" href="<?=base_url()?>Achievement/view"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Website Contents</span><span class="label label-info"></span></a>
							</li>
							
							
	
				
						<li class="mm-dropdown mm-dropdown-root open">
							<a tabindex="-1" href="#"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Investors</span><span class="label label-info"></span></a>
							<ul class="mmc-dropdown-delay animated fadeInLeft" style="">
								<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Investors" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Company Overview/Press Releases</span><span class="label label-info"></span></a>
								
								</li>
									<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Investors/view_annual_reports" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Annual Report/Corporate Update</span><span class="label label-info"></span></a>
								
								</li>
								
					<!--	<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Investors/view_annual_reports" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Corporate Update</span><span class="label label-info"></span></a>
								
								</li>-->
								
									<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Investors/view_quarterly_reports" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Quarterly Financials </span><span class="label label-info"></span></a>
								
								</li>
<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_amenities" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">FAQ's</span><span class="label label-info"></span></a>
								
								</li>
								
							<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_units" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">IR Contact Details</span><span class="label label-info"></span></a>
								
								</li>	
								
												<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_projects" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Media Updates</span><span class="label label-info"></span></a>
								
								</li>	
											<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_projects" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Right Issues</span><span class="label label-info"></span></a>
								
								</li>
											<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_projects" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Corporate Governance</span><span class="label label-info"></span></a>
								
								</li>
											<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_projects" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Shares Information</span><span class="label label-info"></span></a>
								
								</li>
											<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_projects" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Investor Service</span><span class="label label-info"></span></a>
								
								</li>
								<li class="mm-dropdown">
								<a tabindex="-1" href="<?=base_url()?>Masters/list_projects" lc_data="own" lc_model="centers" lc_link="yes"><i class="menu-icon fa fa-dribbble"></i><span class="mm-text">Result of AGM</span><span class="label label-info"></span></a>
								
								</li>
								
</ul>
				</li>
			

			
							
							</ul>
	</div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 473px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div> <!-- / #main-menu-inner -->
	</div>
	<!--<div id="main-menu" role="navigation">
		<div id="main-menu-inner">
			<div class="menu-content top" id="menu-content-demo">

			</div>			
                        <ul class="navigation">                            
                            <?php              
                            mysql_connect("localhost","sandip_mobile","_KT2R^]QE-iw");
                            mysql_select_db("sandip_mobile_app");                            
                            $sql="select mm.* ";
                            $sql.="FROM menu_master mm ";
                            $sql.="INNER JOIN role_menu_relation rmr on rmr.menu_id=mm.menu_id ";
                            $sql.="INNER JOIN roles_master rm on rm.role_id=rmr.role_id ";
                            $sql.="INNER JOIN users u on u.role_id=rm.role_id";
                            $sql.=" WHERE u.user_id='".$_SESSION['uid']."' AND mm.parent='0' AND mm.status='Y' AND rmr.status='Y' AND rm.status='Y' ";
                            $sql.="ORDER BY seq ";
                            
                            $res=  mysql_query($sql) or die(mysql_error());
                            while($row= mysql_fetch_assoc($res))
                            {  
                                echo '<li>';                                
                            ?>                            
                                <a href="<?=base_url().$row['url']?>"><i class="menu-icon fa <?=$row['menu_icon']?>"></i><span class="mm-text"><?=$row['menu_name']?></span></a>
                                <ul>
                                    <li>
                                        <?php                                                                                    
                                            $sql2="select mm.* ";
                                            $sql2.="FROM menu_master mm ";
                                            $sql2.="INNER JOIN role_menu_relation rmr on rmr.menu_id=mm.menu_id ";
                                            $sql2.="INNER JOIN roles_master rm on rm.role_id=rmr.role_id ";
                                            $sql2.="INNER JOIN users u on u.role_id=rm.role_id ";
                                            $sql2.="WHERE u.user_id='".$_SESSION['uid']."' AND mm.parent='".$row['menu_id']."' AND mm.status='Y' AND rmr.status='Y' AND rm.status='Y' ";
                                            $sql2.="ORDER BY seq "; 
                                            
                                            $res2=mysql_query($sql2);
                                            while($row2= mysql_fetch_assoc($res2))
                                            {                                               
                                        ?>
                                        <a href="<?=base_url().$row2['url']?>" tabindex="-1"><i class="menu-icon fa <?=$row2['menu_icon']?> "></i><span class="mm-text"><?=$row2['menu_name']?></span></a>
                                        <ul>
                                        <?php                                            
                                            $sql3="select mm.* ";
                                            $sql3.="FROM menu_master mm ";
                                            $sql3.="INNER JOIN role_menu_relation rmr on rmr.menu_id=mm.menu_id ";
                                            $sql3.="INNER JOIN roles_master rm on rm.role_id=rmr.role_id ";
                                            $sql3.="INNER JOIN users u on u.role_id=rm.role_id ";
                                            $sql3.="WHERE u.user_id='".$_SESSION['uid']."' AND mm.parent='".$row2['menu_id']."' AND mm.status='Y' AND rmr.status='Y' AND rm.status='Y' ";
                                            $sql3.="ORDER BY seq ";                                                     
                                            $res3=mysql_query($sql3);                                           
                                            //$res3=mysql_query("select * from lc_master_menu where parent='".$row['id']."' AND child='".$row2['id']."' limit 5");
                                            while($row3= mysql_fetch_assoc($res3))
                                            {
                                        ?>
                                            <li>
                                                <a href="<?=base_url().$row3['url']?>">
                                                    <span class="mm-text"><?=stripslashes($row3['menu_name'])?></span>
                                                </a>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                            </ul>
                                        <?php
                                            }
                                        ?>
                                    </li>                                
                                </ul>
                            
                            <?php                               
                                echo '</li>';
                            }
                            ?>
                            
                        </ul>
		</div>
	</div>-->
<!-- /4. $MAIN_MENU -->