<?php
error_reporting(0);
session_start();
if (empty($_SESSION['id']) && empty($_COOKIE['k_adi'])) {
    header("location: /login/");
}
$page_title = 'Oturum';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Suck My Dick Bitches!">
    <meta name="keywords" content="worlwide,automation">
    <meta name="author" content="JarexCheck">

    <title><?php echo $page_title ?> - 💸AYTEAM💸</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">


    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <script src="https://google.com/recaptcha/api.js"></script>
</head>

<body class="login-page">

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                        <div class="authent-logo">
                            <img src="/<?php
                                        if (empty($_SESSION['k_profil'])) {
                                            echo '../upload/profile/default.gif';
                                        } else {
                                            echo $_SESSION['k_profil'];
                                        }
                                        ?>" alt="">
                        </div>
                        <div class="authent-text">
                            <p>Tekrardan hoşgeldin <?php echo $_SESSION['k_adi'] ?>!</p>
                            <p>Devam etmek için lütfen şifrenizi girin!</p>
                        </div>

                        <?php if (htmlspecialchars($_GET["alert"]) == 'wrong') { ?>
                            <div class="alert alert-danger" role="alert">
                                Yanlış şifre girildi!
                            </div>
                        <?php } else if (htmlspecialchars($_GET["alert"]) == 'captchaerr') { ?>
                            <div class="alert alert-danger" role="alert">
                                Captcha hatalı girildi!
                            </div>
                        <?php } ?>
                        <form method="POST" action="../server/kontrol.php">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input name="sessionPass" type="password" class="form-control" id="floatingPassword" placeholder="Şifre" required autofocus>
                                    <label for="floatingPassword">Şifre</label>
                                </div>
                            </div>
                            <center style="margin-bottom: 10px;">
                                <div class="g-recaptcha" data-sitekey="6LecnEweAAAAACdB5jIQ0yYSGNYqSUE1oj6cQhjw"></div>
                            </center>
                            <div class="d-grid">
                                <button name="sessionStart" type="submit" class="btn btn-secondary m-b-xs">Devam Et</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BİTİŞ-->
    <?php include('inc/footer_main.php'); ?>