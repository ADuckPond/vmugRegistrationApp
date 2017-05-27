$(document).ready(function(){
	$("#importTextContainer").click(function(){
		$('.popupText').toggleClass('show');
	});

    $('#importFileForm').on('submit',function(e){

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '../php/adminButtons.php',
            data: $('#importFileForm').serialize(),
            success: function(){
                alert('form was submitted');
            }
        });
    });
});

