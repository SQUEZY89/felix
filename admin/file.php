<?php
include_once "../server/rolecontrol.php";

$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link rel="icon" href="https://quarex.pro/assets/images/quarexlogox2.png" type="image/x-icon" />',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>'

);

$page_title = '📁Dosyalar📁';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');



?>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Quarex">
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">



</head>

          <div class="app-content content file-manager-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-file-manager">
                        <div class="sidebar-inner">
                         
                        </div>
                    </div>

                </div>
            </div>
			
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">

                        <div class="body-content-overlay"></div>

                        <div class="file-manager-main-content">

                            <div class="file-manager-content-header d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-toggle d-block d-xl-none float-start align-middle ms-1">
                                        <i data-feather="menu" class="font-medium-5"></i>
                                    </div>
                                    <div class="input-group input-group-merge shadow-none m-0 flex-grow-1">
                                        <span class="input-group-text border-0">
                                            <i data-feather="search"></i>
                                        </span>
                                        <input type="text" class="form-control files-filter border-0 bg-transparent" placeholder="Arama" />
                                    </div>
                                </div>
								<div class="d-flex align-items-center">
                                    <div class="file-actions">
                                        <a href="#" target="_blank" class="text-white"><i data-feather="arrow-down-circle" class="font-medium-2 cursor-pointer d-sm-inline-block d-none me-50"></i></a>
                                        <i data-feather="alert-circle" class="font-medium-2 cursor-pointer d-sm-inline-block d-none" data-bs-toggle="modal" data-bs-target="#app-file-manager-info-sidebar"></i>
                                        <div class="dropdown d-inline-block">
                                            <i class="font-medium-2 cursor-pointer" data-feather="more-vertical" role="button" id="fileActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </i>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="fileActions">
                                                <a class="dropdown-item" href="
#" target="_blank">
                                                    <i data-feather="download" class="cursor-pointer me-50"></i>
                                                    <span class="align-middle">Indir</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <div class="d-flex align-items-center">
                                    <div class="btn-group view-toggle ms-50" role="group">
                                        <input type="radio" class="btn-check" name="view-btn-radio" data-view="grid" id="gridView" checked autocomplete="off" />
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                          

                            <div class="file-manager-content-body">
                                <div class="view-container">
                                   
                                    <div class="card file-manager-item file">
                                        <div class="form-check">
                                            
                                            <label class="form-check-label" for="customCheck9"></label>
                                        </div>
                                        <div class="card-img-top file-logo-wrapper">
                                            <div class="dropdown float-end">
                                               
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center w-100">
                                                
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="content-wrapper">
                                                <img src="https://i.hizliresim.com/3ncf7h4.png" alt="file-icon" height="35" />
                                                <p class="card-text file-name mb-0"><br>
                                                    
Vesika.rar</p>
                                                <p class="card-text file-size mb-0">VESİKA APİ</p>
                                                <p class="card-text file-date">ALMAK İSTEYEN</p>
                                                <p class="card-text file-date">SQUEZY#0001 DM</p>
                                            </div>
                                            
											<small class="file-accessed text-muted">Fiyat:400TL</small><br>
                                        </div>
                                    </div>
                                    <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                                        <i data-feather="alert-circle" class="me-50"></i>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
               
                        <div class="modal modal-slide-in fade show" id="app-file-manager-info-sidebar">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <div class="modal-header d-flex align-items-center justify-content-between mb-1 p-2">
                                        <h5 class="modal-title">vesika&101m&gsm.rar</h5>
                                        <div>
                                            <i data-feather="trash" class="cursor-pointer me-50" data-bs-dismiss="modal"></i>
                                            <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal"></i>
                                        </div>
                                    </div>
                                    <div class="modal-body flex-grow-1 pb-sm-0 pb-1">
                                        <ul class="nav nav-tabs tabs-line" role="tablist">
                                            <li class="nav-item">
                                                <a data-bs-toggle="tab" href="#" role="tab" aria-controls="details-tab" aria-selected="true">
                                                    <i data-feather="file"></i>
                                                    <span class="align-middle ms-25">INDIR</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="details-tab" role="tabpanel" aria-labelledby="details-tab">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-5">
                                                    <img src="https://i.hizliresim.com/3ncf7h4.png" alt="file-icon" height="64" />
													<p class="mb-0 mt-1">vesika&101m&gsm.rar</p>
                                                    <p class="mb-0 mt-1">16.16mb</p>
                                                </div>
                                                <h6 class="file-manager-title my-2"><b>Ayarlar</b></h6>
                                                <ul class="list-unstyled">
                                                    <li class="d-flex justify-content-between align-items-center mb-1">
                                                        <span>Dosya Paylasimi</span>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="sharing" />
                                                            <label class="form-check-label" for="sharing"></label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center mb-1">
                                                        <span>Senkronizasyon</span>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" checked id="sync" />
                                                            <label class="form-check-label" for="sync"></label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center mb-1">
                                                        <span>Destek Olmak</span>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="backup" />
                                                            <label class="form-check-label" for="backup"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <hr class="my-2" />
                                                <h6 class="file-manager-title my-2"><b>Bilgi</b></h6>
                                                <ul class="list-unstyled">
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p style="color:gray !important;">Tipi</p>
                                                        <p class="fw-bold" style="color:black !important;">rar</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p style="color:gray !important;">Boyut</p>
                                                        <p class="fw-bold" style="color:black !important;">16.16mb</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p style="color:gray !important;">Lokasyon</p>
                                                        <p class="fw-bold" style="color:black !important;">Anasayfa > Dosyalar</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p style="color:gray !important;">Paylasan</p>
                                                        <p class="fw-bold" style="color:black !important;">Fayuj</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p style="color:gray !important;">Eklendi</p>
                                                        <p class="fw-bold" style="color:black !important;">13.09.2022</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 

                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	
	

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
	<script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
	<script src="app-assets/js/scripts/pages/page-pricing.js"></script>
    <script src="app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
	<script src="app-assets/js/scripts/pages/app-file-manager.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <style>
           body {
    background-image:url("https://share.creavite.co/6691c3326bbfe79675147e97.gif");
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
    </style>
</body>
<!-- END: Body-->

</html>

<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>