<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
        <link rel="stylesheet" href="../css/social_button.css">

        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <!--<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <style>
            body{
                background-image: url("uploads/skyline-buildings-new-york-skyscrapers.jpg"); 

                background-size: cover;
                /*                overflow: hidden;
                                width: 1366px;*/

            }

            .login-logo p{
                color:#666666;
                font-size: 35px;
                padding-top: 30px;
                padding-bottom: 10px;
                font-family: "Raleway Light", Georgia, Serif;
            }.login-card {
                padding: 30px;
                width: 384px;
                background-color: #ffffff;
                /*#F7F7F7;*/
                margin: 0 auto 10px;
                border-radius: 2px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <div >
            <div class="demo">
                <div class="login">
                    <center>
                        <p style="padding-top: 20px;font-size: 3.3em;color: #ffffff;font-family: 'Quicksand', sans-serif;">login to your account</p>
                        <p style="padding-top: 0px">
                            <img style="width:150px" src="{{ asset('uploads/lock.png')}}">
                        </p>
                    </center>
                    <form action="viewMembers" method="post">
                        {{csrf_field()}}
                        <div class="login__form">
                            <div  style="margin-bottom: 20px;margin-top: -20px">

                                <div class="login__row">
                                    <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                    <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                                    </svg>
                                    <input type="text" class="login__input name" name="Username" placeholder="Username" autocomplete="off" value=""/>
                                </div>
                                <div class="login__row">
                                    <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                    <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                                    </svg>
                                    <input type="password" class="login__input pass" name="Password" placeholder="Password" value=""  autocomplete="off"/>
                                </div>
                                <input type="submit" class=" btn btn-info login__submit" style="margin-top: 30px" >Sign in
                                <p class="login__signup" style="margin-top: -15px">Don't have an account? &nbsp;<a>Sign up</a></p>-->
                            </div>
                        </div> 
                    </form>


                </div>
            </div>
            <script src="{{ asset('bower_components/bootstrap/jquery/dist/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
            <!--<script src="bootstrap/js/index.js"></script>-->
    </body>
</html>
