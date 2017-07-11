$(document).ready(function(){
	$("#popupImportButton").click(function(){
        document.getElementById("importForm").style.width = "30%"
	});

    $("#popupThemeButton").click(function(){
		document.getElementById("themeForm").style.width = "30%";
	});

    $("#importClose").click(function(){
        document.getElementById("importForm").style.width = "0";
    });

    $("#themeClose").click(function(){
        document.getElementById("themeForm").style.width = "0";
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