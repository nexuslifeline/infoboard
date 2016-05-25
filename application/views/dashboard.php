<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Infoboard | Country Management </title>


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

        <!-- /announcements -->
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox collapsed">
                    <div class="ibox-title">
                        <h5>Announcements</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </div>
                    </div>


                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <div class="ibox-content ibox-heading">
                                    <h3>Announcements!</h3>
                                    <small><i class="fa fa-map-marker"></i> Please see announcements posted by management.</small>
                                </div>

                                <div class="ibox-content inspinia-timeline">
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-xs-3 date">
                                                <i class="fa fa-briefcase"></i>
                                                6:00 am
                                                <br/>
                                                <small class="text-navy">2 hour ago</small>
                                            </div>
                                            <div class="col-lg-9 col-sm-9 col-xs-9 content no-top-border">
                                                <p class="m-b-xs"><strong>No Classes tommorow!</strong> <small class="text-navy">Posted by Paul Christain Rueda</small></p>

                                                <p>Classes suspended tommorow.</p>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-xs-3 date">
                                                <i class="fa fa-file-text"></i>
                                                7:00 am
                                                <br/>
                                                <small class="text-navy">3 hour ago</small>
                                            </div>

                                            <div class="col-lg-9 col-sm-9 col-xs-9 content">
                                                <p class="m-b-xs"><strong>Using LINQ</strong> <small class="text-navy">Posted by Paul Christain Rueda</small></p>
                                                <p>Although you can use SQL with relational database objects, LINQ can also query object types
                                                    where the data source is not a database. You can use LINQ to query an object type, including
                                                    arrays, class objects, and XML, in addition to relational databases. Visual Studio incorporates
                                                    the LINQ query engine directly but also has defi ned an extension defi nition that enables third-party data sources to tie in to the engine via a translator. Just as SQL queries result in datasets
                                                    stored in memory, LINQ returns a collection of memory-based objects.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-xs-3 date">
                                                <i class="fa fa-file-text"></i>
                                                9:00 am
                                                <br/>
                                                <small class="text-navy">3 hour ago</small>
                                            </div>
                                            <div class="col-lg-9 col-sm-9 col-xs-9 content">
                                                <p class="m-b-xs"><strong>Pass by Value Versus Pass by Reference</strong> <small class="text-navy">Posted by Paul Christain Rueda</small></p>
                                                <p>The bad news is that the method that uses a reference variable has direct access to the data. Recall
                                                    that a method that uses a value type receives a copy of the variable’s value, not the lvalue of the
                                                    variable itself. This means that the method cannot permanently change the user’s value. With value
                                                    types there are two buckets in memory: the original bucket and the bucket containing the copy. The
                                                    method can alter the copy’s rvalue but has no clue where the original bucket is stored. Therefore,
                                                    this pass by value way to send data to a method protects the original data because only a copy of the
                                                    data is seen by the method.
                                                    With a reference variable, you send the actual memory location of where the data is stored. Passing
                                                    the actual memory location is called pass by reference. This means that the method has direct access
                                                    to the original data, not to a copy of it. It also means that, if the method wants to, it can permanently
                                                    affect the data associated with the reference variable.
                                                    The old saying, “There’s no such thing as a free lunch,” applies to programming, too. You can
                                                    use reference variables when writing a method to improve its performance and conserve memory.
                                                    However, the price you pay is that you expose the data to the possibility of contamination because
                                                    the method has direct access to it. This is sort of like a medieval king who takes the time to hide
                                                    his daughter away in the castle tower, but then turns around and hands out her room key to every
                                                    knight in the kingdom…probably not a good idea. Similarly, making the effort to hide data isn’t
                                                    terribly worthwhile if you tell everyone where it’s hidden. Chapter 10 revisits these (encapsulation)
                                                    issues and offers ways to cope with them.</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /announcements -->

            <!-- /Tast List -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="ibox collapsed">
                        <div class="ibox-title">
                            <h5>My Task list</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="wrapper wrapper-content animated fadeInUp">
                                        <ul class="notes">
                                            <li>
                                                <div>
                                                    <small>12:03:28 12-04-2014</small>
                                                    <h4>Long established fact</h4>
                                                    <p>The years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <a href="#"><i class="fa fa-check-square-o "></i> Mark as Accomplished</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <small>11:08:33 16-04-2014</small>
                                                    <h4>Latin professor at Hampden-Sydney </h4>
                                                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                                    <a href="#"><i class="fa fa-check-square-o "></i> Mark as Accomplished</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <small>9:12:28 10-04-2014</small>
                                                    <h4>The standard chunk of Lorem</h4>
                                                    <p>Ipsum used since the 1500s is reproduced below for those interested.</p>
                                                    <a href="#"><i class="fa fa-check-square-o "></i> Mark as Accomplished</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <small>3:33:12 6-03-2014</small>
                                                    <h4>The generated Lorem Ipsum </h4>
                                                    <p>The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                                                    <a href="#"><i class="fa fa-check-square-o "></i> Mark as Accomplished</a>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div><!-- /Tast List -->



            <!-- /task history -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="ibox collapsed">
                        <div class="ibox-title">
                            <h5>Task History</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">


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



</body>

</html>
