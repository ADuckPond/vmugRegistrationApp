$(document).ready(function(){
    $('#registerForm').on('submit',function(e){

        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../php/registration.php?action=register',
            data: formData,
            async: false,
            success: function(data){
                window.alert(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});