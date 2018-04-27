$(document).ready(function(){
    
    $("#successClose").click(function(){
        document.getElementById("success").style.width = "0";
    });
    
    $('#registerForm').on('submit',function(e){

        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../php/registration.php?action=register',
            data: formData,
            async: false,
            success: function(data){
                document.getElementById("success").style.width = "100%";
                setTimeout(function(){
                    document.getElementById("success").style.width = "0";
                    location.href = "../index.html";
                },5000);

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});