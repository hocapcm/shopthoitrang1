<?php
ob_start(); 
    session_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "model/binhluan.php";
    include "model/cart.php";
    include "view/header.php";
    include "global.php";


    if(!isset($_SESSION['mycart'])) $_SESSION['mycart'] =[];

    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    if((isset($_GET['act'])) && ($_GET['act'] != "")){
        $act = $_GET['act'];
        switch ($act) {
            case 'sanphamct':
                if(isset($_GET['idsp']) && ($_GET['idsp']>0)){
                    $sanpham1=loadone_sanpham($_GET['idsp']);
                    $dssanphamcungloai=loadall_sanpham_cungloai("",$sanpham1['idcate']);
                    include "view/sanphamct.php";
                }else{
                    include "view/home.php";
                }
                
                break;

            case 'dssanpham':            
                $kyw = "";
                $idcate = 0;
                $listsanpham1 = loadall_sanpham($kyw,$idcate);
                
                include "view/dssanpham.php";
                break;

                
            case 'sanphamtheodm':         
                if(isset($_POST['kyw']) && ($_POST['kyw']!="")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                   $idcate = $_GET['iddm']; 
                }else{
                    $idcate = 0;
                }
                $listsanpham2 = loadall_sanpham($kyw,$idcate);   
                include "view/sanphamtheodm.php";
                break;

            case 'dangky':
                if(isset($_POST['dangky']) && ($_POST['dangky'])){
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    insert_taikhoan($user,$password,$email);
                    $thongbao = "Bạn đã đăng ký tài khoản thành công";
                }
                include "view/useraccount/dangky.php";
                break;

            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    $checkuser = checkuser($user,$password);
                    if(is_array(($checkuser))){
                        $_SESSION['user'] = $checkuser;
                        header('Location: index.php');
                    }else{
                       
                    }
                }
                include "view/useraccount/dangnhap.php";
                break;
                case 'edittaikhoan':
                    if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                        $user = $_POST['user'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $id = $_POST['id'];
                        update_taikhoan($id,$user,$password,$email,$address,$tel);
                        $_SESSION['user'] = checkuser($user,$password);
                        header('Location: index.php?act=edittaikhoan');
                    }
                    include "view/useraccount/edittaikhoan.php";
                    break;
            
            
            case 'thoat':
                session_unset();
                header('Location: index.php');
                break;

            case 'addtocart':
                if(isset($_POST['addtocart']) && ($_POST['addtocart'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $ttien=$soluong*$price;
                    $spadd = [$id,$name,$img,$price,$soluong,$ttien];
                    array_push($_SESSION['mycart'],$spadd);
                    
                }
                include "view/cart/viewcart.php";
                break;


            case 'delcart':
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                }else{
                    $_SESSION['mycart'] = [];
                }
                header('Location: index.php?act=viewcart');
                break;

            case 'viewcart':
                include "view/cart/viewcart.php";
                break;


            case 'bill':
                include "view/cart/bill.php";
                break;
            
            case 'billconfirm':
                if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])){
                    if(isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
                    else $iduser = 0;
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaydathang=date('h:i A d/m/Y');
                    $tongdonhang = tongdonhang();
                    //tạo bill
                    $idbill = insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                    //insert into cart: $session mycart va idbill
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                    }
                    //xóa session cart
                    $_SESSION['mycart']=[];
                }
                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
                include "view/cart/billconfirm.php";
                break; 
            case 'mybill':
                if(isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
                    else $iduser = 0;
                $listbill = loadall_bill("",$iduser);
                include "view/cart/mybill.php";
                break;



            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
    ob_end_flush();
?>