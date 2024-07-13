<?php
ini_set("display_errors", 0);
error_reporting(0);

include "../server/security/encrypt.php";
include "../server/baglan.php";

$krolid = $_SESSION["id"];
$krolresult = $conn->query("SELECT * FROM sh_kullanici WHERE id='$krolid'");
if ($krolresult->num_rows < 1) {
    header("Location: /logout");
    exit;
}
$krolarray = mysqli_fetch_array($krolresult);
$k_rol = $krolarray["k_rol"];
$checkID = $krolarray["id"];

?>

<style>

.neuhasusvip {
  background-color: #EEAA0D; /* Sarı */
  border: none;
  color: white;
  padding: 0px 12px;
  border-radius: 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-weight: bolder;
  font-size: 16px;
}

.neuhasus_font {
    
    font-family: 'Oswald';
    font-size:20px;
}

#sikinti {
    
    font-family: 'Oswald';
    font-size:19px;
}

.neuhasusx_fade {
	position:  relative;
	font-weight: bold;
	font-family: 'Arial Bold', sans-serif;
	font-size: 1.8em;
	  letter-spacing: 4px;
	  overflow: hidden;
	  background: linear-gradient(90deg, #000, #fff, #000);
	  background-repeat: no-repeat;
	  background-size: 80%;
	  animation: animate 3s linear infinite;
	  -webkit-background-clip: text;
	  -webkit-text-fill-color: rgba(255, 255, 255, 0);
}

@keyframes animate {
	0% {
		background-position: -300%;

	}
	100% {
		background-position: 300%;
	}
}


.neuhasuspre {
  background-color: #00e5ff; /* Yeşil */
  border: none;
  color: white;
  padding: 0px 12px;
  border-radius: 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-weight: bolder;
  font-size: 16px;
}

.neuhasusadmin {
  background-color: #000CFF; /* Dark Mavi */
  border: none;
  color: white;
  padding: 0px 12px;
  border-radius: 16px;
  font-weight: bolder;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}   

body {
    background-image:url('https://cdn.discordapp.com/attachments/1007944826567798824/1093633035280322590/2345244.jpg');
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
.card-body {
    box-shadow: 1px 0px 29px 0px rgba(255,16,240,0.73),
             3px 11px 29px -6px rgba(18,1,17,0.89);
  border-radius: 20px;
}

#se {
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: border-box,border-box,text;
    background-image: url(https://i.ibb.co/6RTDbVF/fire.gif),url(https://i.ibb.co/542CLcq/bg1.webp),linear-gradient(125deg, #aa771c 0%, #fff28a 26%, #f6c223 37%, #ffd778 49%, #eebb1d 61%, #aa771c 100%);
    background-size: 2em,3em,8em;
    animation: poseidon-anim 4s linear infinite;
}

#e {
    color: yellow;
    font-weight: bolder;
    text-shadow: 0px 0px 10px #00e5ff;
}

#dev {
	position:  relative;
	font-weight: bold;
	font-family: 'Oswald';
	font-size: 1.5em;
	  letter-spacing: 4px;
	  overflow: hidden;/*
	  background: linear-gradient(90deg, #000, #00FF00, #000);
	  background-repeat: no-repeat;
	  background-size: 80%;
	  animation: animate 3s linear infinite;
	  -webkit-background-clip: text;
	  -webkit-text-fill-color: rgba(255, 255, 255, 0);
	  color: #00e5ff;*/
	  
    
    
}
/*
@keyframes animate {
	0% {
		background-position: -300%;

	}
	100% {
		background-position: 300%;
	}
}
*/

/* neuhasusX --------- */


*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}




.glitch {
  font-size: 24px;
  color: #ffffff;
  letter-spacing:4px;
  animation: glitch 0.2s infinite forwards;
  animation-direction: alternate-reverse;
  position: relative;
  user-select: none;
  font-family: monospace;
}

.glitch::before {
  content: "JANTİ";
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  animation: glitch1 0.1s infinite forwards;
  animation-direction: alternate-reverse;
  text-shadow: none;
}
.glitch::after {
  content: "QUAREX";
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  animation: glitch2 0.1s infinite forwards;
  animation-direction: alternate-reverse;
  text-shadow: none;
}

@keyframes glitch {
  60% {
    text-shadow: 9px 0 #00ffff, -9px 0 #ff01ae;
  }
  80% {
    text-shadow: 0 12px #ff01ae, 0 -12px #00ffff;
  }
  100% {
    text-shadow: 9px 0 #00ffff, -9px 0 #ff01ae;
  }
}

@keyframes glitch1 {
  to {
    transform: translate(-30px, -50%);
    opacity: 0;
  }
}

@keyframes glitch2 {
  to {
    transform: translate(30px, -50%);
    opacity: 0;
  }
}
.neuhasus_karsila {
    background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);
    background-size: 19em;
    font-weight: bold;
    font-family:Verdana;
    font-size:20px;
}

.ne_mesele{
    font-family:Verdana;
    font-size:20px;
}

body {
  padding: 0;
  margin: 0;
  font-family: sans-serif;
}
.popup-box {
  width: 500px;
  background-color: #eee;
  padding: 65px;
  font-size: 36px;
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 10px;
  display: none;
}
.popup-box span {
  position: absolute;
  top: -10px;
  right: -10px;
  width: 20px;
  height: 20px;
  background-color: red;
  color: white;
  padding: 5px;
  border-radius: 50%;
  font-size: 16px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.annenz {
  font-size: 20px;
  color: #181821;
  font-family: Verdana;
}

body {
    background-image:url('https://cdn.discordapp.com/attachments/1007944826567798824/1093633035280322590/2345244.jpg');
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }

    .page-sidebar {
        box-shadow: 1px 0px 29px 0px rgba(255,16,240,0.73),
             3px 11px 29px -6px rgba(18,1,17,0.89);
  border-radius: 20px;
    }
    .NeuhasusLogo{
    
    width:80%;
  }

</style>
<div class="page-container">
    <div class="page-sidebar card">
	<a href="/panel">
	<center>
       <img style="width: 211px; height: 50px;" alt="gif" src="/assets/icon/logo.gif" class="EGMLogo">
	</center>   
	</a>
        <ul class="list-unstyled accordion-menu">
        <li <?php if ($page_title == 'Panel') {
                    echo 'class="active-page"';
                } ?>>
                <a href="/panel"><i data-feather="home"></i>Anasayfa💸</a>
            </li>
             <li <?php
                if (
                    $page_title === "Ad Soyad" ||
                    $page_title === "Ad Soyad PRO"
                ) {
                    echo 'class="open"';
                }
                ?>>
                
                <a <?php
                    if (
                        $page_title === "Ad Soyad" ||
                        $page_title === "Ad Soyad PRO"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#">
                    <i data-feather="credit-card"></i>CC CHECKER<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    
                    <li><a style="color: #9a9cab;" <?php if ($page_title === "TR CC CHECKER") echo 'style="color: #83d8ae !important;"' ?> href="/trcc"><i class="fa fa-arrow-right"></i>TR CC Checker</a></li>
                    <li><a style="color: #9a9cab;" <?php if ($page_title === "US CC CHECKER") echo 'style="color: #83d8ae !important;"' ?> href="/uscc"><i class="fa fa-arrow-right"></i>US CC Checker</a></li>
                    <li><a style="color: #9a9cab;" <?php if ($page_title === "BIN Checker") echo 'style="color: #83d8ae !important;"' ?> href="/binchecker"><i class="fa fa-arrow-right"></i>BIN Checker</a></li>
                    
                </ul>
            </li>
            <li <?php
                if (
                    $page_title === "Ad Soyad" ||
                    $page_title === "Ad Soyad PRO"
                ) {
                    echo 'class="open"';
                }
                ?>>
                
                <a <?php
                    if (
                        $page_title === "Ad Soyad" ||
                        $page_title === "Ad Soyad PRO"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#">
                    <i data-feather="user"></i>AD SOYAD<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    
                    <li><a style="color: #9a9cab;" <?php if ($page_title === "Ad Soyad") echo 'style="color: #83d8ae !important;"' ?> href="/proadsoyad"><i class="fa fa-arrow-right"></i>Ad Soyad PRO</a></li>
                    <li><a style="color: #9a9cab;" <?php if ($page_title === "Ad Soyad PRO") echo 'style="color: #83d8ae !important;"' ?> href="/secmen2015"><i class="fa fa-arrow-right"></i>Seçmen Sorgu</a></li>
                    
                </ul>
            </li>
            <li php
                if (
                    $page_title === "Mernis 2022" ||
                    $page_title === "Mernis 2022 PRO" ||
                    $page_title === "TC GSM" ||
                    $page_title === "Seri No" ||
                    $page_title === "TC İşyeri" ||
                    $page_title === "Aile Sorgu TC"
                ) {
                    echo 'class="open"';
                }
                ?>
                <a <?php
                    if (
                        $page_title === "Mernis 2022" ||
                        $page_title === "Mernis 2022 PRO" ||
                        $page_title === "TC GSM" ||
                        $page_title === "Seri No" ||
                        $page_title === "TC İşyeri" ||
                        $page_title === "Aile Sorgu TC" ||
                        $page_title === "Soyağacı Sorgu"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#"><svg style="xmlns="<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>SORGULAR<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    <li><a style="" <?php if ($page_title === "Mernis 2022") echo 'style="color: #fff !important;"' ?> href="/tcpro"><i class="fa fa-arrow-right"></i>TC SORGU</a></li>
                    <li><a style="" <?php if ($page_title === "Mernis 2022") echo 'style="color: #fff !important;"' ?> href="/asi"><i class="fa fa-arrow-right"></i>Aşı Sorgu</a></li>
                    <li><a style="" <?php if ($page_title === "Seri No") echo 'style="color: #83d8ae !important;"' ?> href="/vegidairesi"><i class="fa fa-arrow-right"></i>Vergi Sorgu</a></li>
                    <li><a style="" <?php if ($page_title === "Aile Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/aile"><i class="fa fa-arrow-right"></i>Aile Sorgu</a></li>
                    <li><a style="" <?php if ($page_title === "Soyağacı Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/soyagaci"><i class="fa fa-arrow-right"></i>Soyağacı Sorgu</a></li>
                    <li><a style="" <?php if ($page_title === "Tapu Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/adres"><i class="fa fa-arrow-right"></i>Adres Sorgu (2023)</a></li>
                    <li><a style="" <?php if ($page_title === "TC İşyeri") echo 'style="color: #83d8ae !important;"' ?> href="/2015adres"><i class="fa fa-arrow-right"></i>Adres Sorgu (2015)</a></li>
                    <li><a style="" <?php if ($page_title === "TC İşyeri") echo 'style="color: #83d8ae !important;"' ?> href="/ihbar"><i class="fa fa-arrow-right"></i>Cimer İhbar</a></li>
                </ul>
            </li>
            <li php
                if (
                    $page_title === "TC GSM" ||
                    $page_title === "GSM TC"
                ) {
                    echo 'class="open"';
                }
                ?>
                <a <?php
                    if (
                        $page_title === "TC GSM" ||
                        $page_title === "GSM TC"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#"><svg style="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>TELEFON<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                <li><a style="" <?php if ($page_title === "GSM TC") echo 'style="color: #fff !important;"' ?> href="/plus"><i class="fa fa-arrow-right"></i>TC GSM + GSM TC</a></li>
                <li><a style="" <?php if ($page_title === "GSM TC") echo 'style="color: #fff !important;"' ?> href="/sms"><i class="fa fa-arrow-right"></i>SMS BOMBER</a></li>
                </ul>
            </li>
            <li php
                if (
                    $page_title === "Vesikalık Sorgu" ||
                    $page_title === "Kimlik Ön Arka"
                ) {
                    echo 'class="open"';
                }
                ?>
                <a class="white" <?php
                    if (
                        $page_title === "Vesikalık Sorgu" ||
                        $page_title === "Kimlik Ön Arka"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#"><svg style="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>FOTOĞRAF<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    <li><a style=" !important;" <?php if ($page_title === "Vesikalık Sorgu") echo 'style="color: #fff !important;"' ?> href="/vesikalik"><i class="fa fa-arrow-right"></i>Vesikalık Sorgu</a></li>
                </ul>
            </li>
            <li php
                if (
                    $page_title === "TC Okul" ||
                    $page_title === "Eğitim Sorgu" ||
                    $page_title === "Sınıf Sorgu"
                ) {
                    echo 'class="open"';
                }
                ?>
                <a <?php
                    if (
                        $page_title === "TC Okul" ||
                        $page_title === "Eğitim Sorgu" ||
                        $page_title === "Sınıf Sorgu"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#"><svg style="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>EĞİTİM<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    <li><a style="" <?php if ($page_title === "Okul No Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/eokul"><i class="fa fa-arrow-right"></i>Okul No Sorgu</a></li>
                    <li><a style="" <?php if ($page_title === "Sınıf Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/sinif"><i class="fa fa-arrow-right"></i>Sınıf Sorgu</a></li>
                </ul>
            </li>
            <li php
                if (
                    $page_title === "Mernis 2015" ||
                    $page_title === "Facebook" ||
                    $page_title === "GSM TC"
                ) {
                    echo 'class="open"';
                }
                ?>
                <a style="color:#fff;" <?php
                    if (
                        $page_title === "Mernis 2015" ||
                        $page_title === "Facebook" ||
                        $page_title === "GSM TC"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#">
                    <i data-feather="database"></i>DATABASE<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    <li><a style="" <?php if ($page_title === "Mernis 2015") echo 'style="color: #83d8ae !important;"' ?> href="/mernis2015"><i class="fa fa-arrow-right"></i>2015 Sorgu</a></li>
                    <li><a style="" <?php if ($page_title === "Facebook") echo 'style="color: #83d8ae !important;"' ?> href="/facebook"><i class="fa fa-arrow-right"></i>Facebook Sorgu</a></li>
                    <li><a style="" <?php if ($page_title === "GSM TC") echo 'style="color: #83d8ae !important;"' ?> href="/gsmtc"><i class="fa fa-arrow-right"></i>GSM'den TC</a></li>
                </ul>
            </li>
            <?php if ($k_rol === "1") { ?>
                <li php
                    if (
                        $page_title === "User Manager" ||
                        $page_title === "User Settings" ||
                        $page_title === "Notice Sharing" ||
                        $page_title === "Kullanıcı Ekle" ||
                        $page_title === "Duyuru Düzenle" ||
                        $page_title === "Kimlik Ön Arka"

                    ) {
                        echo 'class="open"';
                    }
                    ?>
                    <a <?php
                        if (
                            $page_title === "User Manager" ||
                            $page_title === "User Settings" ||
                            $page_title === "Notice Sharing" ||
                            $page_title === "Kullanıcı Ekle" ||
                            $page_title === "Duyuru Düzenle" ||
                            $page_title === "Zaman Aşımı" ||
                    $page_title === "Kimlik Ön Arka"
                        ) {
                            echo 'style="color: white;"';
                        }
                        ?> href="/users"><i data-feather="lock"></i>Admin Role</a>
                    <ul>
                        <li>
                            <a style="" <?php
                                if (
                                    $page_title === "Notice Sharing" ||
                                    $page_title === "Duyuru Düzenle"
                                ) {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/notice" class="active"><i class="fa fa-arrow-right"></i>Duyurular</a>
                        </li>
                        <li>
                            <a style="" <?php
                                if (
                                    $page_title === "User Manager" ||
                                    $page_title === "User Settings"
                                ) {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/users" class="active"><i class="fa fa-arrow-right"></i>Kullanıcılar</a>
                        </li>
                        <li>
                            <a style="" class="white" <?php
                                if ($page_title === "Kullanıcı Ekle") {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/adduser" class="active"><i class="fa fa-arrow-right"></i>Kullanıcı Ekle</a>
                        </li>
                        <li>
                            <a style="" <?php
                                if (
                                    $page_title === "Zaman Aşımı" ||
                                    $page_title === "Timeout"
                                ) {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/timeout" class="active"><i class="fa fa-arrow-right"></i>Zaman Aşımı</a>

                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>