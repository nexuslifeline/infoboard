
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



        var infoListModule = (function(){
            var tbl_info_list;

            var bindEventHandlers=(function(){
                /**
                 *
                 *  fires when edit consumer button on selected row is clicked
                 *
                 */
                $('#tbl_info_list tbody').on('click','button[name="edit_info"]',function(){
                    var row=$(this).closest('tr');
                    infoModalModule.setMode("edit"); //set mode to editing
                    infoModalModule.setSelectedID(row.find('td:eq(0) input[type="checkbox"]').val()); //what is the id of the consumer we are going to update
                    infoModalModule.setSelectedRow(row); //remember the row we are going to update
                    //object details of modal
                    infoModalModule.setDetails({
                        "course_id"           :       row.find('td:eq(0) input[type="checkbox"]').val(),
                        "course_title"        :       row.find('td:eq(0) input[type="checkbox"]').attr('data-course-title'),
                         "course_desc"        :       row.find('td').eq(2).html(),
                        "course_code"        :       row.find('td:eq(0) input[type="checkbox"]').attr('data-course-code'),
                        "department_id"        :       row.find('td:eq(0) input[type="checkbox"]').attr('data-department-id'),
                    });

                    //show invoice info modal
                    infoModalModule.showModal();

                });

                $('#tbl_info_list tbody').on('click','button[name="remove_info"]',function(){
                    var row=$(this).closest('tr');
                     infoModalModule.setMode("remove"); //set mode to editing
                     infoModalModule.setSelectedID(row.find('td:eq(0) input[type="checkbox"]').val()); //what is the id of the consumer we are going to update
                     infoModalModule.setSelectedRow(row); //remember the row we are going to update
                    //object details of modal


                     infoModalModule.showConfirmModal();
                    $('#modal_mode').html("REMOVE ")
                });

            })();

            var initializeInfoDatatable = (function(){
                            tbl_info_list=$('#tbl_info_list').DataTable({
                                "iDisplayLength":15,
                                "bLengthChange":false,
                                "order": [[ 0, "desc" ]],
                                "oLanguage": {
                                    "sSearch": "Search: ",
                                    "sProcessing": "Please wait..."
                                },
                                "dom": '<"toolbar">frtip',
                                "columnDefs": [
                                    {
                                        'bSortable': false,
                                        'targets': [0],
                                        'width':'4%',
                                        'render': function(data, type, full, meta){
                                            return '<input type="checkbox" onclick="fnChecked(this)" class="tableflat" ' +
                                            'value="'+data.split('|')[0]+'"' +
                                            'data-course-title="'+data.split('|')[1]+'"' +
                                           /// 'data-course-desc="'+data.split('|')[2]+'"' +
                                           'data-course-code="'+data.split('|')[3]+'"' +
                                           'data-department-id="'+data.split('|')[4]+'"' +
                                           
                                            '>';
                                        }
                                    } ,



                                    


                                    

                                    {
                                        'targets': [5],
                                        'render': function (data, type, full, meta){
                                            var btn_edit='<button class="btn btn-white btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit Course"><i class="fa fa-pencil"></i> </button>';
                                            var btn_trash='<button class="btn btn-white btn-sm" name="remove_info" style="margin-right:-15px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';
                                            return '<center>'+btn_edit+btn_trash+'</center>';
                                        }



                                    }
                                ]

                            });
                        })();
                        // tbl list datatable initialization

            var  showInfoList=function(){

                $('#tbl_info_list tbody').html('<tr><td colspan="6" align="center"><img src="assets/img/ajax-loader-sm.gif" /></td></tr>');
                $.getJSON("CourseManagement/ActionGetCourseList", function(response){
                        tbl_info_list.clear().draw();
                        console.log(response);

                        $.each(response,function(index,value){
                            //alert(value.customer_id);
                            tbl_info_list.row.add([
                                value.hidden,
                                value.course_title,
                                value.course_desc,
                                value.department_title,
                                value.date_created,
                          

                            ]);
                        });

                        tbl_info_list.draw();

                    }).fail(function(xhr,stat,error){
                        alert(xhr.responseText);
                        console.log(xhr);
                    });
            };



             var  showDepartmentList=function(){
                var element = '';
              
                $.getJSON("DepartmentManagement/ActionGetDepartmentList", function(response){
                        
                        console.log(response);

                        $.each(response,function(index,value){
                            var data = value.hidden.split('|');
                            var id = data[0];
                            element+='<option value='+ id+ '>'+value.department_title.toUpperCase()+'</option>';
                            
                        });
                    
                    $('#department_id').html(element);
                    
                    }).fail(function(xhr,stat,error){
                        alert(xhr.responseText);
                        console.log(xhr);
                    });
            };











            var lastPage=function(){
                $('#tbl_info_list ul li:nth-last-child(2) a').click(); //trigger 2nd to the last link, the last page number
            };


            var addRow=function(data){
                tbl_info_list
                    .row
                    .add(data)
                    .draw();
            };

            //create toolbar buttons
            var createToolBarButton=function(_buttons){
                $("div.toolbar").html(_buttons);
            };

            //get the invoice table object instance
            var getTableInstance=function(){
                return tbl_info_list;
            };

            //update row
            var updateRow=function(row,data){
                tbl_info_list
                    .row(row)
                    .data(data)
                    .draw();
            };

            var removeRow=function(row,data){
                tbl_info_list
                    .row(row)
                    .remove(data)
                    .draw();
            };


            //return objects as functions
            return {
                getTableInstance :      getTableInstance,
                createToolBarButton:    createToolBarButton,
                showInfoList:           showInfoList,
                showDepartmentList  :  showDepartmentList,
                addRow:                 addRow,
                updateRow:              updateRow,
                removeRow:              removeRow,
                lastPage:               lastPage
            };

        })();






    var infoModalModule=(function(){
        var _mode;      var _selectedID;     var _selectedRow;
        //binds all events of invoice modal
        var bindEventHandlers=(function(){

            /**
             *
             * fires everytime the record invoice button on modal is clicked
             *
             **/
            $('#btn_create_info').click(function(){

                if(validateRequiredFields()){ //if true, all required fields are supplied

                    if(_mode=="new"){ //if current mode is new
                        createNewInfo()

                            .success(function(response){ //if request is successful
                                console.log(response);

                                PNotify.removeAll(); //remove all notifications
                                new PNotify({
                                    title: 'Success!',
                                    text:  response.msg,
                                    type:  response.stat
                                }); //create new notification base on server response

                                var row=response.row[0];
                                var data=[row.hidden,row.course_title,row.course_desc,row.department_title,row.date_created,''];
                                infoListModule.addRow(data); //add the info of recent invoice
                                infoListModule.lastPage(); //go to last page
                                clearFields(); //clear fields

                            })
                            .error(function(xhr,stat,error){ //if error occurs
                                alert(xhr.responseText);
                                console.log(xhr);
                            });



                    }else{      //if current mode is update

                        updateInfo()
                            .success(function(response){ //if request is successful
                                //console.log(response);
                                //alert(response.test);
                                hideModal();
                                PNotify.removeAll(); //remove all notifications
                                new PNotify({
                                    title: 'Success!',
                                    text:  response.msg,
                                    type:  response.stat
                                }); //create new notification base on server response

                                var row=response.row[0];
                                var data=[row.hidden,row.course_title,row.course_desc,row.department_title,row.date_created,''];
                                infoListModule.updateRow(_selectedRow,data);
                                clearFields(); //clear fields


                            })
                            .error(function(xhr,stat,error){ //if error occurs
                                alert(xhr.responseText);
                                console.log(xhr);
                            });
                    }

                }

            });



            $('#btn_yes').click(function(){
                        removeInfo()
                            .success(function(response){ //if request is successful
                                //console.log(response);
                                //alert(response.test);
                                hideConfirmModal();
                                PNotify.removeAll(); //remove all notifications
                                new PNotify({
                                    title: 'Success!',
                                    text:  response.msg,
                                    type:  response.stat
                                }); //create new notification base on server response
                                console.log(response);
                                var row=response.row[0];
                                var data=[row.hidden,row.course_title,row.course_desc,row.department_title,row.date_created,''];
                                infoListModule.removeRow(_selectedRow,data);
                            })
                            .error(function(xhr,stat,error){ //if error occurs
                                alert(xhr.responseText);
                                console.log(xhr);
                            });

            });

        })();

        //function that validates all required fields, returns true if all required fields are supplied
        var validateRequiredFields=function(){
            var stat=1;

            $('input[required]').each(function(){
                if($(this).val()==""){

                    $(this).focus()
                        .tooltip('show');

                    PNotify.removeAll();
                    new PNotify({
                        title: 'Missing!',
                        text: $(this).data('message'),
                        type: 'error'
                    });

                    stat=0;
                    return false; //this will exit on function inside 'each'
                }
            });
            return stat; //this will always be executed and return current state
        }; //end of validateRequiredFields

        //add new consumer
        var createNewInfo=function(){

            var serialData=$('#frm_info').serializeArray();

            var course_desc = $('.summernote').code();
               
               serialData.push({
                name:"course_desc",value: course_desc
            });


       
            console.log(serialData);
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"CourseManagement/ActionSaveCourseInfo",
                "data":serialData
            });


        }; //end of saveConsumerInfo

        //update consumer
        var updateInfo=function(){

            var serialData=$('#frm_info').serializeArray();
            serialData.push({
                name:"id",value: _selectedID
            });

            var course_desc = $('.summernote').code();


               serialData.push({
                name:"course_desc",value: course_desc
            });


               console.log(serialData);

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"CourseManagement/ActionUpdateCourseInfo",
                "data":serialData
            });

        };

        //remove consumer
        var removeInfo=function(){

            var serialData=$('#frm_info').serializeArray();
            serialData.push({
                name:"id",value: _selectedID
            });
            console.log(serialData);
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"CourseManagement/ActionDeleteCourseInfo",
                "data":serialData
            });

        };
        //set mode of modal, are we going to add new or update??
        var setCurrentMode=function(status){
            _mode=status.toLowerCase();
        };

        //returns the current mode of the modal, add new or update
        var getCurrentMode=function(){
            return _mode;
        };

        //set selected id, the consumer
        var setSelectedID=function(id){
            _selectedID=id;
        };

        //get selected id, the consumer
        var getSelectedID=function(){
            return _selectedID;
        };

        //set selected row, the tr element
        var setSelectedRow=function(row){
            _selectedRow=row;
        };

        //get selected row, the tr element
        var getSelectedRow=-function(){
            return _selectedRow;
        }

        var clearFields=function(){
            $('#frm_info input,#frm_info textarea').val('');
            $('#frm_info .summernote').code('');

        };


        var showModal=function(){
            $('#info_modal').modal('show');
        };

        var hideModal=function(){
            $('#info_modal').modal('hide');
        };


        var showConfirmModal=function(){
            $('#confirm_modal').modal('show');
        };

        var hideConfirmModal=function(){
            $('#confirm_modal').modal('hide');
        };

        //set invoice modal details
        var setInfoModalDetails=function(data){

            $('input[name="course_title"]').val(data.course_title);
            $('input[name="course_code"]').val(data.course_code);
            $('#department_id').val(data.department_id);
            $('textarea[name="course_desc"]').val(data.course_desc);
            $('.summernote').code(data.course_desc);
         
        };









        //return value of this invoice modal object module
        return {
            setMode:                setCurrentMode,
            getMode:                getCurrentMode,
            clearFields:            clearFields,
            showModal:              showModal,
            hideModal:              hideModal,
            showConfirmModal:       showConfirmModal,
            hideConfirmModal:       hideConfirmModal,
            setDetails:             setInfoModalDetails,
            setSelectedID:          setSelectedID,
            getSelectedID:          getSelectedID,
            setSelectedRow:         setSelectedRow

        }; //end of return value



    })();











    //sparkline graph
    $("#sparkline8").sparkline([2,5, 6, 7, 2, 0, 4, 2, 4, 5, 7, 2, 4, 12, 14, 4, 2, 14, 12, 7,5,4,3,4], {
        type: 'bar',
        barWidth: 8,
        height: '80px',
        barColor: '#1ab394',
        negBarColor: '#c6c6c6'
    });





    /************************************************************************************/

    var _btnNew='<button class="btn btn-white btn-sm"  id="btn_new_info" data-toggle="modal" data-target="#info_modal" data-placement="left" title="Create New Course" ><i class="fa fa-users"></i> Create New Course</button>';

    infoListModule.createToolBarButton(_btnNew);
    infoListModule.showInfoList();
     infoListModule.showDepartmentList();

    $('#btn_new_info').click(function(){
        infoModalModule.setMode("new");
        infoModalModule.clearFields(); //clear fields
    });




    $('.summernote').summernote();
            
    
       



});

















