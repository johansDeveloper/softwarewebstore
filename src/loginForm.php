<!DOCTYPE html>

<html>
    <head>     
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submit Form Using AJAX, PHP and javascript</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.ui.shake.js"></script>
        <script>
            $(document).ready(function ()
            {

                $('#login').click(function ()
                {
                    var username = $("#username").val();
                    var password = $("#password").val();
                    var dataString = 'username=' + username + '&password=' + password;
                    if ($.trim(username).length > 0 && $.trim(password).length > 0)
                    {
                    $.ajax({
                    type: "POST",
                            url: "login.php",
                            data: dataString,
                            cache: false,
                            beforeSend: function () {
                            $("#login").val('Connecting...');
                            },
                            success: function (data) {
                            if (data)
                            {
                            $("body").load("../index.php").hide().fadeIn(1500).delay(6000);
                                    //or
                                    window.location.href = "../index.php";
                            } else
                            {
                            //Shake animation effect.
                            $('#box').shake();
                                    $("#login").val('Login')
                                    $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
                            }
                            });

                    }
                    return false;
                });

            });
        </script>

        <link href="src/css/style.css" rel="stylesheet"> 
        <script type="text/javascript" src="src/js/formscript.js"></script>
    </head>
    <body>

        <div id="box">
            <form action="" method="post">
                Username
                <input type="text" class="input"  id="username"/>
                Password
                <input type="password" class="input"  id="password"/>
                <input type="submit" class="button button-primary" value="Log In" id="login"/>
                <div id="error"></div> 
        </div>
    </form> 
</div>
</body>
</html>
