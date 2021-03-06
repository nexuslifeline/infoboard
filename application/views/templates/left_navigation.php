    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img id="sidebar_picture" style="height:100px;width:100px" alt="image" class="img-circle" src="<?php echo $this->session->user_profile; ?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $this->session->firstname.' '.$this->session->lastname ; ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="UserProfile">Profile</a></li>
                            <li><a href="Login/logout_account">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                </li>




                <li class="hidden" data-alias-id="1">
                    <a href="Dashboard" ><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></span></a>                   
                </li>





                <li class="hidden"  data-alias-id="2" >
                    <a href="#" ><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Publish</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li   class="hidden" data-alias-id="2-1" ><a href="Announcements" >
                        <i class="fa fa-clipboard"></i>Announcement</a></li>
                        <li   class="hidden" data-alias-id="2-2" ><a href="Tasks"><i class="fa fa-tags"></i>Task</a></li>

                    </ul>
                </li>
               
               


                 <li class="hidden"  data-alias-id="3">
                    <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Masterfile</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="hidden" data-alias-id="3-1"><a href="UserManagement"><i class="fa fa-user"></i>User Management</a></li>
                        <li  class="hidden" data-alias-id="3-2"><a href="UserGroupManagement"><i class="fa fa-clipboard"></i>User Group Management</a></li>
                    
                    </ul>
                </li>
               


                <li class="hidden"  data-alias-id="4">
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Reference</span><span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">

                        <li class="hidden" data-alias-id="4-1"><a href="DepartmentManagement">
                        <i class="fa fa-slideshare"></i>Department Management</a></li>    
                        <li class="hidden" data-alias-id="4-2"><a href="CourseManagement">
                        <i class="fa fa-institution"></i>Course Management</a></li>
                               
                    </ul>
                </li>
               
            

            

                <li class="hidden" data-alias-id="5">
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                            <li><a href="">#</a></li>
                            <li><a href="">#</a></li>
                            <li><a href="">#</a></li>
                            <li><a href="">#</a></li>

                    </ul>
                </li>




                  <li class="hidden" data-alias-id="6">
                    <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="hidden" data-alias-id="6-1"><a href="UserGroupSetting"><i class="fa fa-gear"></i>User Group Setting</a></li>
                        <li class="hidden" data-alias-id="6-2">
                        <a href="UserProfile">
                        <i class="fa fa-user"></i>User Profile</a></li>
                        <li class="hidden" data-alias-id="6-3"><a href="">
                        <i class="fa fa-wrench"></i>System Setting</a></li>

                    </ul>
                </li>
            </ul>

        </div>
    </nav>
    



