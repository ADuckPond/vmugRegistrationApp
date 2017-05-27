$(document).ready(function(){
	$("#importTextContainer").click(function(){
		$('.popupText').toggleClass('show');
	});

    $('#importFileForm').on('submit',function(e){

        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../php/adminButtons.php?action=import',
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

    $('#reset').on('submit',function(e){

        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../php/adminButtons.php?action=reset',
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