console.log('ffffffffff');
$(function(){
    var mm;
    var formData = {
        input1: $("#name").val(),
        input2: $("#email").val(),
        input3: $("#email").val(),
        input4: 'dd',
        };
              
    $("#main_form").on('submit', function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){
             
                console.log(formData);

                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }
                else{
                    // $('#form').find('main_form')[0].reset();
                    // $('#main_form')[0].reset();
                    alert(data.msg);
                }
            },
            
        });

    });
    console.log(mm);

});