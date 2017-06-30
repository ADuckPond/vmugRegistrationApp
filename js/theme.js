$(document).ready(function(){

        $.ajax({
            type:"GET",
            url: '../php/theme.php?action=getTheme',
            context: document.body,
            success: theme,
            async:false
        });

        function theme(data){

            var css;

            switch(data){
                case "blue":
                    css='css/blueTheme.css';
                    break;
                case "red":
                    css='css/redTheme.css';
                    break;
                default:
                    css='css/blueTheme.css';
            }

            document.getElementById('theme').href=css;

        }

});