<form action="index.php?act=billconfirm" method="post">
        <div class="shopper-informations">
            <?php
                if(isset($bill) && (is_array($bill))){
                    extract($bill);
                }
            ?>


            <div class="row">
                    <div class="col-sm-4"></div>
                    
                    <div class="col-sm-4">
                        <div class="shopper-info">
                            <p style="font-size:270%; margin-top:20px;">Cảm ơn quý khách đã đặt hàng!</p>
                            <p style="font-size:270%; margin-top:30px;">Thông tin đơn hàng</p>
                           
                                <p><b>Mã đơn hàng: </b><input type="text" name="name" value="<?=$bill['id']?>"></br></p>
                                <p><b>Ngày đặt hàng: </b><input type="text" name="email" value="<?=$bill['ngaydathang']?>"></br></p>
                                <p><b>Tổng giá đơn hàng: </b><input type="text" name="address" value="$<?=number_format($bill['total'],2)?>"></br></p>
                                <p><b>Phương thức thanh toán: </b><input type="text" name="tel" value="<?=get_pttt($bill['bill_pttt'])?>"></br></p>  
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                    
                </div>












                <div class="row">
                    <div class="col-sm-4"></div>
                    
                    <div class="col-sm-4">
                        <div class="shopper-info">
                            <p style="font-size:270%; margin-top:20px;">Thông tin người đặt hàng</p>
                            <?php
                                // if(isset($_SESSION['user'])){
                                //     $name = $_SESSION['user']['user'];
                                //     $email = $_SESSION['user']['email'];
                                //     $address = $_SESSION['user']['address'];
                                //     $tel = $_SESSION['user']['tel'];
                                // }
                                // else{
                                //     $name = "";
                                //     $email = "";
                                //     $address = "";
                                //     $tel = "";
                                // }
                            ?>
                                <p><b>Tên người đặt: </b><input type="text" name="name" value="<?=$bill['bill_name']?>"></br></p>
                                <p><b>Email: </b><input type="text" name="email" value="<?=$bill['bill_email']?>"></br></p>
                                <p><b>Địa chỉ: </b><input type="text" name="address" value="<?=$bill['bill_address']?>"></br></p>
                                <p><b>Số điện thoại: </b><input type="text" name="tel" value="<?=$bill['bill_tel']?>"></br></p>
   
                           
                            
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                    
                </div>
									
        </div>
            <div class="review-payment" >
				<h2 style="text-align: center; font-size:270%;">Thông tin giỏ hàng</h2>
			</div>

    <section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh sản phẩm</td>
							<td class="description">Tên sản phẩm</nav></td>
							<td class="price">Đơn giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

                    <?php
                        bill_chi_tiet($billct);
                    ?>
						
					
					</tbody>
				</table>
			</div>

		</div>
       
	</section> <!--/#cart_items-->
</form>