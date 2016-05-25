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

    <!--- chosen ----->
    <link href="assets/css/plugins/chosen/chosen.css" rel="stylesheet">

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

        .select2-container{
            min-width: 100%;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
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
    <div  id="div_breadcrumbs" class="row wrapper border-bottom white-bg page-heading">
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


        <div id="div_task_list" class="row">
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
                <th></th>
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


        <div id="div_task_entry" class="row" style="display: none;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Publish new Task <small>Create and Publish task to other users.</small></h5>
                <div class="ibox-tools">
                    <a id="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <form id="frm_task" method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Title :</label>
                        <div class="col-sm-10"><input name="task_title" type="text" class="form-control"></div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Description :</label>
                        <div class="col-sm-10"><textarea name="task_description" class="form-control" rows="10"></textarea></div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                            <label class="col-sm-2 control-label">Deadline :</label>

                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="txt_deadline" name="submission_deadline" type="text" class="form-control" value="<?php echo date('m/d/Y'); ?>">
                                </div>

                            </div>

                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Departments :</label>

                        <div class="col-sm-10">
                            <select id="cbo_departments"  multiple="multiple">
                                <?php foreach($departments as $row){ ?>
                                    <option value="<?php echo($row->department_id); ?>"><?php echo($row->department_title); ?></option>
                                <?php } ?>
                            </select>


                            <span class="help-block m-b-none">Optional. Please specify the department this task will be visible.</span>

                        </div>

                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Employee :</label>

                        <div class="col-sm-10">
                            <select id="cbo_employees"  multiple="multiple">
                                <?php foreach($employees as $row){ ?>
                                    <option value="<?php echo($row->user_account_id); ?>"><?php echo($row->emp_fname.' '.$row->emp_lname); ?></option>
                                <?php } ?>
                            </select>


                            <span class="help-block m-b-none">Optional. Please specify employee who will receive this task.</span>

                        </div>

                    </div>




                </form>

                <br />

                <div class="hr-line-dashed"></div>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button id="btn_save" class="btn btn-primary" type="submit"><span class=""></span> Save changes</button>
                        <button id="btn_cancel" class="btn btn-white" type="submit">Cancel</button>
                    </div>
                </div>

            </div>
            </div>
            </div>
        </div>


        <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
            <div class="modal-dialog modal-sm">
                <div class="modal-content"><!---content--->
                    <div class="modal-header">
                        <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>

                    </div>

                    <div class="modal-body">
                        <p id="modal-body-message">Are you sure ?</p>
                    </div>

                    <div class="modal-footer">
                        <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                        <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div><!---content---->
            </div>
        </div><!---modal-->


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

<!-- Chosen -->
<script src="assets/js/plugins/chosen/chosen.jquery.js"></script>

<!-- Sparkline -->
<script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<script type="text/javascript">



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
    }();


</script>


    <script>

        /**
         * Created by : Paul Christian Rueda
         * Date : May 24, 2016 @ 10:17AM
         * */
        $(document).ready(function(){

            var dt; var _txnMode; var _selectedID; var _selectRowObj;

            var initializeControls=function(){

                dt = $('#tbl_tasks_list').DataTable( {
                    "dom": '<"toolbar">frtip',
                    "bLengthChange":false,
                    "ajax": "tasks/transaction/get",
                    "columns": [
                        {
                            "targets": [0],
                            "class":          "details-control",
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ""
                        },
                        { "targets": [1],"data": "task_title"},
                        { "targets": [2],"data": "task_description" },
                        { "targets": [2],"data": "deadline" },
                        { "targets": [4],"data": "emp_total_accomplished" },
                        { "targets": [5],"data": "per_completed" },
                        {
                            "targets": [6],
                            "data": null,
                            "render": function (data, type, full, meta){
                                var btn_edit='<button class="btn btn-white btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                                var btn_trash='<button class="btn btn-white btn-sm" name="remove_info" style="margin-right:-15px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';
                                return '<center>'+btn_edit+btn_trash+'</center>';
                            }
                        }
                    ]
                } );


                $('#txt_deadline').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true

                });

                $("#cbo_departments,#cbo_employees").select2();



                var createToolBarButton=function(){
                    var _btnNew='<button class="btn btn-white btn-sm"  id="btn_new_task" data-toggle="modal" data-target="#info_modal" data-placement="left" title="Publish new task" >'+
                        '<i class="fa fa-laptop"></i> Publish new task</button>';
                    $("div.toolbar").html(_btnNew);
                }();


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
                                    '<thead><tr><th>Name</th><th>Date Accomplished</th><th align=""><center>Accomplished</center></th></tr></thead>'+
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




                    $('#tbl_tasks_list tbody').on('click','button[name="edit_info"]',function(){
                        _txnMode="edit";
                        _selectRowObj=$(this).closest('tr');
                        var data=dt.row(_selectRowObj).data();

                        //console.log(data);
                        _selectedID=data.task_id;
                        $('input[name="task_title"]').val(data.task_title);
                        $('textarea[name="task_description"]').val(data.task_description);
                        $('input[name="submission_deadline"]').val(data.deadline);
                        $('#cbo_departments').select2('val',data.DepartmentIDList.split(","));
                        $('#cbo_employees').select2('val',data.UserIDList.split(","));




                        /*('input,textarea').each(function(){
                            var _elem=$(this);
                            $.each(data,function(name,value){
                                if(_elem.attr('name')==name){
                                    _elem.val(value);
                                }
                            });
                        });*/

                        $('#div_task_entry').show();
                        $('#div_task_list,#div_breadcrumbs').hide();

                    });


                    $('#tbl_tasks_list tbody').on('click','button[name="remove_info"]',function(){
                        _selectRowObj=$(this).closest('tr');
                        var data=dt.row(_selectRowObj).data();
                        _selectedID=data.task_id;
                        $('#modal_confirmation').modal('show');
                    });


                }();



            }();


            var bindEventHandlers=function(){



                $('#btn_new_task').click(function(){
                    _txnMode="new";
                    clearControls();
                    showTaskEntry();
                });

                $('#close-link,#btn_cancel').click(function(){
                    showTaskList();
                });

                $('#btn_save').click(function(){
                    if(_txnMode=="new"){
                        publishTask().done(function(response){
                            showNotification(response);
                            clearControls();
                            dt.row.add(response.row_added[0]).draw();
                        }).always(function(){
                            $('#btn_save').find('span').removeAttr('class');
                        });
                    }else{
                        updateTask().done(function(response){
                            showNotification(response);
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                            showTaskList();
                        });
                    }


                });


                $('#btn_yes').click(function(){
                    removeTask().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).remove().draw();
                    });
                });


            }();


            var publishTask=function(){
                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"tasks/transaction/create",
                    "data":_data(),
                    "beforeSend": function(){
                        $('#btn_save').find('span').addClass('glyphicon glyphicon-refresh spinning');
                    }
                });
            };


            var updateTask=function(){
                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"tasks/transaction/modify",
                    "data":_data(),
                    "beforeSend": function(){
                        $('#btn_save').find('span').addClass('glyphicon glyphicon-refresh spinning');
                    },
                    "complete": function(){
                        $('#btn_save').find('span').removeAttr('class');
                    }
                });
            };

            var removeTask=function(){
                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"tasks/transaction/delete",
                    "data":{task_id : _selectedID}
                });
            };


            var showNotification=function(value){
                PNotify.removeAll(); //remove all notifications
                new PNotify({
                    title: 'Notification',
                    text:  value.msg,
                    type:  value.stat
                });
            };

            var _data=function(){

                var serialData=$('#frm_task').serializeArray();

                var departments=$('#cbo_departments').select2('data');
                $.each(departments,function(i,value){
                    serialData.push(
                        {name:"departments[]",value: value.id}
                    );
                });

                var employees=$('#cbo_employees').select2('data');
                $.each(employees,function(i,value){
                    serialData.push(
                        {name:"employees[]",value: value.id}
                    );
                });

                if(_txnMode=="edit"){
                    serialData.push(
                        {name:"task_id",value: _selectedID}
                    );
                }


                return serialData;
            };



            var showTaskList=function(){
                $('#div_task_list,#div_breadcrumbs').show();
                $('#div_task_entry').hide();
            };

            var showTaskEntry=function(){
                $('#div_task_entry').show();
                $('#div_task_list,#div_breadcrumbs').hide();
            }

            var clearControls=function(){
                //var _currentDate=<?php echo date('m/d/Y').";" ; ?>
                $('input[name="task_title"]').val('');
                $('textarea[name="task_description"]').val('');
                $('input[name="submission_deadline"]').val('');
                $('#cbo_departments').select2('val',0);
                $('#cbo_employees').select2('val',0);
                $('#txt_deadline').val(moment().format('M/D/YYYY') );
            };
        });



    </script>




</body>

</html>
