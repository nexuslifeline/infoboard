
$(document).ready(function(){








    $('#btn-save').click(function(){


        if(validateRequiredFieldsRegister()){
        var serialData=$('#frm_user_details').serializeArray();
                console.log(serialData);

             serialData.push(
                            {name:"user_group_id",value: 4 },
                            {name:"user_group",value: 'STUDENT'}
                       );

             $.ajax({
                dataType:"json",
                type: "POST",
                url:'UserManagement/ActionSaveUserInfo', //call controller class/function to execute
                data:serialData,

                success:function(response) {
 
                                    PNotify.removeAll(); //remove all notifications
                                    new PNotify({
                                        title: response.title,
                                        text:  response.msg,
                                        type:  response.type
                                    }); //create new notification base on server response


                              

                                    clearFields(); //clear fields
                        console.log(response);
                },error: function(xhr, status, error) {
                    // check status && error
                    console.log(xhr);
                }
            })

         }   

    });
















    $('#btn-login').click(function(){


        if(validateRequiredFields()){
        var serialData=$('#frm-login').serializeArray();
                console.log(serialData);
             $.ajax({

                dataType:"json",
                type: "POST",
                url:'Login/login_account', //call controller class/function to execute
                data:serialData,

                success:function(response) {



                        if(response.stat){




 
                                    PNotify.removeAll(); //remove all notifications
                                    new PNotify({
                                        title: response.title,
                                        text:  response.msg,
                                        type:  response.type
                                    }); //create new notification base on server response


                                setTimeout(function(){
                                   
                                    window.location.href = base_url + "Dashboard";
                                },500);

                        }else{




                                    PNotify.removeAll(); //remove all notifications
                                    new PNotify({
                                        title: response.title,
                                        text:  response.msg,
                                        type:  response.type
                                    }); //create new notification base on server response


                                setTimeout(function(){
                                 
                                    window.location.href = base_url + "Login";
                                },500);


                        }










                                    clearFields(); //clear fields
                        console.log(response);
                },error: function(xhr, status, error) {
                    // check status && error
                    console.log(xhr);
                }
            })

         }   

    });




      function validateRequiredFields(){
            var stat=1;

            $('#frm-login input[required]').each(function(){
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


        


        function validateRequiredFieldsRegister(){
            var stat=1;

            $('#frm_user_details input[required]').each(function(){
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

















