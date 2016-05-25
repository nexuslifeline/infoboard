
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

                                        console.log(response);


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


        var userGroupListModule = (function(){

            var tbl_user_group_list;
            var tbl_user_group_priviledge;
            var tbl_user_group_distribution;
            var bindEventHandlers=(function(){
                /**
                 *
                 *  fires when edit consumer button on selected row is clicked
                 *
                 */
            
               
            })();


            var initializeUserGroupDatatable = (function(){

                tbl_user_group_list=$('#tbl_user_group_list').DataTable({

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
                                'data-user-group-title="'+data.split('|')[1]+'"' +
                                'data-user-group-desc="'+data.split('|')[2]+'"' +
                                'data-status="'+data.split('|')[3]+'"' +
                               
                                '>';
                            }
                        } ,
                        
                    ]

                });


                 tbl_user_group_priviledge=$('#tbl_user_group_priviledge').DataTable({
                        "iDisplayLength":15,
                        "bLengthChange":false,
                        "order": [[ 0, "desc" ]],
                        "oLanguage": {
                            "sSearch": "Search: ",
                            "sProcessing": "Please wait..."
                        },
                       
                        "columnDefs": [
                            {
                                'bSortable': false,
                                'targets': [0],
                                'width':'4%',
                                'render': function(data, type, full, meta){

                                    var details  = data.split('&');
                                    
                                    if(details[1]==1){


                                        return '<input type="checkbox" checked  class=" i-checks icheckbox_square-green checked hover" ' +
                                        'value="'+details[0]+'"' +
                                        
                                        '>';

                                    }else{

                                        return '<input type="checkbox"  class=" i-checks icheckbox_square-green checked hover" ' +
                                        'value="'+details[0]+'"' +
                                        
                                        '>';

                                    }

                                }
                            } 
                        
                        ]

                    });





                 tbl_user_group_distribution=$('#tbl_user_group_distribution').DataTable({
                        "iDisplayLength":15,
                        "bLengthChange":false,
                        "order": [[ 0, "desc" ]],
                        "oLanguage": {
                            "sSearch": "Search: ",
                            "sProcessing": "Please wait..."
                        },
                       
                        "columnDefs": [
                            {
                                'bSortable': false,
                                'targets': [0],
                                'width':'4%',
                                'render': function(data, type, full, meta){

                                     var details  = data.split('&');
                                    
                                    if(details[1]==1){


                                        return '<input type="checkbox" checked  class=" i-checks icheckbox_square-green checked hover" ' +
                                        'value="'+details[0]+'"' +
                                        
                                        '>';

                                    }else{

                                        return '<input type="checkbox"  class=" i-checks icheckbox_square-green checked hover" ' +
                                        'value="'+details[0]+'"' +
                                        
                                        '>';

                                    }

                                }
                            } 
                        
                        ]

                    });













                })();
                    


            
            var  showUserGroupList=function(){

                $('#tbl_user_group_list tbody').html('<tr><td colspan="6" align="center"><img src="assets/img/ajax-loader-sm.gif" /></td></tr>');
                $.getJSON("UserGroupManagement/ActionGetUserGroupList", function(response){
                        tbl_user_group_list.clear().draw();
                        console.log(response);

                        $.each(response,function(index,value){
                          
                            tbl_user_group_list.row.add([
                                value.hidden,
                                value.user_group_title,
                                value.user_group_desc,
                                value.date_created,

                            ]);
                        });

                        tbl_user_group_list.draw();

                    }).fail(function(xhr,stat,error){
                        alert(xhr.responseText);
                        console.log(xhr);
                    });
            };





        var  showGroupPriviledgeList=function(a){
                
                var serialData=[];
                var user_group_id = $('#user_group_priviledge_modal').attr('user_group_id');
            
            




         serialData.push({
                name:"user_group_id",value: user_group_id
            });

                $('#tbl_user_group_priviledge tbody').html('<tr><td colspan="6" align="center"><img src="assets/img/ajax-loader-sm.gif" /></td></tr>');
                            $.ajax({
                                    dataType:"json",
                                    type: "POST",
                                    url:'UserGroupSetting/ActionGetUserGroupPriviledgeList', //call controller class/function to execute
                                    data:serialData,
                                success:function(response) {

                                        console.log(response);


                             tbl_user_group_priviledge.clear().draw();
                            $.each(response,function(index,value){ 
                                   tbl_user_group_priviledge.row.add([
                                    value.alias_id+'&'+value.status,
                                    value.link
                                ]);

                                 
                            });

                                 tbl_user_group_priviledge.draw();      


                                },error: function(xhr, status, error) {
                                // check status && error
                                console.log(xhr);
                                }
                             });

            };








   var  showGroupDistributionList=function(a){
                
                var serialData=[];
                var main_user_group_id = $('#user_group_distribution_modal').attr('main_user_group_id');
            

         serialData.push({
                name:"main_user_group_id",value: main_user_group_id
            });

                $('#tbl_user_group_distribution tbody').html('<tr><td colspan="6" align="center"><img src="assets/img/ajax-loader-sm.gif" /></td></tr>');
                            $.ajax({
                                    dataType:"json",
                                    type: "POST",
                                    url:'UserGroupSetting/ActionGetUserGroupDistributionList', //call controller class/function to execute
                                    data:serialData,
                                success:function(response) {

                                        console.log(response);


                             tbl_user_group_distribution.clear().draw();
                            $.each(response,function(index,value){ 
                                   tbl_user_group_distribution.row.add([
                                    value.department_id+'&'+value.status,
                                    value.department_title
                                ]);

                                 
                            });

                                 tbl_user_group_distribution.draw();      


                                },error: function(xhr, status, error) {
                                // check status && error
                                console.log(xhr);
                                }
                             });

            };










             var addRow=function(data){
                tbl_user_group_priviledge
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
                return tbl_user_group_list;
            };

          
          

            //return objects as functions
            return {
                getTableInstance :      getTableInstance,
                createToolBarButton:    createToolBarButton,
                showUserGroupList:         showUserGroupList ,
                addRow:                          addRow,
                showGroupPriviledgeList     :showGroupPriviledgeList,
                showGroupDistributionList  : showGroupDistributionList
            
               
            };

        })();






    var userGroupInfoModalModule=(function(){
        var _mode;      var _selectedID;     var _selectedRow;
        //binds all events of invoice modal
        var bindEventHandlers=(function(){

            $('#btn_user_priviledge_access').click(function(){

                    if(_mode=="edit"){ //if current mode is new

                        updateUserGroup()
                            .success(function(response){ //if request is successful
                               

                               $('#btn-close-modal').click();
                              
                                PNotify.removeAll(); //remove all notifications
                                new PNotify({
                                    title: 'Success!',
                                    text:  response.msg,
                                    type:  response.stat
                                }); //create new notification base on server response

                              

                            })
                            .error(function(xhr,stat,error){ //if error occurs
                                alert(xhr.responseText);
                                console.log(xhr);
                            });



                    }else{      //if current mode is update

                        
                    }

                

            });





        $('#btn_user_distribution_access').click(function(){

                    if(_mode=="edit"){ //if current mode is new

                         updateUserDistribution()
                            .success(function(response){ //if request is successful
                               

                               $('#btn-close-modal-s').click();
                              
                                PNotify.removeAll(); //remove all notifications
                                new PNotify({
                                    title: 'Success!',
                                    text:  response.msg,
                                    type:  response.stat
                                }); //create new notification base on server response

                              

                            })
                            .error(function(xhr,stat,error){ //if error occurs
                                alert(xhr.responseText);
                                console.log(xhr);
                            });



                    }else{      //if current mode is update

                        
                    }

                

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

        
        
        //update consumer
        var updateUserGroup=function(){

            var serialData = [];
            var id=$('#user_group_priviledge_modal').attr('user_group_id');
            var rows = $("#tbl_user_group_priviledge tbody tr");

          

            serialData.push(
                {"name": "user_group_id", "value": id}
            );

            rows.each(function () {
                var alias_id = $('input[type="checkbox"]:checked' ,this).val();
                if(alias_id!=undefined){
                serialData.push(
                    {"name": "alias_id[]", "value": alias_id}
                );
                }
            });

    

            console.log(serialData);

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"UserGroupSetting/ActionSaveUserPriviledgeAcccess",
                "data":serialData
            });

        };

     







    var updateUserDistribution=function(){

            var serialData = [];
            var id=$('#user_group_distribution_modal').attr('main_user_group_id');
            var rows = $("#tbl_user_group_distribution tbody tr");

          

            serialData.push(
                {"name": "main_user_group_id", "value": id}
            );

            rows.each(function () {
                var department_id = $('input[type="checkbox"]:checked' ,this).val();
                if(department_id!=undefined){
                serialData.push(
                    {"name": "department_id[]", "value": department_id}
                );
                }
            });

    

            console.log(serialData);

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"UserGroupSetting/ActionSaveUserDistributionAcccess",
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

       


        //return value of this invoice modal object module
        return {
            setMode:                setCurrentMode,
            getMode:                getCurrentMode,
            setSelectedID:          setSelectedID,
            getSelectedID:          getSelectedID,
            setSelectedRow:         setSelectedRow

        }; //end of return value



    })();














    /************************************************************************************/

    var _btnNew='<button class="btn   btn-white btn-sm"  id="btn_setup" data-toggle="modal" data-target="#user_group_priviledge_modal" data-placement="left" title="Setup User Link Access" ><i class="fa fa-gears"></i>Setup User Link Access</button>';
    var _btnTask='<button class="btn   btn-white btn-sm"  id="btn_distribution" data-toggle="modal" data-target="#user_group_distribution_modal" data-placement="left" title="Setup User Task Distribution" ><i class="fa fa-gears"></i>Setup User Task Distribution</button>';
   
    userGroupListModule.createToolBarButton(_btnNew+_btnTask);
    userGroupListModule.showUserGroupList();
 

    $('#btn_setup').click(function(){
        userGroupInfoModalModule.setMode("edit");
        userGroupListModule.showGroupPriviledgeList();

    });




 $('#btn_distribution').click(function(){
        userGroupInfoModalModule.setMode("edit");
        userGroupListModule.showGroupDistributionList();

    });

   


    $(document).on('click', '#tbl_user_group_list input[type=checkbox]', function(){
        var _obj=$('#tbl_user_group_list input[type=checkbox]');
            _obj.prop("checked", false);
            $(this).prop("checked",true);
            $('#btn_setup,#btn_distribution').prop('disabled',!(_obj.length>0));

            $('#user_group_priviledge_modal').attr('user_group_id',$(this).val());
            
            $('#user_group_distribution_modal').attr('main_user_group_id',$(this).val());


    });
  




    $('#btn_setup,#btn_distribution').prop('disabled',true);

    



 $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });













});

















