<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CẤU HÌNH CHIẾT KHẤU | '.$CMSNT->site('tenweb');
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");
?>
<?php
if(isset($_POST['btnSaveCk']) && $getUser['level'] == 'admin')
{
    if($CMSNT->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value)
    {
        $CMSNT->update("ck_card_auto", array(
            'ck' => $value
        ), " `id` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}
if(isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin')
{
    if($CMSNT->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value)
    {
        $CMSNT->update("options", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cấu hình chiết khấu</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH TRUMTHE.VN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Partner id</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="partner_id" value="<?=$CMSNT->site('partner_id');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Partner key</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="partner_key" value="<?=$CMSNT->site('partner_key');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF API trumthe.vn</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_trumthe" required>
                                        <option value="<?=$CMSNT->site('status_trumthe');?>"><?=$CMSNT->site('status_trumthe');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH CARDVIP.VN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Key</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_cardvip" value="<?=$CMSNT->site('api_cardvip');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF API cardvip.vn</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_cardvip" required>
                                        <option value="<?=$CMSNT->site('status_cardvip');?>"><?=$CMSNT->site('status_cardvip');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH CHIẾT KHẤU ĐỔI THẺ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="alert alert-info">
                                Set chiết khấu về 0 nếu bạn muốn bảo trì thẻ đó
                            </div>
                            <div class="row">
                                <?php foreach($CMSNT->get_list(" SELECT * FROM `ck_card_auto` ") as $row) { ?>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">
                                            Nhà mạng: <b style="color:blue;"><?=$row['loaithe'];?></b> | Mệnh giá: <b
                                                style="color: red;"><?=format_cash($row['menhgia']);?></b> | Trạng thái:
                                            (<?=display_loaithe($row['ck']);?>)</label>
                                        <div class="col-sm-6">
                                            <div class="form-line">
                                                <input type="text" name="<?=$row['id'];?>" value="<?=$row['ck'];?>"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>

                            </div>
                            <button type="submit" name="btnSaveCk" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>

<?php 
    require_once("../../public/admin/Footer.php");
?>