
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
                        "user_id"           :       row.find('td:eq(0) input[type="checkbox"]').val(),
                        "username"          :       row.find('td:eq(0) input[type="checkbox"]').attr('data-username'),
                        //"country_desc"    :       row.find('td').eq(2).html(),
                        "email"             :       row.find('td:eq(0) input[type="checkbox"]').attr('data-email'),
                        "password"          :       "",//row.find('td:eq(0) input[type="checkbox"]').attr('data-password'),
                        "user_group_id"      :       row.find('td:eq(0) input[type="checkbox"]').attr('data-user-group-id'),
                        "user_group_title"        :       row.find('td:eq(0) input[type="checkbox"]').attr('data-user-group-title'),
                    });

                    //show invoice info modal



            var serialData = [];
            var user_group = row.find('td').eq(4).text();
            var user_account_id    = row.find('td:eq(0) input[type="checkbox"]').val();


            serialData.push(
                {name:"user_account_id",value:user_account_id},
                {name:"user_group",value: user_group.toUpperCase()}
           );



           $.ajax({
                dataType:"html",
                type: "POST",
                url:'UserManagement/CreateForm', //call controller class/function to execute
                data:serialData,
                success:function(response) {
                
                    $('#frm-info-extension').html(response);

                },error: function(xhr, status, error) {
                    // check status && error
                    console.log(xhr);
                }
            })


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
                                            'data-username="'+data.split('|')[1]+'"' +
                                            'data-password="'+data.split('|')[2]+'"' +
                                            'data-email="'+data.split('|')[3]+'"' +
                                            'data-user-group-id="'+data.split('|')[5]+'"' +
                                            'data-user-group-title="'+data.split('|')[6]+'"' +

           
                                            '>';
                                        }
                                    } ,



                                    


                                    

                                    {
                                        'targets': [6],
                                        'render': function (data, type, full, meta){
                                            var btn_edit='<button class="btn btn-white btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit Country"><i class="fa fa-pencil"></i> </button>';
                                            var btn_trash='<button class="btn btn-white btn-sm" name="remove_info" style="margin-right:-15px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';
                                            return '<center>'+btn_edit+btn_trash+'</center>';
                                        }



                                    }
                                ]

                            });
                        })();
                        

            var  showInfoList=function(){

                    $('#tbl_info_list tbody').html('<tr><td colspan="6" align="center"><img src="assets/img/ajax-loader-sm.gif" /></td></tr>');
                    $.getJSON("UserManagement/ActionGetUserList", function(response){
                            tbl_info_list.clear().draw();
                            console.log(response);

                            $.each(response,function(index,value){
                                //alert(value.date_created);
                                //alert(value.customer_id);
                                tbl_info_list.row.add([
                                    value.hidden,
                                    value.username,
                                    value.emp_stud_name,
                                    value.email,
                                    value.user_group_title,
                                    value.date_created,
                                    null

                                ]);
                            });

                            tbl_info_list.draw();

                        }).fail(function(xhr,stat,error){
                            alert(xhr.responseText);
                            console.log(xhr);
                        });
               };


              var  showUserGroupList=function(){
                    var element = '';
                  
                    $.getJSON("UserGroupManagement/ActionGetUserGroupList", function(response){
                            
                            console.log(response);

                            $.each(response,function(index,value){
                                var data = value.hidden.split('|');
                                var id = data[0];
                                element+='<option value='+ id+ '>'+value.user_group_title.toUpperCase()+'</option>';
                                
                            });
                        
                        $('#user_group_id').html(element);

                        }).fail(function(xhr,stat,error){
                            alert(xhr.responseText);
                            console.log(xhr);
                        });
            };




            var loadForm  =function(){

                        var serialData = [];
                        serialData.push(
                            {name:"user_account_id",value: '0' },
                            {name:"user_group",value: 'ADMINISTRATOR'}
                       );


                       console.log(serialData);
                       $.ajax({
                            dataType:"html",
                            type: "POST",
                            url:'UserManagement/CreateForm', //call controller class/function to execute
                            data:serialData,
                            success:function(response) {
                            
                                $('#frm-info-extension').html(response);

                            },error: function(xhr, status, error) {
                                // check status && error
                                console.log(xhr);
                            }
                        })



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
                getTableInstance    :      getTableInstance,
                createToolBarButton:    createToolBarButton,
                showInfoList:           showInfoList,
                showUserGroupList :      showUserGroupList,
                loadForm          :      loadForm,
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
                                var data=[row.hidden,row.username,row.emp_stud_name,row.email,row.user_group_title,row.date_created,''];
                                infoListModule.addRow(data); //add the info of recent 
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
                                var data=[row.hidden,row.username,row.emp_stud_name,row.username,row.email,row.user_group_title,row.date_created,''];
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
                                var data=[row.hidden,row.username,row.email,row.user_group_title,row.date_created,''];
                                infoListModule.removeRow(_selectedRow,data);
                            })
                            .error(function(xhr,stat,error){ //if error occurs
                                alert(xhr.responseText);
                                console.log(xhr);
                            });

            });



            $('#user_group_id').change(function(){

                    var serialData = [];
                    var     user_group  = $(this).find('option:selected').text(); 
                    serialData.push(
                        {name:"user_account_id",value:_selectedID !=undefined ? _selectedID : '0' },
                        {name:"user_group",value: user_group.toUpperCase()}
                   );

                    console.log(serialData);
                   $.ajax({
                        dataType:"html",
                        type: "POST",
                        url:'UserManagement/CreateForm', //call controller class/function to execute
                        data:serialData,
                        success:function(response) {
                            $('#frm-info-extension').html(response);

                        },error: function(xhr, status, error) {
                            // check status && error
                            console.log(xhr);
                        }
                    })    
   
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

            var serialData=$('#frm_info,#frm_user_details').serializeArray();

            var  user_group  = $('#user_group_id').find('option:selected').text(); 



           serialData.push(
                        {name:"user_group",value: user_group.toUpperCase()}
                   );

            console.log(serialData);
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                 fileElementId:'userfile',
                "url":"UserManagement/ActionSaveUserInfo",
                "data":serialData
            });


        }; //end of saveConsumerInfo

        //update consumer
        var updateInfo=function(){

            var serialData  = $('#frm_info,#frm_user_details').serializeArray();
            var user_group  = $('#user_group_id').find('option:selected').text(); 
 

            serialData.push(
                {name:"id",value: _selectedID},
                {name:"user_group",value: user_group.toUpperCase()}
                );

 
               
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"UserManagement/ActionUpdateUserInfo",
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
                "url":"UserManagement/ActionDeleteUserInfo",
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

            $('input[name="username"]').val(data.username);
            $('input[name="password"]').val(data.password);
            $('input[name="confirm_password"]').val(data.password);
            $('input[name="email"]').val(data.email);
            $('#user_group_id').val(data.user_group_id);




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

    var _btnNew='<button class="btn btn-white btn-sm"  id="btn_new_info" data-toggle="modal" data-target="#info_modal" data-placement="left" title="Create New User" ><i class="fa fa-users"></i> Create New User</button>';

    infoListModule.createToolBarButton(_btnNew);
    infoListModule.showInfoList();
    infoListModule.showUserGroupList();
    infoListModule.loadForm();
    $('#btn_new_info').click(function(){
        infoModalModule.setMode("new");
        infoModalModule.clearFields(); //clear fields
    });




    $('.summernote').summernote();
            
    
       
 $('input[required]').focus(function(){
       $(this).tooltip('destroy');
 })






 $('#birthdate').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true

                });


 

});

















