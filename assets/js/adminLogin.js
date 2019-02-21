$(document).ready(function(){
    //alert('hello');
    $('#login_form').submit(function(event){
        event.preventDefault();
        var data= $('#login_form').serialize();
       $.ajax({
        url:'./api/Login.php',
        type:'POST',
        data:data,
        beforSend:function(){
          $('.loader').removeClass('hide');
        },success:function(response){
          $('.loader').addClass('hide')
            var msg =JSON.parse(response);
            console.log(msg);
            if(msg.Success !=null)
            {
                //redirect user to dash board
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      });
                      
                      toast({
                        type: 'success',
                        title: msg.Success
                      });
                      setTimeout(function(){
                          //set local storage variable email for current Email
                        window.location.replace("?v=dash");
                      },1000);
            }
            else{
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                  
                  toast({
                    type: 'error',
                    title: msg.Error
                  });
                console.log(msg.Error);
            }
        }
       
       });
    });
    $('#password-update').submit(function(event){
        event.preventDefault();
        var data=$('#password-update').serialize();
       $.ajax({
           type:'POST',
           url:'./api/PasswordChange.php',
           data:data,
           beforSend:function(){

           },
           success:function(response)
           {
            var msg= JSON.parse(response);
         console.log(msg);
         if(msg.Success !=null)
         {
            const toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              
              toast({
                type: 'success',
                title: msg.Success
              });
              setTimeout(function(){
                  //set local storage variable email for current Email
                window.location.replace("?v=profile");
              },1000);
         }else{
            const toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              
              toast({
                type: 'error',
                title: msg.Error
              });
            console.log(msg.Error);
         }
           }

       })
    });
    $('#newJobForm').submit(function(event){
      event.preventDefault();
      var FormData= $('#newJobForm').serialize();
      $.ajax({
        type:'POST',
        data:FormData,
        url:'./api/ADDJOB.php',
        beforSend:function(){

        },
        success:function(response)
        {
          var msg= JSON.parse(response);
          console.log(msg);
          if(msg.Success !=null)
          {
             const toast = swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 3000
               });
               
               toast({
                 type: 'success',
                 title: msg.Success
               });
               setTimeout(function(){
                //set local storage variable email for current Email
              window.location.replace("?v=addNewJob");
            },1000);
          }else{
             const toast = swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 3000
               });
               
               toast({
                 type: 'error',
                 title: msg.Error
               });
             console.log(msg.Error);
          }
        }
      });
    }); 
})