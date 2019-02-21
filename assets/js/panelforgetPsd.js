$(document).ready(function(){
    $('#forgetEmail').submit(function(event){
        event.preventDefault();
        var data=$('#forgetEmail').serialize();
        $.ajax({
            type:'POST',
            data:data,
            url:'./api/ForgetPsd.php',
            beforeSend:function(){
                $('.loader').removeClass('hide');
            },
            success:function(response){
                $('.loader').addClass('hide');
            var msg =JSON.parse(response);
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
    $('#passwordResetForm').submit(function(event){
        event.preventDefault();
        var data=$('#passwordResetForm').serialize();
        $.ajax({
            type:'POST',
            data:data,
            url:'./api/RESET.php',
            beforeSend:function(){
                $('.loader').removeClass('hide');
            },
            success:function(response){
                $('.loader').addClass('hide');
                var msg=JSON.parse(response);
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
});