$('#file-input').hide();

$('#btn-change-profile').on('click', function(){
    $('#file-input').click();
});

var readURL = function(input) {

    

    // Upload


    var file_data = $('#file-input').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('image_param', file_data);
    form_data.append('id', 11);
               

    $.ajax({
        url: base_url+"/update_image",
        type: "POST",
        contentType: false, 
        cache: false,
        processData: false, 
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        data: form_data,
        success: function(data){
            console.log(data);
            $("#notifications").append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
            '<strong>Yay!</strong> Image Uploaded'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">&times;</span>'+
            '</button></div>'
            );
    
        },
        error: function(err){
            console.log(err);
        }
    })



    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-pict').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#file-input").on('change', function(){
    readURL(this);
});