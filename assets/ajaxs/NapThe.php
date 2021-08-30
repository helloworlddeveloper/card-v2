<?php  
    require_once("../../config/config.php");
    require_once("../../config/function.php");

    if($_POST['type'] == 'NapTheAuto')
    {
        $token = check_string($_POST['token']);
        $loaithe = check_string($_POST['loaithe']);
        $menhgia = check_string($_POST['menhgia']);
        $seri = check_string($_POST['seri']);
        $pin = check_string($_POST['pin']);
        $code = random('0123456789', 32);
        if(empty($_SESSION['username']))
        {
            msg_error2("Vui lòng đăng nhập");
        }
        if(empty($loaithe))
        {
            msg_error2("Vui lòng chọn loại thẻ");
        }
        if(empty($menhgia))
        {
            msg_error2("Vui lòng chọn mệnh giá");
        }
        if(empty($seri))
        {
            msg_error2("Vui lòng nhập seri thẻ");
        }
        if(empty($pin))
        {
            msg_error2("Vui lòng nhập mã thẻ");
        }
        if (strlen($seri) < 5 || strlen($pin) < 5)
        {
            msg_error2("Mã thẻ hoặc seri không đúng định dạng!");
        }
        $getUser = $CMSNT->get_row("SELECT * FROM `users` WHERE `token` = '$token' ");
        if(!$getUser)
        {
            msg_error2("Vui lòng đăng nhập để sử dụng chức năng này");
        }
        if($CMSNT->get_row("SELECT * FROM `card_auto` WHERE `seri` = '$seri' AND `pin` = '$pin' AND `loaithe` = '$loaithe' "))
        {
            msg_error2("Thẻ này đã tồn tại trong hệ thống của chúng tôi");
        }
        if(
        $CMSNT->num_rows("SELECT * FROM `card_auto` WHERE `trangthai` = 'thatbai' AND `username` = '".$getUser['username']."' AND `thoigian` >= DATE(NOW()) AND `thoigian` < DATE(NOW()) + INTERVAL 1 DAY  ") - 
        $CMSNT->num_rows("SELECT * FROM `card_auto` WHERE `trangthai` = 'hoantat' AND `username` = '".$getUser['username']."' AND `thoigian` >= DATE(NOW()) AND `thoigian` < DATE(NOW()) + INTERVAL 1 DAY  ") >= 3)
        {
            msg_error2("Bạn đã bị chặn sử dụng chức năng này");
        }
        $ck = $CMSNT->get_row("SELECT * FROM `ck_card_auto` WHERE `loaithe` = '$loaithe' AND `menhgia` = '$menhgia'  ")['ck'];
        if(!$ck)
        {
            msg_error2("Dữ liệu không hợp lệ !");
        }
        if($ck == 0)
        {
            msg_error2("Thẻ này đang bảo trì, vui lòng đợi !");
        }
        $thucnhan = $menhgia - $menhgia * $ck / 100;


        /* OPEN API CARDVIP */
        if($CMSNT->site('status_cardvip') == 'ON')
        {
            if($loaithe == 'VNMOBI')
            {
                $loaithe = 'Vietnamobile';
            }
            $result = cardvip($loaithe, $pin, $seri, $menhgia, $code);
            if($result['status'] == 200)
            {
                $isInsert = $CMSNT->insert("card_auto", [
                    'code'      => $code,
                    'seri'      => $seri,
                    'pin'       => $pin,
                    'loaithe'   => $loaithe,
                    'menhgia'   => $menhgia,
                    'thucnhan'  => $thucnhan,
                    'username'  => $getUser['username'],
                    'trangthai' => 'xuly',
                    'ghichu'    => '',
                    'thoigian'  => gettime(),
                    'server'    => 'cardvip'
                ]);
                if($isInsert)
                {
                    msg_success("Gửi thẻ thành công", BASE_URL(''), 1000);
                }
                else
                {
                    msg_error2("Thao tác thất bại");
                }
            }
            else
            {
                msg_error2($result['message']);
            }
        }
        else if($CMSNT->site('status_trumthe') == 'ON')
        {
            $result = trumthe($loaithe, $pin, $seri, $menhgia, $code);
            if($result['status'] == 100)
            {
                msg_error2($result['message']);
            }
            if($result['status'] == 1)
            {
                $CMSNT->cong("users", "money", $thucnhan, " `token` = '$token' ");
                $CMSNT->cong("users", "total_money", $thucnhan, " `token` = '$token' ");
                /* CẬP NHẬT DÒNG TIỀN */
                $CMSNT->insert("dongtien", array(
                    'sotientruoc'   => $getUser['money'],
                    'sotienthaydoi' => $thucnhan,
                    'sotiensau'     => $getUser['money'] + $thucnhan,
                    'thoigian'      => gettime(),
                    'noidung'       => 'Đổi thẻ seri ('.$seri.')',
                    'username'      => $getUser['username']
                ));
                $CMSNT->insert("card_auto", [
                    'code'      => $code,
                    'seri'      => $seri,
                    'pin'       => $pin,
                    'amount'    => $result['amount'],
                    'loaithe'   => $loaithe,
                    'menhgia'   => $menhgia,
                    'thucnhan'  => $thucnhan,
                    'username'  => $getUser['username'],
                    'trangthai' => 'hoantat',
                    'ghichu'    => '',
                    'thoigian'  => gettime(),
                    'capnhat'   => gettime(),
                    'server'    => 'trumthe'
                ]);
                /**
                 * XỬ LÝ HOA HỒNG CHO BẠN BÈ
                 */
                if($getUser['ref'] != NULL)
                {
                    if($CMSNT->site('status_ref') == 'ON')
                    {
                        $hoahong = $menhgia * $CMSNT->site('ck_ref') / 100;
                        $getUser_ref = $CMSNT->get_row("SELECT * FROM `users` WHERE `id` = '".$getUser['ref']."' ");
                        /**
                         * CỘNG TIỀN CHO REFERRAL
                         */
                        $CMSNT->cong("users", "money", $hoahong, " `username` = '".$getUser_ref['username']."' ");
                        $CMSNT->cong("users", "total_money", $hoahong, " `username` = '".$getUser_ref['username']."' ");
                        $CMSNT->insert("dongtien", array(
                            'sotientruoc'   => $getUser_ref['money'],
                            'sotienthaydoi' => $hoahong,
                            'sotiensau'     => $getUser_ref['money'] + $hoahong,
                            'thoigian'      => gettime(),
                            'noidung'       => 'Hoa hồng bạn bè ('.$getUser['username'].')',
                            'username'      => $getUser_ref['username']
                        ));
                    }
                }
                msg_success2("Nạp thẻ thành công! !");
            }
            if($result['status'] == 2)
            {
                $CMSNT->insert("card_auto", [
                    'code'      => $code,
                    'seri'      => $seri,
                    'pin'       => $pin,
                    'loaithe'   => $loaithe,
                    'menhgia'   => $menhgia,
                    'thucnhan'  => '0',
                    'username'  => $getUser['username'],
                    'trangthai' => 'thatbai',
                    'ghichu'    => 'Sai mệnh giá',
                    'thoigian'  => gettime(),
                    'capnhat'   => gettime(),
                    'server'    => 'trumthe'
                ]);
                msg_success2("Sai mệnh giá thẻ, vui lòng liên hệ Admin !");
            }
            if($result['status'] == 3)
            {
                $CMSNT->insert("card_auto", [
                    'code'      => $code,
                    'seri'      => $seri,
                    'pin'       => $pin,
                    'loaithe'   => $loaithe,
                    'menhgia'   => $menhgia,
                    'thucnhan'  => '0',
                    'username'  => $getUser['username'],
                    'trangthai' => 'thatbai',
                    'ghichu'    => 'Thẻ không hợp lệ hoặc đã được sử dụng',
                    'thoigian'  => gettime(),
                    'capnhat'   => gettime(),
                    'server'    => 'trumthe'
                ]);
                msg_error2("Vui lòng kiểm tra lại thẻ, nạp thẻ thất bại!");
            }
            if($result['status'] == 4)
            {
                msg_error2("Chức năng này đang bảo trì, vui lòng quay lại sau");
            }
            if($result['status'] == 99)
            {
                $isInsert = $CMSNT->insert("card_auto", [
                    'code'      => $code,
                    'seri'      => $seri,
                    'pin'       => $pin,
                    'loaithe'   => $loaithe,
                    'menhgia'   => $menhgia,
                    'thucnhan'  => $thucnhan,
                    'username'  => $getUser['username'],
                    'trangthai' => 'xuly',
                    'ghichu'    => '',
                    'thoigian'  => gettime(),
                    'server'    => 'trumthe'
                ]);
                if($isInsert)
                {
                    msg_success("Gửi thẻ thành công", BASE_URL(''), 1000);
                }
                else
                {
                    msg_error2("Thao tác thất bại");
                }
            }
        }
        else
        {
            msg_error2("Hệ thống đang bảo trì vui lòng quay lại sau!");
        }
            /* END CARD VIP */


    }
    