<?php //$this->Admin_Model->check_login1(); ?>
@include('vp-admin/header_footer/head')
		<!-- bootstrap & fontawesome -->
	<link href="{{asset('vp-admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vp-admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{asset('vp-admin/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <link href="{{asset('vp-admin/css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">

    <link href="{{asset('vp-admin/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{asset('vp-admin/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{asset('vp-admin/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
	<link href="{{asset('vp-admin/css/plugins/dualListbox/bootstrap-duallistbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vp-admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('vp-admin/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('vp-admin/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <link href="{{asset('vp-admin/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('vp-admin/css/plugins/switchery/switchery.css')}}" rel="stylesheet">

	<link href="{{asset('vp-admin/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
	<link href="{{asset('vp-admin/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">

	</head>
	<body>
    	<div id="wrapper">
			@include('vp-admin/header_footer/menu')
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

						</div>
                        <ul class="nav navbar-top-links navbar-right">
							<li style="font-size:20px;">
                                <span class="m-r-sm text-muted welcome-message">
									<a href="{{ URL('/')}}" target="_blank">	View Website
									</a>
								</span>
                            </li>
							<li style="font-size:20px;">
							|
							</li>
                            <li style="font-size:20px;">
                                <span class="m-r-sm text-muted welcome-message">
								Welcome to Vp-Admin+ </span>
                            </li>
                            <?php
							/* if($this->session->userdata('user_type')!="") { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" onClick="notify('make_interest')" data-toggle="tooltip" data-placement="left" title="Make Interest">
                                    <i class="fa fa-handshake-o fa-2x" aria-hidden="true" style="color:#3bb509"></i>
                                    <span class="label label-warning" id="make_interest_count"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages" id="make_interest_div">

                                </ul>
                            </li>

                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" onClick="notify('feedback')" data-toggle="tooltip" data-placement="left" title="Feedback">
                                    <i class="fa fa-flash fa-2x" style="color:#958efd"></i>
                                    <span class="label label-warning" id="feedback_count"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages" id="feedback_div">

                                </ul>
                            </li>


                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" onClick="notify('contact_form')" data-toggle="tooltip" data-placement="left" title="Contact Form">
                                    <i class="fa fa-bell fa-2x" style="color:#d86bbb"></i>  <span class="label label-primary" id="contact_form_count"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts" id="contact_form_div">
                                </ul>
                            </li>
            				<?php } */ ?>
                            <li>
                                <a href="admin/logout">
                                    <i class="fa fa-sign-out fa-2x" style="color:#F00"></i>
                                    <span style="font-size:20px;">Log out</span>
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-12">
                    	<div class="col-lg-6">
                        	<h2><?= $title1 ?></h2>
                      	</div>
                        <div class="col-lg-6">
                        	<h3 class="pull-right" style="margin-top:20px;">
								Last Login Time : <?php
								/*$last_login_time = $this->session->userdata('last_login_time');
								if($last_login_time!=""){
                                $display_time_H = date("H",$last_login_time);
                                $display_time_i = date("i",$last_login_time);
                                echo $time= date("d-M-Y",$last_login_time)." at ".$this->Scheme_Model->time_conveter($display_time_H,$display_time_i);
								}*/
                                ?>
                            </h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="col-lg-4">
                                <ol class="breadcrumb">
                                    <ul class="breadcrumb">
                                        <?php
                                        $i = 1;
                                        foreach($breadcrumbs as $key => $row) {
                                            ?>
                                            <li
                                            <?php if($i==2) { ?>
                                                class="active"
                                            <?php } ?>>
                                            <?php if($i==1 || $i==2) { ?>
                                                <a href="{{ URL('/')}}/<?= $row ?>">
                                            <?php } ?>
                                                    <?php echo $key; ?>
                                            <?php if($i==1 || $i==2) { ?>
                                                </a>
                                            <?php } ?>
                                                    <span class="divider"></span>
                                                </li>
                                            <?php
                                            $i++;
                                        } ?>
                                    </ul>
                                </ol>
                         	</div>
                            <div class="col-lg-8">
                            	<marquee style="color:#08daaf">

								</marquee>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                	<div class="row">
                    	<div class="col-lg-12">
