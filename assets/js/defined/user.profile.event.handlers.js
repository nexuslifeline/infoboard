
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

  $.ajax({
                dataType:"html",
                type: "POST",
                url:'UserProfile/UpdateForm', //call controller class/function to execute
        
                success:function(response) {
                
                    $('#frm-info-extension').html(response);

                },error: function(xhr, status, error) {
                    // check status && error
                    console.log(xhr);
                }
            })


     












  $('#picture_upload').change(function(){
  

                var file = this.files[0];
                data = new FormData();
                data.append("file",file);

        
                $.ajax({
                    url: "UserProfile/UploadProflie",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    beforeSend: function(){
                   

                        
                    },
                    success: function(data){



                    $('.progress').removeClass('hidden');
                    




                    $('#user_picture,#sidebar_picture').attr('src',data)
                    
                    $('.progress').addClass('hidden');              
                   
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus+" "+errorThrown);
                    },
                    complete : function(){

                    }
                });



}); 






$('#edit_login').click(function(){
    var stats = $(this).attr('data-btn');

    if(stats==0){

        $(this).attr('data-btn',1);
        $(this).html('<i class="fa fa-save"></i> <u>S</u>ave Details ');
        $('#frm_info  input').prop('readonly',false);
        $('#password,#confirm_password').val('');


    }else{


if(validate()){
        $(this).attr('data-btn',0);
        $(this).html('<i class="fa fa-save"></i> <u>E</u>dit Login');
        $('#frm_info  input').prop('readonly',true);

            var serialData      = $('#frm_info').serializeArray();
            var user_account_id = $('.user-session').attr('data-user-id');
            var user_group      = $('.user-session').attr('data-group-title');
            var user_group_id = $('.user-session').attr('data-group-id');

               serialData.push(
                    {"name": "id", "value": user_account_id},
                    {"name": "user_group_id", "value": user_group_id},
                    {"name": "user_group", "value": user_group}
                );
           

                console.log(serialData);
            $.ajax({
                    dataType:"json",
                    type: "POST",
                    url:'UserProfile/ActionUpdateProfileInfo', //call controller class/function to execute
                    data:serialData,
                success:function(response) {
                       
           
                        PNotify.removeAll(); //remove all notifications
                                new PNotify({
                                    title: 'Success!',
                                    text:  response.msg,
                                    type:  response.stat
                                }); //create new notification base on server response

        

                },error: function(xhr, status, error) {
                // check status && error
                console.log(xhr);
                }
             });

        
}

    }
});









function validate(){

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
            return stat; 

  }




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

















