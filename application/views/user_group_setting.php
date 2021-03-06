<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Infoboard | User Group Setting </title>


     <?php include('assets/includes/global_css.html'); ?>

    <!-- Checkbox / Radio -->
    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">


    <!-- Dropdown / Select picker-->
    <link href="assets/css/dropdown-enhance/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Datepicker --->
    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    <link href="assets/js/plugins/notify/pnotify.core.css" rel="stylesheet">


    <!-- SUmmernote -->
    <link href="assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
   <style>
        .toolbar{
            float: left;
        }

        .tools {
            float: left;
            margin-bottom:5px;
        }

        [contenteditable="true"]{
            border: 1px solid black;
            min-height: 180px;
            max-height: 180px;
            margin: 10px;
        }

        [contenteditable="true"]:active,
        [contenteditable="true"]:focus{
            border:3px solid #F5C116;
            outline:none;
            background: white;
        }


    </style>
</head>

<body>

<div id="wrapper">
    <!-- /left navigation -->
    <?php $this->load->view('templates/left_navigation.php'); ?>
    <!-- /left navigation -->



    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <!-- /top navigation -->
            <?php $this->load->view('templates/top_navigation.php'); ?>
            <!-- /top navigation -->
        </div>

        <div class="wrapper wrapper-content"><!-- /main content area -->
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 animated fadeInRight">
                    <div class="mail-box-header" style="margin-bottom:-25px;">
                        <h2 style="block:inline;"><i class="fa fa-users"></i> User Group Setting </h2>

                    </div>

                    <div class="mail-box" style="padding-left:10px;padding-right:10px;">


                        <div class="panel-heading">
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1">Users Group</a></li>
                                 
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="table-responsive">
                                        <table id="tbl_user_group_list" class="table table-striped table-bordered table-hover dataTables-example dataTable ">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <td>Users Group</td>
                                            <td>Description</td>
                                            <td>Date Created</td>
                                         
                                        </tr>
                                        </thead>
                                      <tbody>
                                      
                                        </tbody>
                                    </table>
                                    </div>
                                </div>

                           


                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">



                </div>
                
            </div>
        </div><!-- /main content area -->

        <!-- /footer -->
        <?php $this->load->view('templates/footer'); ?>
        <!-- /footer -->


    </div>
</div>






<div class="modal fade" id="user_group_priviledge_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog"  style="width:50%;">
        <div class="modal-content animated bounceInRight">


            <div class="modal-body"><!--/modal body-->
                <div class="row" style="margin-left:-25px;margin-right:-25px;"><!--/row-->
                    <div class="col-lg-12 col-sm-12  col-md-12">
                        <div class="panel panel-default" style="margin-bottom:-20px;border-radius:0px;">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>User Priviledge Access <small class="m-l-sm">Please configure User Group Link Access.</small></h5>
                                    <div class="ibox-tools">
                                          <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                       
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                
            


                                                <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                <div class="table-responsive">
                                                    <table id="tbl_user_group_priviledge" class="table table-striped table-bordered table-hover dataTables-example dataTable ">
                                                        <thead>
                                                            <tr>
                                                            <td></td>
                                                            <td>User Priviledge Access</td>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                                </div>



                                            </div>

                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  <!--/row-->
            </div><!--/modal body-->

            <div class="modal-footer">
                <button id="btn_user_priviledge_access" type="button" class="btn btn-primary"><i class="fa fa-save"></i> <u>S</u>ave Priviledge Acccess </button>
                <button type="button" id="btn-close-modal" class="btn btn-white" data-dismiss="modal"><u>C</u>lose</button>
            </div>
        </div>
    </div>
</div>























<div class="modal fade" id="user_group_distribution_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog"  style="width:50%;">
        <div class="modal-content animated bounceInRight">


            <div class="modal-body"><!--/modal body-->
                <div class="row" style="margin-left:-25px;margin-right:-25px;"><!--/row-->
                    <div class="col-lg-12 col-sm-12  col-md-12">
                        <div class="panel panel-default" style="margin-bottom:-20px;border-radius:0px;">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>User Task Distribution  <small class="m-l-sm">Please configure User  Task Distribution .</small></h5>
                                    <div class="ibox-tools">
                                           <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                       
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                
            


                                                <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                <div class="table-responsive">
                                                    <table id="tbl_user_group_distribution" class="table table-striped table-bordered table-hover dataTables-example dataTable ">
                                                        <thead>
                                                            <tr>
                                                            <td></td>
                                                            <td>Department</td>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                                </div>



                                            </div>

                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  <!--/row-->
            </div><!--/modal body-->

            <div class="modal-footer">
                <button id="btn_user_distribution_access" type="button" class="btn btn-primary"><i class="fa fa-save"></i> <u>S</u>ave Distribution Acccess </button>
                <button type="button" id="btn-close-modal-s" class="btn btn-white" data-dismiss="modal"><u>C</u>lose</button>
            </div>
        </div>
    </div>
</div>













<?php include('assets/includes/global_js.php'); ?>


<!--- Dropdown / Selectpicker --->
<script src="assets/css/dropdown-enhance/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/plugins/typehead/bootstrap3-typeahead.js"></script>

<!-- iCheck -->
<script src="assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- Datepicker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- PNotify -->
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.core.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.nonblock.js"></script>


<!-- Data Tables -->
<script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!-- sparkline -->
<script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Peity -->
<script src="assets/js/plugins/peity/jquery.peity.min.js"></script>

   <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>'
    </script>
<!--Custom JS-->
<script src="assets/js/defined/user.group.setting.event.handlers.js"></script>

<!-- Summernote -->
<script src="assets/js/plugins/summernote/summernote.min.js"></script>


</body>

</html>


