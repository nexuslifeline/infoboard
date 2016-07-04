<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Infoboard | Dashboard</title>


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


    <link href="assets/js/plugins/contextmenu/jquery.contextMenu.css" rel="stylesheet">

    <style>
        .toolbar{
            float: left;
        }

        .tools {
            float: left;
            margin-bottom:5px;
        }

        [contenteditable="true"]:active,
        [contenteditable="true"]:focus{
            border:3px solid #F5C116;
            outline:none;

            background: white;
        }

        .notes div:hover{
            cursor: pointer;
        }

        table{
            table-layout: fixed;
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

<?php
 
  //print_r($this->session->userdata)
    //print_r($announcements);
?>

        <div class="wrapper wrapper-content"><!-- /main content area -->



        <div class="row">
            <div class="col-lg-12">


                <div class="panel-group" id="accordion">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="text-navy"><i class="fa fa-book"></i> Announcements</span></a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div id="div_announcements" class="panel-body">

                                <br />

                                <?php foreach($announcements as $row){  ?>

                                    <div class="timeline-item" data-id="<?php echo $row->announce_id; ?>">
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
                                                <small class="text-navy">Posted by : <?php echo $row->PostedBy; ?></small>
                                                <br />
                                                <small class="text-navy">Departments : <?php echo $row->DepartmentList; ?></small>
                                                <br />
                                                <br />


                                                <br /><br />


                                                <?php $attachments=json_decode($row->attachment_json); $attach_ctr=count($attachments); ?>

                                                <?php if($attach_ctr>0){ ?>
                                                    <div class="hr-line-dashed"></div>
                                                    <p><i class="fa fa-paperclip"></i> <span id="attach_count"><?php echo $attach_ctr; ?> </span> attachments</p>
                                                    <p>
                                                            <span style="margin-left: 10px;">



                                                                <?php  $i=0; foreach($attachments as $file){ ?>
                                                                    <?php echo ($i>0?' , ':''); ?><a href="<?php echo $file->directory; ?>"><i class="fa fa-file"></i> <?php echo $file->file; ?></a>
                                                                    <?php $i++; }?>

                                                            </span>
                                                    </p>
                                                    <div class="hr-line-dashed"></div><br />
                                                <?php  }?>


                                            </div>

                                        </div>
                                    </div>

                                <?php     }  ?>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="text-navy"><i class="fa fa-info-circle"></i> Events</span></a>
                            </h5>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div id="div_events" class="panel-body">

                                <br />

                                <?php foreach($events as $row){  ?>

                                    <div class="timeline-item" data-id="<?php echo $row->announce_id; ?>">
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
                                                <small class="text-navy">Posted by : <?php echo $row->PostedBy; ?></small>
                                                <br />
                                                <small class="text-navy">Departments : <?php echo $row->DepartmentList; ?></small>
                                                <br />
                                                <br />

                                                <br /><br />


                                                <?php $attachments=json_decode($row->attachment_json); $attach_ctr=count($attachments); ?>

                                                <?php if($attach_ctr>0){ ?>
                                                    <div class="hr-line-dashed"></div>
                                                    <p><i class="fa fa-paperclip"></i> <span id="attach_count"><?php echo $attach_ctr; ?> </span> attachments</p>
                                                    <p>
                                                            <span style="margin-left: 10px;">



                                                                <?php  $i=0; foreach($attachments as $file){ ?>
                                                                    <?php echo ($i>0?' , ':''); ?><a href="<?php echo $file->directory; ?>"><i class="fa fa-file"></i> <?php echo $file->file; ?></a>
                                                                    <?php $i++; }?>

                                                            </span>
                                                    </p>
                                                    <div class="hr-line-dashed"></div><br />
                                                <?php  }?>


                                            </div>

                                        </div>
                                    </div>

                                <?php     }  ?>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="text-navy"><i class="fa fa-newspaper-o"></i> News and Articles</span></a>
                            </h5>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div id="div_news" class="panel-body">

                                <br />

                                <?php foreach($news as $row){  ?>

                                    <div class="timeline-item" data-id="<?php echo $row->announce_id; ?>">
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
                                                <small class="text-navy">Posted by : <?php echo $row->PostedBy; ?></small>
                                                <br />
                                                <small class="text-navy">Departments : <?php echo $row->DepartmentList; ?></small>
                                                <br />
                                                <br />



                                                <br /><br />


                                                <?php $attachments=json_decode($row->attachment_json); $attach_ctr=count($attachments); ?>

                                                <?php if($attach_ctr>0){ ?>
                                                    <div class="hr-line-dashed"></div>
                                                    <p><i class="fa fa-paperclip"></i> <span id="attach_count"><?php echo $attach_ctr; ?> </span> attachments</p>
                                                    <p>
                                                            <span style="margin-left: 10px;">



                                                                <?php  $i=0; foreach($attachments as $file){ ?>
                                                                    <?php echo ($i>0?' , ':''); ?><a href="<?php echo $file->directory; ?>"><i class="fa fa-file"></i> <?php echo $file->file; ?></a>
                                                                    <?php $i++; }?>

                                                            </span>
                                                    </p>
                                                    <div class="hr-line-dashed"></div><br />
                                                <?php  }?>

                                            </div>

                                        </div>
                                    </div>

                                <?php     }  ?>
                            </div>
                        </div>
                    </div>

                    <div class="<?php echo $hidden ?> panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="text-navy"><i class="fa fa-laptop"></i> My Task list</span></a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in">
                            <div class="panel-body">

                                <div class="wrapper wrapper-content animated fadeInUp">
                                    <ul class="notes">

                                    <?php foreach($tasks as $task){ ?>
                                        <li data-id="<?php echo $task->task_id; ?>">
                                            <div class='divnote'  style="<?php echo ($task->is_expired=='1'?'background-color:#d3d3d3;':''); ?>">
                                                <small><?php echo  $task->posted_date; ?></small>
                                                <h4><?php echo $task->task_title; ?></h4>
                                                <p><?php echo $task->task_description; ?></p>

                                            </div>
                                        </li>
                                    <?php } ?>



                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="<?php echo $hidden ?> panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="text-navy"><i class="fa fa-check"></i> Task History</span></a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">


                                <div id="div_task_accomplished_list" class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">

                                            <table id="tbl_tasks_list" class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th width="10%">Title</th>
                                                        <th width="60%">Description</th>
                                                        <th width="10%">Deadline</th>
                                                        <th width="10%">Accomplished Date</th>
                                                        <th width="10%">Action</th>
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






<!-- PNotify -->
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.core.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.nonblock.js"></script>

<!-- Data Tables -->
<script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


    <!-- context menu -->
    <script src="assets/js/plugins/contextmenu/jquery.ui.position.js"></script>
    <script src="assets/js/plugins/contextmenu/jquery.contextMenu.js"></script>


    <script type="text/javascript">
    

    
   var  showNavigation=function(a){
                
       var serialData=[]; var _selectRowObj;
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






    $(document).ready(function(){
        var _selectedTaskID; var _selectRowObj; var dt;

        var initializeContextMenu=function(){
            $.contextMenu({
                selector: '.notes li',
                trigger: 'left',
                callback: function(key, options) {
                    //var m = "clicked: " + key;
                    //window.console && console.log(m) || alert(m);
                    if(key=='task'){
                        window.open('comments?task_id='+_selectedTaskID,'_blank');
                    }else{
                        $('.notes .link_accomplished').click();
                    }
                },
                items: {
                    "task": {name: "Open this Task"}


                }
            });



        };


        var initializeControls=function(){

            dt = $('#tbl_tasks_list').DataTable( {
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax": "dashboard/transaction/accomplished",
                "columns": [
                    { "targets": [1],"data": "task_title"},
                    { "targets": [2],"data": "task_description" },
                    { "targets": [3],"data": "submission_deadline" },
                    { "targets": [4],"data": "date_accomplished" },
                    {
                        "targets": [5],
                        "data": null,
                        "render": function (data, type, full, meta){
                            var btn_undo='<button class="btn btn-white btn-sm" id="btn_open_task"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Open Task"><i class="fa fa-external-link"></i> Open Task</button>';
                            return '<center>'+btn_undo+'</center>';
                        }
                    }

                ]
            } );



            initializeContextMenu();



        }();







                var bindEventHandlers=function(){
                    $('.notes').on('click','li',function(){
                        _selectedTaskID=$(this).data('id');
                        //window.open('comments?task_id='+_id,'_blank');
                    });


                    $('.notes').on('click','.link_accomplished',function(){


                        var st = $(this).data('status-date');

                    if(st==0){

                        _selectedTaskID=$(this).data('id');
                        $('#modal_confirmation').modal('show');

                    }else{


                    PNotify.removeAll(); //remove all notifications
                    new PNotify({
                        title:  "Notifications",
                        text:  'This post has already expired !',
                        type:  'error'
                    });

                        return;

                    }



                    });

                    /*$('#tbl_tasks_list').on('click','#btn_undo',function(){
                        _selectRowObj=$(this).closest('tr');
                        var data=dt.row(_selectRowObj).data();
                        _selectedTaskID=data.task_id;
                        markAccomplished(0).success(function(response){
                            //console.log(response);
                            showNotification(response);
                            dt.ajax.reload();
                        });

                    });*/



                    $('#tbl_tasks_list').on('click','#btn_open_task',function(){
                        _selectRowObj=$(this).closest('tr');
                        var data=dt.row(_selectRowObj).data();
                        _selectedTaskID=data.task_id;

                        window.open('comments?task_id='+_selectedTaskID,'_blank');
                    });

                    $('#btn_yes').click(function(){
                        //alert(_selectedTaskID);
                        markAccomplished(1).success(function(response){
                            //console.log(response);
                            showNotification(response);
                            $('.notes').find('li[data-id="'+_selectedTaskID+'"]').remove();
                            dt.ajax.reload();
                            initializeContextMenu();
                        });
                    });

                }();



                var markAccomplished=function(val){
                    var data=[];
                    data.push({"name" : "task_id", "value" :_selectedTaskID},{"name" : "mark", "value" :val});
                    return $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "data":data,
                        "url":"dashboard/transaction/marking"
                    });
                };





                var updater=function(){


                    setInterval(function(){

                        var _lastAnnounceID=$('#div_announcements').find('.timeline-item:first').data('id');
                        var _lastTaskID=$('.notes').find('li:last').data('id');
                        var data=[];
                        data.push({name : "last_announce_id" , value: _lastAnnounceID},{name : "last_task_id" , value: _lastTaskID});

                        $.ajax({
                            "dataType":"json",
                            "type":"GET",
                            "data": data,
                            "url":"dashboard/transaction/updater",
                            "success":function(response){
                                var announcements=response.announcements;
                                var tasks=response.tasks;

                                /**     SOLUTION 1 : get the last id shown, and returns all new rows recently added and not yet shown on browser, problem is when announcement is edited changes cannot be seen at realtime

                                    $.each(announcements,function(i,value){
                                        $('#div_announcements').prepend(createAnnouncementStructure(value));
                                    });

                                 **/



                                //SOLUTION 2 : to make sure we listen to all changes made on server, all rows are return as response but heavier JSON is received and parse

                                var _parent;
                                var _newAnnounceCtr=0;
                                $.each(announcements,function(i,value){
                                    _parent=$('#div_announcements');
                                    var _target=_parent.find('.timeline-item[data-id="'+value.announce_id+'"]');

                                    if(_target.length==0){
                                        _newAnnounceCtr++;
                                        _parent.prepend(createAnnouncementStructure(value));
                                    }else{
                                        _target.replaceWith(createAnnouncementStructure(value));
                                    }

                                });


                                if(_newAnnounceCtr>0){
                                    showNotification({msg:_newAnnounceCtr+" new announcement recently published.",stat:"info"});
                                }



                                var events=response.events;
                                var _eventCtr=0;
                                $.each(events,function(i,value){
                                    _parent=$('#div_events');
                                    var _target=_parent.find('.timeline-item[data-id="'+value.announce_id+'"]');

                                    if(_target.length==0){
                                        _eventCtr++;
                                        _parent.prepend(createAnnouncementStructure(value));
                                    }else{
                                        _target.replaceWith(createAnnouncementStructure(value));
                                    }

                                });


                                if(_eventCtr>0){
                                    showNotification({msg:_eventCtr+" new events recently published.",stat:"info"});
                                }


                                var news=response.news;
                                var _newsCtr=0;
                                $.each(news,function(i,value){
                                    _parent=$('#div_news');
                                    var _target=_parent.find('.timeline-item[data-id="'+value.announce_id+'"]');

                                    if(_target.length==0){
                                        _newsCtr++;
                                        _parent.prepend(createAnnouncementStructure(value));
                                    }else{
                                        _target.replaceWith(createAnnouncementStructure(value));
                                    }

                                });


                                if(_newsCtr>0){
                                    showNotification({msg:_newsCtr+" new news recently published.",stat:"info"});
                                }





                                var _newTaskCtr=0;
                                $.each(tasks,function(i,value){
                                    var _parent=$('.notes');
                                    var _target=_parent.find('li[data-id="'+value.task_id+'"]');

                                    if(_target.length==0){
                                        _newTaskCtr++;
                                        _parent.prepend(createNotesStructure(value));
                                    }else{
                                        _target.replaceWith(createNotesStructure(value));
                                    }
                                });

                                if(_newTaskCtr>0){
                                    showNotification({msg:_newTaskCtr+" new task recently published.",stat:"info"});
                                }


                                //initializeContextMenu();

                            }
                        });
                    },5000);



                }();





                var createAnnouncementStructure=function(row){
                    var _structAttachment='';
                    var _attachFiles;
                    //alert(row.attachment_json);


                    if(row.attachment_json!=''){
                        _attachFiles=JSON.parse(row.attachment_json);
                    }else{
                        _attachFiles=null;
                    }





                    if(_attachFiles!=null){
                        $.each(_attachFiles,function(i,value){
                            _structAttachment+=(i>0?' , ':'')+'<a href="'+value.directory+'"><i class="fa fa-file"></i> '+value.file+'</a>';
                        });
                    }


                    var _full='<div class="hr-line-dashed"></div>'+
                        '<p><i class="fa fa-paperclip"></i> <span id="attach_count">'+(_attachFiles==null?0:_attachFiles.length)+' </span> attachments</p>'+
                        '<p>'+
                        '<span style="margin-left: 10px;">'+
                        _structAttachment+
                        '</span>'+
                        '</p>'+
                        '<div class="hr-line-dashed"></div><br />';




                    var _structure='<div class="timeline-item" data-id="'+row.announce_id+'">';
                    _structure+='<div class="row">';
                    _structure+='<div class="col-lg-3 col-sm-3 col-xs-3 date">';
                    _structure+='<i class="fa fa-file-text"></i>';
                    _structure+='<span id="day-posted">'+row.DayPosted+'</span><br/>';
                    _structure+='<span id="time-posted">'+row.TimePosted+'</span><br/>';
                    _structure+='<small id="time-description" class="text-navy">'+row.TimeDescription+'</small>';
                    _structure+='</div>';
                    _structure+='<div class="col-lg-9 col-sm-9 col-xs-9 content no-top-border">';
                    //_structure+='<a id="btn_edit_announcement" data-id="'+row.announce_id+'" class="btn btn-xs btn-white pull-right"><i class="fa fa-pencil"></i> </a>';
                    //_structure+='<a id="btn_remove_announcement" data-id="'+row.announce_id+'" class="btn btn-xs btn-white pull-right"><i class="fa fa-trash"></i> </a>';
                    _structure+=row.announce_description+'<br /><br />';
                    _structure+='<small class="text-navy">Posted by : '+row.PostedBy+'</small><br />';
                    _structure+='<small class="text-navy">Departments : '+row.DepartmentList+'</small>';
                    _structure+='<br /><br /><br /><br />'+
                    (_attachFiles==null?'':_full)+
                    '</div> </div></div>';

                    return   _structure;
                };


                var createNotesStructure=function(row){
                    var _structure='<li data-id="'+row.task_id+'">'+
                        '<div style="'+(row.is_expired=="1"?"background-color:#d3d3d3;":"")+'">'+
                                '<small>'+row.posted_date+'</small>'+
                                '<h4>'+row.task_title+'</h4>'+
                                '<p>'+row.task_description+'</p><br />'/*+
                                '<a class="link_accomplished" data-id="'+row.task_id+'" href="#"><i class="fa fa-square-o "></i> Mark as Accomplished</a>'+*/
                        '</div>'+
                        '</li>';

                    return _structure;
                };


                var showNotification=function(obj){
                    PNotify.removeAll(); //remove all notifications
                    new PNotify({
                        title:  "Success",
                        text:  obj.msg,
                        type:  obj.stat
                    });
                };





    });


</script>



</body>

</html>
