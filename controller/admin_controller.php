<?php
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/cart.php";
    include "../model/pdo.php";
    include "../admin/header.php";
    //controller danh mục

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                }                
                include "danhmuc/add.php";
                break;
            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    $dm=loadone_danhmuc($_GET['id']);
                }                
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id']; 
                    update_danhmuc($id,$tenloai);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            

// controller sp

            case 'addsp':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $idcate = $_POST['idcate'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $des = $_POST['des'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                       // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } 
                    else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    insert_sanpham($tensp,$giasp,$hinh,$des,$idcate);
                    $thongbao="Thêm thành công";
                }         
                $listdanhmuc = loadall_danhmuc();       
                include "sanpham/add.php";
                break;


            case 'listsp':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $idcate = $_POST['idcate'];
                }
                else{
                    $kyw = "";
                    $idcate = 0;
                }
                $listdanhmuc = loadall_danhmuc();   
                $listsanpham = loadall_sanpham($kyw,$idcate);
                include "sanpham/list.php";
                break;


            case 'xoasp':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
                break;


            case 'suasp':
                    if(isset($_GET['id']) && ($_GET['id']>0)){
                        $sanpham=loadone_sanpham($_GET['id']);
                    }                
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;


            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){                  
                    $id = $_POST['id'];
                    $idcate = $_POST['idcate'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $des = $_POST['des'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                       // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } 
                    else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    $listdanhmuc = loadall_danhmuc();
                    update_sanpham($id,$idcate,$tensp,$giasp,$des,$hinh);
                    $thongbao="Cập nhật thành công";               
                }
                
                $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
                break;


//Controller useraccount

                case 'dskh':
                    
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;

                case 'xoatk':
                    if(isset($_GET['id']) && ($_GET['id']>0)){
                        delete_taikhoan($_GET['id']);
                    }
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;
                case 'suatk':
                    if(isset($_GET['id']) && ($_GET['id']>0)){
                        $tk=loadone_taikhoan($_GET['id']);
                    }                
                    include "taikhoan/update.php";
                    break;
    
    
                case 'updatetk':
                    if( (isset($_POST['capnhat'])) && ($_POST['capnhat']) ){
                        $id = $_POST['id'];
                        $user = $_POST['user'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $role = $_POST['role'];
                        update_taikhoan1($id,$user,$password,$email,$address,$tel,$role);
                        $thongbao="Cập nhật thành công";
                    }
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;

//controller quản lý đơn hàng
                case 'listbill':
                    if(isset($_POST['kyw']) && ($_POST['kyw']!="")){
                        $kyw = $_POST['kyw'];
                        
                    }else{
                        $kyw = "";
                    }
                    $listbill = loadall_bill($kyw,0);
                    include "bill/listbill.php";
                    break;
                case 'xoabill':
                    if(isset($_GET['id']) && ($_GET['id']>0)){
                        delete_bill($_GET['id']);
                    }
                    $kyw = "";
                    $listbill = loadall_bill($kyw,0);
                    include "bill/listbill.php";
                    break;
                case 'suabill':
                    if(isset($_GET['id']) && ($_GET['id']>0)){
                        $billxacdinh=loadone_bill($_GET['id']);
                    }                
                    include "bill/update.php";
                    break;
                case 'updatebill':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $bill_status = $_POST['bill_status'];
                        $id = $_POST['id']; 
                        update_bill($id,$bill_status);
                        $thongbao="Cập nhật thành công";
                    }
                    $listbill = loadall_bill("",0);
                    include "bill/listbill.php";
                    break;



            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }


    
    include "footer.php";

?>