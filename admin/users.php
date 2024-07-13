<?php
require '../server/baglan.php';
require '../server/admincontrol.php';

$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">');
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>'
);

$page_title = 'User Manager';

include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');
?>
<!--BAŞLANGIC-->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Felix Kullanıcılar</h5>
                <p>You must be edit member roles to join everyone into your platform.</p>
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
			    <th>Kullanıcı Adı</th>
                            <th>IP</th>
                            <th>Tarayıcı</th>
                            <th>Tarih</th>
                            <th>OS</th>
                            <th>Üyelik</th>
                            <th>Ayarlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM `sh_kullanici`");
                        while ($getvar = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $getvar['id']; ?></td>
								<td><?php echo $getvar['k_adi']; ?></td>
                                <td><?php echo $getvar['k_log']; ?></td>
                                <td><?php echo  $getvar['k_browser'] ?></td>
                                <td><?php echo  $getvar['k_time'] ?></td>
                                <td>
                                    <div class="platform_icon"><?php getos($getvar['k_os']) ?></div>
                                </td>
                                <td>
                                    <?php
                                    $roll = $getvar['k_rol'];
                                    switch ($roll) {
                                        case '0':
                                            $uyelik = "Freemium";
                                            break;
                                        case '1':
                                            $uyelik = "Admin";
                                            break;
                                        case '2':
                                            $uyelik = "Premium";
                                            break;
                                    }
                                    echo $uyelik;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo '<a href="edituser/' . $getvar['id'] . '"><button type="button" class="btn btn-info m-b-xs">Üyelik Ayarları</button></a';
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>