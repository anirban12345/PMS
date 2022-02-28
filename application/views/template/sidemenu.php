<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title text-center" style="border: 0;">
                <a href="#" class="site_title"><span><?=$this->title?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url()?>assets/images/1.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->userdata('userdtls')[0]->u_title?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
           
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="<?=base_url('Dashboard')?>"><i class="fa fa-home"></i> Dashboard </a>                    
                  </li>

                <?php if(in_array('createprocess',$user_permission)){ ?>
                  <li><a><i class="fa fa-archive"></i> Process <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('Process/create')?>">Create</a></li>                      
                      <li><a href="<?=base_url('Process/index')?>">All Process</a></li>                      
                    </ul>
                  </li>
                  <?php } ?>  
                  <?php if(in_array('createprocess',$user_permission)){ ?>
                  <li><a><i class="fa fa-archive"></i> Requisition <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('Requisition/create')?>">Create</a></li>                      
                      <li><a href="<?=base_url('Requisition/index')?>">All Requisition</a></li>                      
                      <li><a href="<?=base_url('Requisition/search')?>">Search Requisition</a></li>                      
                    </ul>
                  </li>
                  <?php } ?>  

                  <?php if(in_array('createprocess',$user_permission)){ ?>
                  <li><a><i class="fa fa-cogs"></i> Items <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('Items/create')?>">Create</a></li>                      
                      <li><a href="<?=base_url('Items/index')?>">All Items</a></li>                                            
                    </ul>
                  </li>
                  <?php } ?>  

                  <?php if(in_array('createusers',$user_permission)){ ?>
                  <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('Users/create')?>">Create</a></li>                      
                      <li><a href="<?=base_url('Users/index')?>">All Users</a></li> 
                      <li><a href="<?=base_url('Users/userProcessEntry')?>">Count Process Entry</a></li>
                      <li><a href="<?=base_url('Users/userRequisitionEntry')?>">Count Requisition Entry</a></li>                     
                    </ul>
                  </li>

                  <li><a><i class="fa fa-users"></i> User Group <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('User_Group/create')?>">Create</a></li>                      
                      <li><a href="<?=base_url('User_Group/index')?>">All User Group</a></li>                      
                    </ul>
                  </li>
                  <?php } ?>  

                  <?php if(in_array('createusers',$this->permission)){ ?>  
                    <li><a href="<?=base_url('Users/userlog')?>"><i class="fa fa-user"></i> Users Log </a>                    
                    </li>
                    
                  <?php  }?> 

                  <?php if(in_array('createusers',$this->permission)){ ?>  
                    <li><a href="<?=base_url('Dashboard/backUpDatabase')?>"><i class="fa fa-database"></i> Back Up </a>                    
                    </li>
                  <?php  }?>  

                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons 
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?=base_url()?>assets/images/1.jpg" alt=""><?=$this->session->userdata('userdtls')[0]->u_title?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="<?=base_url("Users/myProfile")?>"> My Profile</a>                       
                      <a class="dropdown-item"  href="<?=base_url("Login/logout")?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>                  
                </ul>
              </nav>
            </div>
          </div>
          
        <!-- /top navigation -->