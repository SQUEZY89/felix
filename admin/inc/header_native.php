<?php
if (!empty($_SESSION['remember'])) {
    setcookie("k_mail", $_SESSION['k_mail'], time() + (10 * 365 * 24 * 60 * 60));
    setcookie("k_adi", $_SESSION['k_adi'], time() + (10 * 365 * 24 * 60 * 60));
    setcookie("k_profil", $_SESSION['k_profil'], time() + (10 * 365 * 24 * 60 * 60));
}

?>

<div class="page-content">
    <div class="page-header">
        <nav class="navbar navbar-expand-lg d-flex justify-content-between">
            <div class="header-title flex-fill">
                <a href="#" id="sidebar-toggle"><i data-feather="arrow-left"></i></a>
                <h5><?php echo $page_title ?></h5>
            </div>
            <div class="flex-fill" id="headerNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-md-block d-lg-none">
                        <a class="nav-link" href="#" id="toggle-search"><i data-feather="search"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="/<?php 
                        if(empty($_SESSION['k_profil']))
                        {
                        echo'../stock/upload/profile/sssdfdf.gif';
                        }
                        else{
                            echo $_SESSION['k_profil'];
                        }
                        ?>" alt=""></a>
                        <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i><?php echo ucfirst_tr($_SESSION['k_adi']) ?></a>
                            <a class="dropdown-item" href="/kullanicilar"><i data-feather="users"></i>Kullanıcılar</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i data-feather="settings"></i>Ayarlar</a>
                            <?php if (!empty($_COOKIE['k_mail'])) { ?>
                                <a class="dropdown-item" href="/sleep"><i data-feather="unlock"></i>Kilitle</a>
                            <?php } ?>
                            <a class="dropdown-item" href="/logout"><i data-feather="log-out"></i>Güvenli Çıkış</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>