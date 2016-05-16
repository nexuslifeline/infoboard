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

<?php
 
  print_r($this->session->userdata)

?>

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
                                    <div class="summernote" style="margin-bottom: 0px;">

                                    </div>
                                    <button id="btn_publish" type="button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary" style="margin-top: -55px;">Publish this Announcement</button>



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
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  id="datepicker1" type="text" class="form-control" value="03/04/2014">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="font-noraml">End Publish Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  id="datepicker2" type="text" class="form-control" value="03/04/2014">
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

                                        <div class="input-group"><input type="text" class="form-control"> <span class="input-group-btn"> <button type="button" class="btn btn-primary">Go!
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

                                                       <?php echo $row->announce_description; ?>

                                                        <br /><br />
                                                        <small class="text-navy">Posted by : Paul Christain Rueda</small>
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


    <script>
        $(document).ready(function(){

            var InitializeControls=function(){

                $('.summernote').summernote({
                    height:100,
                    onImageUpload: function(files, editor, $editable) {
                        sendFile(files[0],editor,$editable);
                    }
                });

                $("#cbo_departments").select2();

                $('#datepicker1,#datepicker2').datepicker({
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


                                var row=response.row_added[0];
                                var _structure='<div class="timeline-item" id="'+row.announce_id+'">';
                                _structure+='<div class="row">';
                                _structure+='<div class="col-lg-3 col-sm-3 col-xs-3 date">';
                                _structure+='<i class="fa fa-file-text"></i>';
                                _structure+='<span id="day-posted">'+row.DayPosted+'</span><br/>';
                                _structure+='<span id="time-posted">'+row.TimePosted+'</span><br/>';
                                _structure+='<small id="time-description" class="text-navy">'+row.TimeDescription+'</small>';
                                _structure+='</div>';
                                _structure+='<div class="col-lg-9 col-sm-9 col-xs-9 content no-top-border">';
                                _structure+=row.announce_description+'<br /><br />';
                                _structure+='<small class="text-navy">Posted by : Paul Christain Rueda</small><br />';
                                _structure+='<small class="text-navy">Departments : '+row.DepartmentList+'</small>';
                                _structure+='<br /><br /></div> </div></div>';

                                $('#div-announcements').prepend(_structure);

                            });
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
                    success: function(data){
                        //alert(data);
                        editor.insertImage(welEditable, data);
                        //$('button[data-original-title="Resize Quarter"]').click();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus+" "+errorThrown);
                    }
                });
            }










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
