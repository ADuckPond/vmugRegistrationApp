$(document).ready(function(){
    $('#checkinForm').on('submit',function(e){

        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../php/checkin.php?action=checkin',
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