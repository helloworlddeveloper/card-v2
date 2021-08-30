<?php
    require_once(__DIR__."/config/config.php");
    require_once(__DIR__."/config/function.php");
    $title = 'HOME | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/public/client/Header.php");
    require_once(__DIR__."/public/client/Nav.php");
?>
<?php
if($CMSNT->site('status_ref') == 'ON')
{
    if(isset($_GET['ref']) )
    {
        $ref_id = check_string($_GET['ref']);
        if($CMSNT->get_row("SELECT * FROM `users` WHERE `id` = '$ref_id' ")['ip'] != myip())
        {
            $CMSNT->cong("users", "ref_click", 1, " `id` = '$ref_id' ");
            $_SESSION['ref'] = check_string($_GET['ref']);
        }
        else
        {
            $_SESSION['ref'] = NULL;
        }
    }
}

if(empty($_SESSION['ref']))
{
    $_SESSION['ref'] = NULL;
}
?>
<?php if(getSite('display_carousel') == 'ON') { ?>
<div id="myCarousel" class="carousel slider slide" data-ride="carousel"
    style="background: <?=$CMSNT->site('theme_color');?>">
    <div class="container slide">
        <div class="carousel-inner">
            <div class="item active">
                <div class="row">
                    <div class="col-sm-6 pull-right"><img src="<?=BASE_URL('assets/img/');?>support.png"
                            alt="Tích hợp API gạch thẻ tự động cho Shop" /></div>
                    <div class="col-sm-6">
                        <div class="slide-text">
                            <h3 style="color: #ffffff">Tích hợp API gạch thẻ tự động cho Shop</h3>
                            <p class="hidden-xs" style="color: #ffffff">Cam kết không nuốt thẻ, không bảo trì, có nhân
                                viện trực hỗ trợ 24/24, rút tiền sau 1 phút. Hotline: <?=$CMSNT->site('hotline');?></p>
                            <a href="<?=BASE_URL('Ket-noi-api');?>" class="btn btn-warning text-uppercase hidden-xs">
                                Xem ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-sm-6 pull-right"><img src="<?=BASE_URL('assets/img/');?>payment.png"
                            alt="Đổi thẻ cào thành tiền mặt nhanh chóng - tiện lợi" /></div>
                    <div class="col-sm-6">
                        <div class="slide-text">
                            <h3 style="color: #ffffff">Đổi thẻ cào thành tiền mặt nhanh chóng - tiện lợi</h3>
                            <p class="hidden-xs" style="color: #ffffff">Gạch thẻ siêu rẻ chiết khấu 15 - 20%. Rút free
                                phí về các ngân hàng Nội địa Việt Nam, Ví điện tử Momo</p>
                            <a href="" class="btn btn-warning text-uppercase hidden-xs"> Đổi Thẻ Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<?php }?>

<section class="main">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"
                        style="color:white; background-color: <?=$CMSNT->site('theme_color');?>;">
                        ĐỔI THẺ CÀO TỰ ĐỘNG</div>
                    <div class="panel-body">
                        <div id="thongbao"></div>
                        <div id='loading_box' style='display:none;'>
                                <center><img src='<?=BASE_URL('assets/img/loading_box.gif');?>' /></center>
                        </div>
                        <table class="table table-bordered table-striped dataTable">
                            <tbody>
                                <tr>
                                    <td>Loại thẻ</td>
                                    <td><select id="loaithe" class="telco form-control"></select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mệnh giá</td>
                                    <td><select id="menhgia" class="charging-amount form-control">
                                            <option value="">Vui lòng chọn loại thẻ</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số seri</td>
                                    <td><input id="seri" style="color: green;" class="form-control" type="text" placeholder="Seri"></td>
                                </tr>
                                <tr>
                                    <td>Mã thẻ</td>
                                    <td><input id="pin" style="color: blue;" class="form-control" type="text" placeholder="Mã thẻ"></td>
                                </tr>
                                <tr>
                                    <td>Thực nhận</td>
                                    <td><input id="thucnhan" style="color: red;" class="form-control" type="text" value="0" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" id="token" value="<?=$getUser['token'];?>">
                    </div>
                    <div class="panel-footer">
                        <button type="submit" id="NapTheAuto" class="btn btn-primary">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i> NẠP NGAY
                        </button>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            $("#NapTheAuto").on("click", function() {
                $("#loading_box").show();
                $('#NapTheAuto').html('ĐANG XỬ LÝ').prop('disabled',
                    true);
                $.ajax({
                    url: "<?=BASE_URL("assets/ajaxs/NapThe.php");?>",
                    method: "POST",
                    data: {
                        type: 'NapTheAuto',
                        token: $("#token").val(),
                        seri: $("#seri").val(),
                        pin: $("#pin").val(),
                        loaithe: $("#loaithe").val(),
                        menhgia: $("#menhgia").val()
                    },
                    success: function(response) {
                        $("#loading_box").hide();
                        $("#thongbao").html(response);
                        $('#NapTheAuto').html(
                                '<i class="fa fa-upload" aria-hidden="true"></i> NẠP NGAY')
                            .prop('disabled', false);
                    }
                });
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                setTimeout(e => {
                    GetCard24()
                }, 0)
            });
            function GetCard24() {
                $.ajax({
                    url: "<?=BASE_URL('api/loaithe.php');?>",
                    method: "GET",
                    success: function(response) {
                        $("#loaithe").html(response);
                    }
                });
            }
            </script>
            <script type="text/javascript">
            $('#loaithe').change(function() {
                $.ajax({
                    url: "<?=BASE_URL("assets/ajaxs/menhgia.php");?>",
                    method: "GET",
                    data: {
                        loaithe: $("#loaithe").val()
                    },
                    success: function(response) {
                        $("#menhgia").html(response);
                    }
                });
            });
            </script>
            <script type="text/javascript">
            $('#menhgia').change(function() {
                var ketqua = 'Đang tính thực nhận';
                document.getElementById("thucnhan").value = (ketqua.toString().replace(
                    /(.)(?=(\d{3})+$)/g, '$1.'));
                $.ajax({
                    url: "<?=BASE_URL("assets/ajaxs/thucnhan.php");?>",
                    method: "GET",
                    data: {
                        loaithe: $("#loaithe").val(),
                        menhgia: $("#menhgia").val()
                    },
                    success: function(response) {
                        var ketqua = response;
                        document.getElementById("thucnhan").value = (ketqua.toString().replace(
                            /(.)(?=(\d{3})+$)/g, '$1.') + 'đ');
                    }
                });
            });
            </script>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"
                        style="color:white; background-color: <?=$CMSNT->site('theme_color');?>;">
                        THÔNG BÁO</div>
                    <div class="panel-body"><?=$CMSNT->site('thongbao');?></div>
                </div>
            </div>
            <?php if(isset($_SESSION['username'])) { ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"
                        style="color:white; background-color: <?=$CMSNT->site('theme_color');?>;">
                        LỊCH SỬ ĐỔI THẺ</div>
                    <div class="panel-body">
                        <p>Với các thẻ đang xử lý quý khách có thể <a href="javascript:location.reload()"><b
                                    class="text-danger"> nhấn vào
                                    đây </b></a> để cập nhật trạng thái của thẻ cào.
                        </p>
                        <div class="table-responsive">
                            <table id="datatable2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>LOẠI THẺ</th>
                                        <th>MỆNH GIÁ</th>
                                        <th>THỰC NHẬN</th>
                                        <th>SERI</th>
                                        <th>PIN</th>
                                        <th>THỜI GIAN</th>
                                        <th>CẬP NHẬT</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>GHI CHÚ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; foreach($CMSNT->get_list(" SELECT * FROM `card_auto` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row) { ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['loaithe'];?></td>
                                        <td><b style="color: green;"><?=format_cash($row['menhgia']);?></b>
                                        </td>
                                        <td><b style="color: red;"><?=format_cash($row['thucnhan']);?></b>
                                        </td>
                                        <td><?=$row['seri'];?></td>
                                        <td><?=$row['pin'];?></td>
                                        <td><span class="label label-danger"><?=$row['thoigian'];?></span>
                                        </td>
                                        <td><span class="label label-primary"><?=$row['capnhat'];?></span>
                                        </td>
                                        <td><?=status($row['trangthai']);?></td>
                                        <td><?=$row['ghichu'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function() {
                $('#datatable2').DataTable();
            });
            </script>
            <?php }?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"
                        style="color:white; background-color: <?=$CMSNT->site('theme_color');?>;">
                        BIỂU PHÍ ĐỔI THẺ</div>
                    <div class="panel-body">
                        <div class="tabpage" id="bang-phi">
                            <ul class="nav nav-tabs">
                                <?php foreach($list_loaithe as $loaithe) { ?>
                                <li class="<?=$loaithe == 'VIETTEL' ? 'active' : '';?>">
                                    <a data-toggle="tab" href="#discount-<?=$loaithe;?>">
                                        <span class="title"><?=$loaithe;?></span>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                            <div class="tab-content" style="padding-top: 20px;">
                                <?php foreach($list_loaithe as $loaithe) { ?>
                                <div class="table-responsive tab-pane fadess in <?=$loaithe == 'VIETTEL' ? 'active' : '';?>"
                                    id="discount-<?=$loaithe;?>">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nhóm thành
                                                    viên
                                                </th>
                                                <th class="text-center">Thẻ 10,000đ
                                                </th>
                                                <th class="text-center">Thẻ 20,000đ
                                                </th>
                                                <th class="text-center">Thẻ 30,000đ
                                                </th>
                                                <th class="text-center">Thẻ 50,000đ
                                                </th>
                                                <th class="text-center">Thẻ 100,000đ
                                                </th>
                                                <th class="text-center">Thẻ 200,000đ
                                                </th>
                                                <th class="text-center">Thẻ 300,000đ
                                                </th>
                                                <th class="text-center">Thẻ 500,000đ
                                                </th>
                                                <th class="text-center">Thẻ
                                                    1,000,000đ
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td><b>Thành viên/API</b></td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '10000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '20000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '30000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '50000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '100000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '200000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '300000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '500000' ")['ck'];?>%
                                                </td>
                                                <td><?=$CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '1000000' ")['ck'];?>%
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
});
</script>
<?php 
    require_once(__DIR__."/public/client/Footer.php");
?>