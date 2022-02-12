 $(document).ready(function(){

  // jQuery('#btn-add').click(function () {
  //       jQuery('#btn-save').val("add");
  //       jQuery('#myForm').trigger("reset");
  //       jQuery('#formModal').modal('show');
  //   });

  $('#form-datsa').submit(function (event){

  event.preventDefault();

  var formData = {
    input1: $("#jrd_couwnt").val(),
    input2: $("#order_cowunt").val(),
    input3: $("#iwd").val(),
    };
  console.log('f');
  console.log($('meta[name="csrf-token"]').attr('content'));
  // console.log(formData);


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $.ajax({
    
      type: "POST",
      url: '/insert',
      data: formData,
      dataType: "json",
      encode: true,
  
    }).done(function (data) {
      console.log(data);
    });
  });      
  });
