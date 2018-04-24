$(document).ready(function(){
	$("#popupImportButton").click(function(){
        document.getElementById("importForm").style.width = "40%"
	});

    $("#popupResetButton").click(function(){
        document.getElementById("resetForm").style.width = "40%";
    });

    $("#popupThemeButton").click(function(){
		document.getElementById("themeForm").style.width = "40%";
    });

    $("#importClose").click(function(){
        document.getElementById("importForm").style.width = "0";
    });

    $("#resetClose").click(function(){
        document.getElementById("resetForm").style.width = "0";
    });

    $("#themeClose").click(function(){
        document.getElementById("themeForm").style.width = "0";
    });

    $("#successClose").click(function(){
        document.getElementById("successAlert").style.width = "0";
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
                document.getElementById("successAlert").style.width = "100%";
                document.getElementById("themeForm").style.width = "0";
                setTimeout(function(){
                    document.getElementById("successAlert").style.width = "0";
                },2500);
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
                document.getElementById("successAlert").style.width = "100%";
                document.getElementById("resetForm").style.width = "0";
                setTimeout(function(){
                    document.getElementById("successAlert").style.width = "0";
                },2500);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('#themeSettings').on('submit',function(e){
        
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../php/adminButtons.php?action=theme',
            data: formData,
            async: false,
            success: function(){
                location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });

        $.ajax({
            type: 'POST',
            url: '../php/upload.php?action=upload',
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