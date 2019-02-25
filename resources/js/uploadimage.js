$('#file-input').hide();

$('#btn-change-profile').on('click', function(){
    $('#file-input').click();
});

var readURL = function(input) {

    alert('yohoo');

    //Upload


    // var file_data = $('#file-input').prop('files')[0];   
    // var form_data = new FormData();                  
    // form_data.append('image_param', file_data);
    // form_data.append('id', $('#userid').val());
    // console.log(form_data);                

    // $.ajax({
    //     url: base_url+"upload-profile-picture",
    //     type: "POST",
    //     contentType: false, 
    //     processData: false, 
    //     dataType: "JSON",
    //     data: form_data,
    //     success: function(data){
    //         console.log(data);
            
            
    //     },
    //     error: function(err){
    //         console.log(err);
    //     }
    // })



    // if (input.files && input.files[0]) {
    //     var reader = new FileReader();

    //     reader.onload = function (e) {
    //         $('#profile-pict').attr('src', e.target.result);
    //     }

    //     reader.readAsDataURL(input.files[0]);
    // }
}

$("#file-input").on('change', function(){
    readURL(this);
});