
<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
    <title>  Login</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/login/css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <!-- //fonts -->
    <link rel="stylesheet" href="<?= base_url()?>assets/login/css/font-awesome.css" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->
	
	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext" rel="stylesheet">
	<!-- Google fonts -->

</head>
<!-- //Head -->
<!-- Body -->

<body>
    <h1 class="title-agile text-center" style="margin-top: -10px;"> LOGIN</h1>

    <div class="content-w3ls">
        <div class="content-bottom" style="top: -50px;" >
            <h2>Sign In Here <i class="fa fa-hand-o-down" aria-hidden="true"></i></h2>
        <?php
    if (isset($message_display)) {
    echo "<div class='message' style='color:green'>";
    echo $message_display;
    echo "</div>";
    }
    if (isset($error_message)) {
        echo "<div class='error_message' style='color:red;''>";
    echo $error_message;
    }
    ?>
            <!-- form action="#" method="post"> -->
            <?= form_open('Login/process') ?>
                <div class="field-group">
                    <div class="wthree-field">
                        <input  id="text1" type="text" value="" placeholder="username" name="username" required>
                    </div>
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="text-danger" style="color:red"><?php echo form_error('username'); ?></div>
                </div>
                <div class="field-group">
                    <div class="wthree-field">
                        <input name="password" id="myInput" type="Password" placeholder="Password">
                    </div>
                    <span class="fa fa-lock" aria-hidden="true"></span>
                </div>
                    <div class="text-danger" style="color:red"><?php echo form_error('password'); ?></div>
                <div class="field-group">
                    <div class="check">
                        <label class="checkbox w3l">
                            <input type="checkbox" onclick="myFunction()">
                            <i> </i>show password</label>
                    </div>
                    <!-- script for show password -->
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <!-- //script for show password -->
                </div>
                <div class="wthree-field">
                    <input id="saveForm" name="saveForm" type="submit" value="sign in" />
                </div>
                <ul class="list-login">
                    <li class="switch-agileits">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                            keep signed in
                        </label>
                    </li>
                    <li>
                        <a href="#myModal" class="text-right">forgot password?</a>
                    </li>
                    <li class="clearfix"></li>
                </ul>
            <?= form_close();?>
        </div>
    </div>
   
</div>
</body>
<!-- //Body -->
</html>
