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


    <!-- SUmmernote -->
    <link href="assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

    <link href="assets/css/plugins/select2/select2.min.css" rel="stylesheet">

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


        img{
            height: 150px;
            max-height: 250px;

        }

        .select2-container{
            min-width: 100%;
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


                <!--breadcrumbs-->
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <br />
                        <ol class="breadcrumb">
                            <li>
                                <a href="Dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                               Published Announcements
                            </li>
                        </ol>
                    </div>
                </div><!--breadcrumbs-->

                <!--text editor-->
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="ibox" style="margin-left: -15px;margin-right: -15px;">

                        <div class="ibox-content no-padding">


                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="div_loading_upload" style="display: none;">
                                            <br /><center>Please wait while image is being uploaded..<br /><br />
                                            <img src="images/ajax-loader-lg.gif" /></center><br /><br />
                                    </div>

                                    <div class="summernote_container">
                                        <div class="summernote" style="margin-bottom: 0px;">

                                        </div>


                                        <button id="btn_publish" type="button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary" style="margin-top: -55px;">Publish this Announcement</button>

                                    </div>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>


                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin: 0px;">
                        <br />
                        <div class="panel panel-default" style="margin-top: 5px;">

                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="font-noraml">Start Publish Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  id="datepicker1" type="text" class="form-control" value="<?php echo date('m/d/Y'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="font-noraml">End Publish Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  id="datepicker2" type="text" class="form-control" value="<?php echo date('m/d/Y'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>
                                        Publish to Department
                                    </p>

                                    <select id="cbo_departments" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" multiple="multiple">
                                        <?php foreach($departments as $row){ ?>
                                            <option value="<?php echo($row->department_id); ?>"><?php echo($row->department_title); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <br />
                            </div>

                        </div>





                    </div>


                </div><!--text editor-->

                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="ibox collapsed" style="margin-left: -15px;margin-right: -15px;margin-top: -15px;">



                        <div class="ibox-content">
                            <div class="row">
                                <label class="col-sm-12 control-label">Search your previous Announcements</label>


                                <div class="col-lg-12 col-md-12 col-sm-12">

                                        <div class="input-group"><input id="txt_search_announcement" type="text" class="form-control"> <span class="input-group-btn"> <button id="btn_go_search" type="button" class="btn btn-primary">Go!
                                                </button> </span>
                                        </div>
                                </div>
                            </div>
<br /><br />
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="div-announcements" class="ibox-content inspinia-timeline">

                                        <?php foreach($announcements as $row){  ?>

                                            <div class="timeline-item" id="<?php echo $row->announce_id; ?>">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-3 col-xs-3 date">
                                                        <i class="fa fa-file-text"></i>
                                                        <span id="day-posted"><?php echo $row->DayPosted; ?></span>
                                                        <br/>
                                                        <span id="time-posted"><?php echo $row->TimePosted; ?></span>
                                                        <br/>
                                                        <small id="time-description" class="text-navy"><?php echo $row->TimeDescription; ?></small>
                                                    </div>
                                                    <div class="col-lg-9 col-sm-9 col-xs-9 content no-top-border">
                                                        <a id="btn_edit_announcement" data-id="<?php echo $row->announce_id; ?>" class="btn btn-xs btn-white pull-right"><i class="fa fa-pencil"></i>  </a>
                                                        <a id="btn_remove_announcement" data-id="<?php echo $row->announce_id; ?>" class="btn btn-xs btn-white pull-right"><i class="fa fa-trash"></i> </a>
                                                        <?php echo $row->announce_description; ?>

                                                        <br /><br />
                                                        <small class="text-navy">Posted by : <?php echo $row->PostedBy; ?></small>
                                                        <br />
                                                        <small class="text-navy">Departments : <?php echo $row->DepartmentList; ?></small>
                                                        <br />
                                                        <br />
                                                    </div>

                                                </div>
                                            </div>

                                        <?php     }  ?>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div><!-- /announcements -->



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




            <div id="modal_announcement"  class="modal fade" tabindex="-1" role="dialog"><!--modal-->
            <div class="modal-dialog modal-sm" style="width: 65%;">
                <div class="modal-content"><!---content--->
                    <div class="modal-header">
                        <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title"><span id="modal_mode"> </span>Modify Announcement</h4>

                    </div>

                    <div class="modal-body">
                        <div id="modal_loading_image" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <center><img src="images/ajax-loader-lg.gif"></center>
                            </div>
                        </div>


                        <div id="modal_announcement_content" class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="font-noraml">Start Publish Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  id="dtStart" type="text" class="form-control" value="03/04/2014">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="font-noraml">End Publish Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  id="dtEnd" type="text" class="form-control" value="03/04/2014">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <p>
                                        Publish to Department
                                    </p>

                                    <select id="cbo_departments_update" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" multiple="multiple">
                                        <?php foreach($departments as $row){ ?>
                                            <option value="<?php echo($row->department_id); ?>"><?php echo($row->department_title); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="div_loading_upload" style="display: none;">
                                    <br /><center>Please wait while image is being uploaded..<br /><br />
                                        <img src="images/ajax-loader-lg.gif" /></center><br /><br />
                                </div>

                                <div class="summernote_container">
                                    <div class="summernote2" style="margin-bottom: 0px;">

                                    </div>
                                </div>
                            </div>

                        </div>





                    </div>

                    <div class="modal-footer">
                        <button id="btn_update_announcement" type="button" class="btn btn-primary">Update Announcement</button>
                        <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        $(document).ready(function(){

            var InitializeControls=function(){

                var _obj={};
                $('.summernote,.summernote2').summernote({
                    height:100,
                    onImageUpload: function(files, editor, $editable) {

                        sendFile(files[0],editor,$editable);
                    }
                });


                $("#cbo_departments,#cbo_departments_update").select2();

                $('#datepicker1,#datepicker2,#dtStart,#dtEnd').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true

                });
            }();


            var bindEventListeners=function(){

                    $('#btn_publish').click(function(){ //triggers when publish announcement is clicked

                    //$.each($('#cbo_departments'),function(i,value){
                       // alert(value);
                    //});
                    if(validateRequiredFields()){
                            publishAnnouncement().success(function(response){
                                PNotify.removeAll(); //remove all notifications
                                new PNotify({
                                    title: 'Success!',
                                    text:  response.msg,
                                    type:  response.stat
                                }); //create new notification base on server response

                                $('#div-announcements').prepend(createAnnouncementStructure(response.row_added[0]));
                                $('.summernote').code('');

                            });
                    }
                });

                    //triggers when Trash button of announcement is click
                var _selectedID;
                $('#div-announcements').on('click','#btn_remove_announcement',function(){
                        //alert($(this).data('id'));
                        _selectedID=$(this).data('id');
                        $('#modal_confirmation').modal('show');
                });

                $('#div-announcements').on('click','#btn_edit_announcement',function(){


                    //setTimeout(function(){$('#modal_announcement_content').show();$('#modal_loading_image').hide(); },2000);
                     _selectedID=$(this).data('id');

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"Announcements/GetAnnouncementInfo/"+_selectedID,
                        "beforeSend": function(){
                            $('#modal_loading_image').show();
                            $('#modal_announcement_content').hide();
                        },
                        "success": function(response){
                            $('#dtStart').val(response[0].ShownDate);
                            $('#dtEnd').val(response[0].ExpireDate);
                            $('#cbo_departments_update').select2('val',response[0].DepartmentIDList.split(","));
                            $('.summernote2').code(response[0].announce_description);
                        },
                        "complete": function(){
                            $('#modal_loading_image').hide();
                            $('#modal_announcement_content').show();
                        }
                    });

                    $('#modal_announcement').modal('show');
                });






                //confirm deletion YES
                $('#btn_yes').click(function(){
                    removeAnnouncement(_selectedID).success(function(response){
                        PNotify.removeAll(); //remove all notifications
                        new PNotify({
                            title:  "Success",
                            text:  response.msg,
                            type:  response.stat
                        });

                        $('div.timeline-item[id="'+_selectedID+'"]').remove();

                    }).error(function(jqXHR, textStatus, errorThrown){
                        console.log(jqXHR);
                    });
                });


                $('#btn_go_search').click(function(){
                    var _searchText=$('#txt_search_announcement').val();
                    $('#div-announcements').html('<br /><center><img src="images/ajax-loader-lg.gif" /></center>');

                    searchAnnouncement(_searchText).success(function(response){
                        $('#div-announcements').html('');

                        $.each(response,function(i,value){
                            $('#div-announcements').append(createAnnouncementStructure(value));
                        });

                    });
                });


                $('#btn_update_announcement').click(function(){
                    updateAnnouncement(_selectedID).success(function(response){

                        PNotify.removeAll(); //remove all notifications
                        new PNotify({
                            title:  "Success",
                            text:  response.msg,
                            type:  response.stat
                        });

                        var _item=$('#div-announcements').find('div[id="'+_selectedID+'"]');
                        _item.replaceWith(createAnnouncementStructure(response.row_updated[0]));
                        $('#modal_announcement').modal('hide');

                    }).error(function(xhr){
                        console.log(xhr);
                    });
                });


                $('#txt_search_announcement').on('input', function() {
                   if($(this).val()==""){
                       $('#btn_go_search').click();
                   }
                });



            }();






            var validateRequiredFields=function(){
                var departments=$('#cbo_departments').select2('data');
                if(departments.length==0){
                    PNotify.removeAll(); //remove all notifications
                    new PNotify({
                        title: 'Error!',
                        text:  "Please select atleast one department.",
                        type:  "Error"
                    });

                    return false;
                }


                return true;
            };


            var removeAnnouncement=function(pid){
                //alert(pid);
                //var serialData=[];
                //serialData.push({
                    //name: "announcementid",value:pid
                //});
                //alert(pid);
                //console.log(serialData);
                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Announcements/RemoveAnnouncement/"+pid
                });
            };


            var publishAnnouncement=function(){

                var announcement = $('.summernote').code();
                var serialData=[];

                serialData.push(
                    { name:"description",value: announcement },
                    { name:"start",value: $('#datepicker1').val() },
                    { name:"end",value: $('#datepicker2').val() }
                );

                var departments=$('#cbo_departments').select2('data');
                $.each(departments,function(i,value){
                    serialData.push(
                        {name:"departments[]",value: value.id}
                    );
                });

                //console.log(serialData);

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Announcements/PublishAnnouncement",
                    "data":serialData
                });

            };


            var updateAnnouncement=function(id){

                var announcement = $('.summernote2').code();
                var serialData=[];

                serialData.push(
                    { name:"id",value: id },
                    { name:"description",value: announcement },
                    { name:"start",value: $('#dtStart').val() },
                    { name:"end",value: $('#dtEnd').val() }
                );

                var departments=$('#cbo_departments_update').select2('data');
                $.each(departments,function(i,value){
                    serialData.push(
                        {name:"departments[]",value: value.id}
                    );
                });

                //console.log(serialData);

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Announcements/UpdateAnnouncement",
                    "data":serialData
                });

            };


            var sendFile=function(file,editor,welEditable) {
                data = new FormData();
                data.append("file", file);

                $.ajax({
                    url: "Announcements/UploadImage",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    beforeSend: function(){
                        var _container=welEditable.closest('.summernote_container');
                        _container.siblings('.div_loading_upload').show();
                        _container.hide();
                    },
                    success: function(data){
                        //alert(data);
                        editor.insertImage(welEditable, data);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus+" "+errorThrown);
                    },
                    complete : function(){
                        var _container=welEditable.closest('.summernote_container');
                        _container.siblings('.div_loading_upload').hide();
                        _container.show();
                    }
                });
            }


            var createAnnouncementStructure=function(row){
                var _structure='<div class="timeline-item" id="'+row.announce_id+'">';
                _structure+='<div class="row">';
                _structure+='<div class="col-lg-3 col-sm-3 col-xs-3 date">';
                _structure+='<i class="fa fa-file-text"></i>';
                _structure+='<span id="day-posted">'+row.DayPosted+'</span><br/>';
                _structure+='<span id="time-posted">'+row.TimePosted+'</span><br/>';
                _structure+='<small id="time-description" class="text-navy">'+row.TimeDescription+'</small>';
                _structure+='</div>';
                _structure+='<div class="col-lg-9 col-sm-9 col-xs-9 content no-top-border">';
                _structure+='<a id="btn_edit_announcement" data-id="'+row.announce_id+'" class="btn btn-xs btn-white pull-right"><i class="fa fa-pencil"></i> </a>';
                _structure+='<a id="btn_remove_announcement" data-id="'+row.announce_id+'" class="btn btn-xs btn-white pull-right"><i class="fa fa-trash"></i> </a>';
                _structure+=row.announce_description+'<br /><br />';
                _structure+='<small class="text-navy">Posted by : '+row.PostedBy+'</small><br />';
                _structure+='<small class="text-navy">Departments : '+row.DepartmentList+'</small>';
                _structure+='<br /><br /></div> </div></div>';

                return   _structure;
            };


            var searchAnnouncement=function(_criteria){
                data=[];
                data.push({name:"criteria",value:_criteria});
                return $.ajax({
                    "dataType":"json",
                    "type":"GET",
                    "url":"Announcements/SearchAnnouncements",
                    "data":data
                });
            };


            var updater=function(){

                    setInterval(function(){
                            var _parent=$('#div-announcements');

                            $.ajax({
                                "dataType":"json",
                                "type":"GET",
                                "url":"Announcements/GetTimeDescriptionList",
                                "success":function(response){
                                    $.each(response,function(i,value){
                                        //alert(value.announce_id);
                                        var _item=_parent.find('div[id="'+value.announce_id+'"]');
                                        _item.find('small[id="time-description"]').html(value.TimeDescription);
                                        _item.find('span[id="day-posted"]').html(value.DayPosted);
                                        _item.find('span[id="time-posted"]').html(value.TimePosted);
                                        //console.log(_item);
                                    });
                                }
                            });
                    },5000);

            }();








        });


    </script>



</body>

</html>
