<?php

$customJAVA = array(
    '<script src="https://google.com/recaptcha/api.js"></script>',
);
error_reporting(0);
session_start();
session_destroy();

$page_title = 'Giriş Yap';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Profesyonel Minecraft Sunucusu!">
    <meta name="keywords" content="worlwide,automation">
    <meta name="author" content="💎AY TEAM💎">

    <title>Giriş Yap - 💎AY TEAM💎</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">
    <link rel="shortcur icon" href="../assets/images/logoc.png">


    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<body class="login-page">
    <!--BAŞLANGIC-->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                    <div>    
                    <img style="width: 370px; height: 150px;" alt="gif" src="https://share.creavite.co/6691bdd46bbfe79675147e8f.gif" class="EGMLogo">
                        </div>
                        <div style="margin-top: 1px;" class="authent-text">
                        
                        <p style="color:#fff;">🎉FELİX NEW DATA🎉</p>
                        <p style="color:#fff;">✅Lütfen Hesabınıza Giriş Yapınız✅</p>
                        </div>
                        <?php if (htmlspecialchars($_GET["alert"]) == 'wrong') { ?>
                            <div class="alert alert-danger" role="alert">
                                Yanlış anahtar girdiniz⛔❌
                            </div>
                        <?php } else if (htmlspecialchars($_GET["alert"]) == 'blocked') { ?>
                            <div class="alert alert-danger" role="alert">
                                Girdiğiniz anahtar yasaklanmıştır!
                            </div>
                        <?php } else if (htmlspecialchars($_GET["alert"]) == 'error') { ?>
                            <div class="alert alert-danger" role="alert">
                                Giriş hatası! Lütfen yönetici ile iletişime geçin.
                            </div>
                        <?php } else if (htmlspecialchars($_GET["alert"]) == 'captchaerr') { ?>
                            <div class="alert alert-danger" role="alert">
                                Captcha hatalı girildi!
                            </div>
                        <?php } else if (htmlspecialchars($_GET["alert"]) == 'banned') { ?>
                            <div class="alert alert-danger" role="alert">
                                Hesabınıza başka bir yer veya tarayıcıdan girildiği için anahtarınız yasaklanmıştır!
                            </div>
                        <?php } ?>
                        <form action="../server/kontrol.php" method="POST">
                            <div class="mb-3">
                                <div class="form-floating">
                                <input name="k_key" type="password" class="form-control" id="floatingPassword" placeholder="Anahtar">
                                    <label for="floatingPassword">Anahtar >💸</label>
                                </div>
                            </div>
                            <div class="mb-3 form-check">

                                <input name="rememberMe" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Beni Hatırla</label>
                            </div>
                            <center style="margin-bottom: 1px;">
                                <div class="g-recaptcha" data-theme="dark" data-sitekey="6LeLJfofAAAAAP65X1luqa6QqUhAbhvI7Y0z8_v-"></div>
                            </center>
                            <div class="d-grid">
                                <button name="loginForm" type="submit" class="btn btn-info m-b-xs">😈Giriş Yap😈</button>
                            </div>
                            <div class="d-grid">
                                <a href="https://discord.gg/mVpAz3xTvK" class="btn btn-primary m-b-xs"><i class="fab fa-discord"></i> 💎Discord Adresimize Gelin💎</a>
                            </div>
                           
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
	
       body{
      background-image: url("https://cdn.discordapp.com/attachments/1007944826567798824/1093629309765296188/9bc27292880429.5e569ff84e4d0.gif");
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }



        .KronikLogo1 {
            margin-right: 0;
            width: auto;
            height: 70px;
            margin: 25px auto;
            display: block;
            text-align: center;
            font-size: 20px;
            font-weight: 500;
        }

        #key:focus {
            background-color: red;
        }
    </style>
    
    <!--BİTİŞ-->
    <?php include('inc/footer_main.php'); ?>