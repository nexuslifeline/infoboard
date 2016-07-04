<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Infoboard | Comment and File Archiving Section </title>


    <?php include('assets/includes/global_css.html'); ?>

    <!-- Checkbox / Radio -->
    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">




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
            border: 1px solid gray;
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

        #modal_file_upload{
            margin-top: 0px;
        }
        
        
        .note-editor .modal-dialog{
            margin-top: 20%;
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
    //print_r($files);
    ?>

    <div class="wrapper wrapper-content"><!-- /main content area -->

        <div id="modal_file_upload" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
            <div class="modal-dialog modal-sm">
                <div class="modal-content"><!---content--->
                    <div class="modal-header">
                        <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title"><span id="modal_mode"> </span>Upload File</h4>

                    </div>

                    <div class="modal-body">
                       <input type="file" name="file_upload[]" multiple>
                    </div>

                    <div class="modal-footer">
                        <button id="btn_upload" type="button" class="btn btn-primary">Upload File</button>

                    </div>
                </div><!---content---->
            </div>
        </div><!---modal-->
      

        <?php $task_info=$task[0]; ?>
        <div class="row">

                <div class="col-lg-12 animated fadeInRight">
                    <div class="mail-box-header">
                        <div class="pull-right tooltip-demo">
                            <a href="#" class="btn btn-white btn-sm btn_upload_file <?php echo ($task_info->is_expired?"disabled":""); ?>"" data-toggle="tooltip" data-placement="top" title="Attach file"><i class="fa fa-paperclip"></i> Attach file</a>
                            <a href="#" class="btn btn-white btn-sm btn_mark_accomplished <?php echo ($task_info->is_expired?"disabled":""); ?> <?php echo ($task_info->posted_by_user==$this->session->user_account_id?"":"hidden"); ?>" data-toggle="tooltip" data-placement="top" title="Mark as Completed"><i class="fa fa-check-circle"></i> Mark as Completed</a>
                        </div>
                        <h2>
                            <?php echo $task_info->task_title; ?>

                        </h2>

                        <?php if($task_info->is_expired=='1'){ ?>
                            <span style="color:red;">This post is already expired.</span>
                        <?php } ?>



                        <div class="mail-tools tooltip-demo m-t-md">
                            <h5>
                                <span class="pull-right font-noraml">Posted : <?php echo $task_info->posted_date; ?></span>
                                <span class="font-normal">Published by : </span><?php echo $task_info->PostedByUser; ?>

                            </h5>
                        </div>
                    </div>
                    <div class="mail-box">


                        <div class="mail-body">
                            <?php echo $task_info->task_description; ?>
                        </div>
                        <div class="mail-attachment">
                            <div class="pull-right">
                                <a  href="#" class="btn btn-white btn-sm btn_upload_file <?php echo ($task_info->is_expired?"disabled":""); ?>" data-toggle="tooltip" data-placement="top" title="Attach file"><i class="fa fa-paperclip"></i> Attach file</a>
                                <a href="#" class="btn btn-white btn-sm btn_mark_accomplished <?php echo ($task_info->is_expired?"disabled":""); ?> <?php echo ($task_info->posted_by_user==$this->session->user_account_id?"":"hidden"); ?> " data-toggle="tooltip" data-placement="top" title="Mark as Completed"><i class="fa fa-check-circle"></i> Mark as Completed</a>

                            </div>


                            <p>
                                <span><i class="fa fa-paperclip"></i> <span id="attach_count"></span> attachments - </span>
                                <a href="#">Download all</a>
                                |
                                <a href="#">View all images</a>
                            </p>

                            <div class="attachment_file">

                                <?php foreach($files as $file){  ?>
                                <div class="file-box"  data-id="<?php echo $file->file_id; ?>">
                                    <div class="file">
                                        <a href="<?php echo $file->file_directory; ?>">
                                            <span class="corner"></span>

                                            <div class="icon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <div class="file-name">
                                                <?php echo $file->file_name; ?>
                                                <br/>
                                                <small>Added: <?php echo $file->date_posted; ?></small><br />
                                                <small>By : <?php echo $file->posted_by; ?></small>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <?php } ?>



                            </div>

                            <div class="clearfix"></div>

                        </div>


                        <div class="clearfix"></div>




                        <div class="clearfix"></div>

                        <div class="panel blank-panel">
                        <div class="panel-heading">
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-1" data-toggle="tab">Users messages</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                        <div class="tab-content">
                        <div class="tab-pane active" id="tab-1">
                            <div class="feed-activity-list">

                                <?php foreach($comments as $row){ ?>

                                    <div class="feed-element" data-id="<?php echo $row->comment_id; ?>">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="<?php echo $row->user_profile; ?>">
                                        </a>

                                        <div class="media-body">


                                            <div class="pull-right">
                                                <small class="pull-right text-navy"><?php echo $row->TimeDescription; ?></small> <br />
                                                <?php if($row->user_account_id==$this->session->user_account_id){ ?>
                                                    <a id="btn_remove_announcement" data-id="<?php echo $row->task_id; ?>" class="btn btn-xs btn-white"><i class="fa fa-trash"></i> </a>
                                                <?php } ?>
                                            </div>
                                            <strong><?php echo $row->employee; ?></strong>
                                            <p><?php echo $row->comments; ?></p>


                                            <small class="text-muted"><?php echo $row->DayPosted; ?></small>

                                        </div>
                                    </div>


                                <?php } ?>




                                
                                <br /><br /><br />

                                <div class="div_loading_upload" style="display: none;">
                                    <br /><center>Please wait while image is being uploaded..<br /><br />
                                        <img src="images/ajax-loader-lg.gif" /></center><br /><br />
                                </div>

                                <div class="summernote_container" style="border: 1px solid black;">
                                    <div class="summernote" style="margin-bottom: 0px;">

                                    </div>
                                </div>

                                <button id="btn_post_message" type="button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-custom" style="margin-top: 1%;"><span class=""></span> Post your message</button>

                            </div>

                        </div>

                        </div>

                        </div>

                        </div>

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






<!-- PNotify -->
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.core.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.nonblock.js"></script>




<!-- SUMMERNOTE -->
<script src="assets/js/plugins/summernote/summernote.min.js"></script>





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


$("body").toggleClass("mini-navbar");



    $(document).ready(function(){

        var _taskID=<?php echo $task_info->task_id; ?>;
        var _userAccountID=<?php echo $this->session->user_account_id; ?>;
        var _files;

        var initializeControls=function(){
            $('.summernote').summernote({
                    onImageUpload: function(files, editor, $editable) {
                        sendFile(files[0],editor,$editable);
                    }
            });
        }();



        var bindEventHandlers=function(){
            $('.btn_upload_file').click(function(){
                $('#modal_file_upload').modal('show');
            });

            $('input[type="file"]').on('change',function(event){
                _files=event.target.files;
            });

            $('#btn_upload').click(function(){
                var data=new FormData();

                $.each(_files,function(key,value){
                    data.append(key,value);
                });

                $.ajax({
                    url : 'comments/transaction/upload?task_id='+_taskID,
                    type : "POST",
                    data : data,
                    cache : false,
                    dataType : 'json',
                    processData : false,
                    contentType : false,
                    success : function(response){
                        showNotification(response);
                        $('#modal_file_upload').modal('hide');
                    }
                });


            });

            $('.btn_mark_accomplished').click(function(){
                markCompleted(1).done(function(response){
                    showNotification(response);
                });
            });


            $('#btn_post_message').click(function(){
                postMessage().done(function(reponse){
                    var _parent=$('.feed-activity-list');
                    //_parent.prepend(createMessageSpinner(reponse.posted_id));

                    var _lastSibling=_parent.find('.feed-element:last');
                    //console.log(_lastSibling);
                    if(_lastSibling.length==0){
                        _parent.prepend(createMessageSpinner(reponse.posted_id));
                    }else{
                        $(createMessageSpinner(reponse.posted_id)).insertAfter(_lastSibling);
                    }
                    $('.summernote').code('');
                }).always(function(){
                    $('#btn_post_message').find('span').removeAttr('class');
                });
            });

        }();




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
        };






        var postMessage=function(){

            var message = $('.summernote').code();
            var serialData=[];

            serialData.push({ name:"message",value: message });
            serialData.push({ name:"task_id",value: _taskID });

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"comments/transaction/messaging",
                "data":serialData,
                "beforeSend" : function(){
                    $('#btn_post_message').find('span').addClass('glyphicon glyphicon-refresh spinning');
                }
            });

        };




        var updater=function(){

            setInterval(function(){
                    //return;
                $.ajax({
                    "dataType":"json",
                    "type":"GET",
                    "url":"comments/transaction/messages?task_id="+_taskID,
                    "success":function(response){

                        //console.log(response);
                        var _parent=$('.feed-activity-list');
                        var _comments=response.comments;

                        $.each(_comments,function(i,value){
                                var _target=_parent.find('.feed-element[data-id="'+value.comment_id+'"]');


                                if(_target.length==0){
                                   // _parent.siblings().last().append(createMessageFeedStructure(value));
                                    var _lastSibling=_parent.find('.feed-element:last');
                                    if(_lastSibling.length>0){
                                        $(createMessageFeedStructure(value)).insertAfter(_lastSibling);
                                    }else{
                                        _parent.prepend(createMessageFeedStructure(value));
                                    }

                                }else{
                                    _target.replaceWith(createMessageFeedStructure(value));
                                }
                        });


                        var _attachCount=0;
                        var _attachParent=$('.attachment_file');
                        var _list=response.files;

                        console.log(_attachParent);
                        $.each(_list,function(i,value){
                            _attachCount++;
                            //alert(value.file_id);
                            var _fileTarget=_attachParent.find('.file-box[data-id="'+value.file_id+'"]');
                            //console.log(_fileTarget);
                            if(_fileTarget.length==0){
                                //var _lastSiblingAttach=_attachParent.find('.file-box:last');
                                //$(createAttachmentStructure(value)).insertAfter(_lastSiblingAttach);
                                _attachParent.append(createAttachmentStructure(value));
                                //alert("d");
                            }else{
                                //alert("d");
                                _fileTarget.replaceWith(createAttachmentStructure(value));
                            }

                        });

                        $('#attach_count').html(_attachCount);

                    }
                });


            },2500);

        }();



        var createMessageFeedStructure=function(row){
            var _btnTrash=(row.user_account_id==_userAccountID?'<a id="btn_remove_announcement" data-id="'+row.task_id+'" class="btn btn-xs btn-white"><i class="fa fa-trash"></i> </a>':'');
            return '<div class="feed-element" data-id="'+row.comment_id+'">'+
                        '<a href="#" class="pull-left">'+
                            '<img alt="image" class="img-circle" src="'+row.user_profile+'">'+
                        '</a>'+
                        '<div class="media-body">'+
                                '<div class="pull-right">'+
                                    '<small class="pull-right text-navy">'+row.TimeDescription+'</small> <br />'+
                                    _btnTrash+
                                '</div>'+
                                '<strong>'+row.employee+'</strong>'+
                                '<p>'+row.comments+'</p>'+
                                '<small class="text-muted">'+row.DayPosted+'</small>'+
                        '</div>'
                    '</div>';
        };


        var createMessageSpinner=function(pid){
            return '<div class="feed-element" data-id="'+pid+'">'+
                        '<br />'+
                        '<center><img src="images/ajax-loader-sm.gif"></center> <br />'+
                    '</div>';
        };


        var createAttachmentStructure=function(row){
            return '<div class="file-box"  data-id="'+row.file_id+'">'+
                        '<div class="file">'+
                            '<a href="'+row.file_directory+'">'+
                            '<span class="corner"></span>'+
                            '<div class="icon">'+
                            '<i class="fa fa-file"></i>'+
                        '</div>'+
                        '<div class="file-name">'+
                        row.file_name+
                        '<br/>'+
                        '<small>Added: '+row.date_posted+'</small><br />'+
                        '<small>By : '+row.posted_by+'</small>'+
                        '</div>'+
                        '</a>'+
                        '</div>'+
                        '</div>';


        };


        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  "Success",
                text:  obj.msg,
                type:  obj.stat
            });
        }
;



        var markAccomplished=function(val){
            var data=[];
            data.push({"name" : "task_id", "value" :_taskID},{"name" : "mark", "value" :val});
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "data":data,
                "url":"dashboard/transaction/marking"
            });
        };


        var markCompleted=function(val){
            var data=[];
            data.push({"name" : "task_id", "value" :_taskID},{"name" : "mark", "value" :val});
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "data":data,
                "url":"tasks/transaction/completed"
            });
        };


    });

</script>



</body>

</html>
