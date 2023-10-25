<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header text-center">
                <div class="dropdown profile-element"> <span>
					<img alt="image" class="img-circle" src="{{asset('vp-admin/vp-admin1.png'}))" width="180" />
                	<?php /*
					if($this->session->userdata("user_type") !=""){ ?>
                    <img alt="image" class="img-circle" src="<?= get_library_to_image($this->session->userdata("image"),'main') ?>" width="100" />
                    <?php } else {
					?>
                    <img alt="image" class="img-circle" src="uploads/manage_profile/photo/unapproved.jpg" width="100" />
                    <?php
					}?>
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $this->session->userdata("name"); ?></strong>
                     </span> <span class="text-muted text-xs block"><?php $user_type1 = $this->session->userdata("user_type"); ?>
                     <?php echo str_replace("_"," ",$user_type1); ?><b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="admin/dashboard/edit_profile">Edit Profile</a></li>
                        <?php /* <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                       	<li class="divider"></li> */ /*?>
                        <li><a href="admin/logout">Logout</a></li>
                    </ul>*/ ?>
                </div>
                <div class="logo-element">
                    Vp-Admin
                </div>
            </li>
            <li <?php if($Page_menu=="dashboard") { ?> class="active" <?php } ?>>
                <a href="admin/dashboard">
                <i class="fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <?php
			$user_type = "super_admin";//$this->session->userdata("user_type");
			$menu = DB::select(DB::raw("SELECT * FROM `tbl_permission_settings` join tbl_permission_page on tbl_permission_settings.page_type=tbl_permission_page.page_type where tbl_permission_settings.user_type='$user_type' order by tbl_permission_page.sorting_order asc"));
			foreach($menu as $mymenu)
			{
				$menu_url 			= $mymenu->page_type;
				$menu_page_type 	= $menu_url;
				$menu_add_url 		= $menu_url."/add";
				$menu_setting_url 	= $menu_url."/setting";
				$menu_theme_url 	= $menu_url."/theme";
				if($mymenu->menu_id!=0){
                    $new_menu = DB::table('tbl_permission_page')->where('id',$mymenu->menu_id)->first();
					$child_page 		= $menu_page_type;
					$child_page 		= str_replace("manage_","",$child_page);
					$menu_url 			= $new_menu->page_type."/?child_page=".$child_page;
					$menu_add_url 		= $new_menu->page_type."/add?child_page=".$child_page;
					$menu_setting_url 	= $new_menu->page_type."/setting?child_page=".$child_page;
					$menu_theme_url 	= $new_menu->page_type."/theme?child_page=".$child_page;
				}
				$get_child_page = "";
				if($page_child_page){
					$get_child_page = "manage_".$page_child_page;
				}
				?>
				<li
				<?php if($Page_menu==$menu_page_type && $get_child_page=="") { ?>
				class="active" <?php } ?>
				<?php if($get_child_page==$menu_page_type && $get_child_page!="") { ?> class="active" <?php } ?>>
                    <a href="{{ URL('vp-admin/')}}/<?php echo $menu_url ?>">
                    <?php if(base64_decode($mymenu->fafa_icon)==""){ ?>
                    <i class="fa fa-th-large"></i>
                    <?php } else { ?>
                    <?= base64_decode($mymenu->fafa_icon); ?>
                    <?php } ?>
                    <span class="nav-label">
						<?= $mymenu->page_title;?>
                    </span>
                    </a>
					<?php if($mymenu->page_add=="1" || $mymenu->page_view=="1" || $mymenu->page_setting=="1"){ ?>
					<ul class="nav nav-second-level collapse">
						<?php if($mymenu->page_add=="1"){ ?>
								<li <?php if($Page_menu=="title") { ?> class="active" <?php } ?>><a href="{{ URL('vp-admin/')}}/<?php echo $menu_add_url ?>">Add</a></li>
						<?php } ?>
						<?php if($mymenu->page_view=="1"){ ?>
								<li <?php if($Page_menu=="title") { ?> class="active" <?php } ?>><a href="{{ URL('vp-admin/')}}/<?php echo $menu_url ?>">View</a></li>
						<?php } ?>
						<?php if($mymenu->page_setting=="1"){ ?>
								<li <?php if($Page_menu=="title") { ?> class="active" <?php } ?>><a href="{{ URL('vp-admin/')}}/<?php echo $menu_setting_url ?>">Setting</a></li>
						<?php } ?>
						<?php if($mymenu->page_theme=="1"){ ?>
								<li <?php if($Page_menu=="title") { ?> class="active" <?php } ?>><a href="{{ URL('vp-admin/')}}/<?php echo $menu_theme_url ?>">Theme</a></li>
						<?php } ?>
					</ul>
					<?php } ?>
                </li>
            <?php
			} ?>
    </div>
</nav>
