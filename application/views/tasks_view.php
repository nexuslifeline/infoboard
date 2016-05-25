<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Infoboard | Announcements </title>


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



    <!-- morris -->
    <link href="assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="assets/css/plugins/select2/select2.min.css" rel="stylesheet">

    <style>
        .toolbar{
            float: left;
        }

        .tools {
            float: left;
            margin-bottom:5px;
        }


        td.details-control {
            background: url('images/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('images/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

    </style>
</head>

<body>

<div id="wrapper">
<!-- /left navigation -->
<?php $this->load->view('templates/left_navigation.php'); ?>
<!-- /left navigation -->



<div id="page-wrapper" class="white-bg">



    <div class="row border-bottom">
        <!-- /top navigation -->
        <?php $this->load->view('templates/top_navigation.php'); ?>
        <!-- /top navigation -->
    </div>

    <!--breadcrumbs-->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <br /><b>
            <ol class="breadcrumb">
                <li>
                    <a href="Dashboard">Publishing</a>
                </li>
                <li class="active">
                    Task
                </li>
            </ol></b>
        </div>
    </div><!--breadcrumbs-->


    <div class="wrapper wrapper-content"><!-- /main content area -->





        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
            <table id="tbl_tasks_list" class="table table-striped table-bordered table-hover" >
            <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Completed</th>
                <th>%</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>

            </tfoot>
            </table>
            </div>
            </div>
        </div>
        <!-- /footer -->
        <?php $this->load->view('templates/footer'); ?>
        <!-- /footer -->
    </div>


</div>






<div>




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

<!-- SUMMERNOTE -->
<script src="assets/js/plugins/summernote/summernote.min.js"></script>


<!-- Select2 -->
<script src="assets/js/plugins/select2/select2.full.min.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Sparkline -->
<script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>


    <script>
        $(document).ready(function(){





var  showNavigation=function(a){
                
                var serialData=[];
                var user_group_id = $('.user-session').attr('data-group-id');
            
             serialData.push({
                    name:"user_group_id",value: user_group_id
                });

                            $.ajax({
                                    dataType:"json",
                                    type: "POST",
                                    url:'UserGroupSetting/ActionGetDeniedAccessLink', //call controller class/function to execute
                                    data:serialData,
                                success:function(response) {
                                       
                                       // console.log(response);

                            $.each(response,function(index,value){
                                var alias_id  = value.alias_id; 
                                var parent = alias_id.split('-');
                               
                                 $("[data-alias-id='"+parent[0]+"']").removeClass("hidden");
                                 $("[data-alias-id='"+alias_id+"']").removeClass("hidden");
      
                            });

                                },error: function(xhr, status, error) {
                                // check status && error
                                console.log(xhr);
                                }
                             });
            };

showNavigation();












            var initializeControls=function(){
                var dt = $('#tbl_tasks_list').DataTable( {
                    "ajax": "tasks/transaction/get",
                    "columns": [
                        {
                            "targets": [0],
                            "class":          "details-control",
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ""
                        },
                        { "targets": [1],"data": "task_title" },
                        { "targets": [2],"data": "task_description" },
                        { "targets": [2],"data": "submission_deadline" },
                        { "targets": [4],"data": "completed_count" },
                        { "targets": [5],"data": "completed_percent" }
                    ],
                    "order": [[1, 'asc']]
                } );


                var dtBindEventHandlers=function(){

                    function format ( d ) {

                        var _strRows= d.emp_details;
                        var obj=JSON.parse(_strRows);

                        var _structure;
                        $.each(obj,function(i,value){
                            _structure+='<tr>'+
                            '<td>'+value.employee+'</td>'+
                            '<td>'+value.date_accomplished+'</td>'+
                            '<td align="center"><i class="fa '+(value.is_accomplished=="1"?"fa-check-circle":"fa-times-circle")+'"></i></td>'+
                            '</tr>';
                        });




                    //alert(d.task_id);

                    //console.log(d.emp_details.split('|*|'));
                    return  '<center><b class="text-navy">Task Information</b></center>'+
                            '<table width="90%" style="margin-left: 5%;">'+
                            '<thead></thead>'+
                            '<tbody>'+
                            '<tr>'+
                            '<td width="20%" valign="center"><span id="tbl_child_sparkline'+ d.task_id+'"></span></td>'+
                            '<td width="70%">'+

                                '<table class="table table-striped table-bordered table-hover" width="100%" border="1">'+
                                    '<thead><tr><th>Name</th><th>Date Accomplished</th><th>Status</th></tr></thead>'+
                                    '<tbody>'+
                                        _structure
                                    '</tbody>'+
                                '</table>'+

                            '</td>'+
                            '</tr>'+
                            '</tbody>'+
                            '<tfoot></tfoot>'+
                        '</table>';
                    }

                    function reInitializePieChart( d ){
                        $("#tbl_child_sparkline"+ d.task_id).sparkline([d.per_completed, d.per_non_completed], {
                            type: 'pie',
                            height: '140px',
                            sliceColors: ['#1ab394', '#b3b3b3', '#e4f0fb']
                        });
                    }


                    // Array to track the ids of the details displayed rows
                    var detailRows = [];

                    $('#tbl_tasks_list tbody').on( 'click', 'tr td.details-control', function () {
                        var tr = $(this).closest('tr');
                        var row = dt.row( tr );
                        var idx = $.inArray( tr.attr('id'), detailRows );

                        if ( row.child.isShown() ) {
                            tr.removeClass( 'details' );
                            row.child.hide();

                            // Remove from the 'open' array
                            detailRows.splice( idx, 1 );
                        }
                        else {
                            tr.addClass( 'details' );

                            //console.log(row.data());
                            row.child( format( row.data() ) ).show();
                            reInitializePieChart(row.data())



                            // Add to the 'open' array
                            if ( idx === -1 ) {
                                detailRows.push( tr.attr('id') );
                            }



                        }
                    } );

                    // On each draw, loop over the `detailRows` array and show any child rows
                    dt.on( 'draw', function () {
                        $.each( detailRows, function ( i, id ) {
                            $('#'+id+' td.details-control').trigger( 'click' );
                        } );
                    } );
                }();





            }();








        });



    </script>




</body>

</html>
