<?php 
    if(is_array($billxacdinh)){
        extract($billxacdinh);
    }  
    $demsl = loadall_cart_count($billxacdinh['id']); 
?>


<div class="row">
            <div class="row frmtitle">
                <h1>CẬP NHẬT ĐƠN HÀNG</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=updatebill" method="post">
                    <div class="row mb10">
                        Mã đơn hàng<br>
                        <input type="text" name="maloai" value="Auto increase" disabled>
                    </div>

                    <div class="row mb10">
                        Khách hàng<br>    
                        <input type="text" name="bill_name" value="<?php if(isset($bill_name) && ($bill_name != "")) echo $bill_name;?>" disabled>
                    </div>
                    <div class="row mb10">
                        Số lượng hàng<br>    
                        <input type="text" name="demsl" value="<?php if(isset($demsl) && ($demsl != "")) echo $demsl;?>" disabled>
                    </div>
                    <div class="row mb10">
                        Giá trị đơn hàng<br>    
                        <input type="text" name="total" value="<?php if(isset($total) && ($total != "")) echo $total;?>" disabled>
                    </div>
                    <div class="row mb10">
                        Tình trạng đơn hàng<br>    
                        <input type="text" name="bill_status" value="<?php if(isset($bill_status) && ($bill_status != "")) echo $bill_status;?>">
                    </div>
                    <div class="row mb10">
                        Ngày đặt hàng<br>    
                        <input type="text" name="ngaydathang" value="<?php if(isset($ngaydathang) && ($ngaydathang != "")) echo $ngaydathang;?>" disabled>
                    </div>

                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php if(isset($id) && ($id>0)) echo $id;?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listbill"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                        if(isset($thongbao) && ($thongbao !="")){
                            echo  $thongbao;
                        }
                    ?>
                    
                </form>
            </div>
        </div>
    </div>