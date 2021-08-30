<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
?>

<?php
if(!empty($_GET['loaithe']))
{
    $loaithe = check_string($_GET['loaithe']);
}
else
{
    die('<option value="">Vui lòng chọn loại thẻ</option>');
}
?>
<option value="">-- Chọn mệnh giá --</option>
<option value="10000">10.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '10000' ")['ck'];?>%)</option>
<option value="20000">20.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '20000' ")['ck'];?>%)</option>
<option value="30000">30.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '30000' ")['ck'];?>%)</option>
<option value="50000">50.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '50000' ")['ck'];?>%)</option>
<option value="100000">100.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '100000' ")['ck'];?>%)</option>
<option value="200000">200.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '200000' ")['ck'];?>%)</option>
<option value="300000">300.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '300000' ")['ck'];?>%)</option>
<option value="500000">500.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '500000' ")['ck'];?>%)</option>
<option value="1000000">1.000.000đ (phí <?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '1000000' ")['ck'];?>%)</option>