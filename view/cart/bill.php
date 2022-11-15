<form action="index.php?act=billconfirm" method="post">
        <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-4"></div>
                    
                    <div class="col-sm-4">
                        <div class="shopper-info">
                            <p style="font-size:270%; margin-top:20px;">Thông tin người đặt hàng</p>
                            <?php
                                if(isset($_SESSION['user'])){
                                    $name = $_SESSION['user']['user'];
                                    $email = $_SESSION['user']['email'];
                                    $address = $_SESSION['user']['address'];
                                    $tel = $_SESSION['user']['tel'];
                                }
                                else{
                                    $name = "";
                                    $email = "";
                                    $address = "";
                                    $tel = "";
                                }
                            ?>
                                <p><b>Tên người đặt: </b><input type="text" name="name" value="<?=$name?>"></br></p>
                                <p><b>Email: </b><input type="text" name="email" value="<?=$email?>"></br></p>
                                <p><b>Địa chỉ: </b><input type="text" name="address" value="<?=$address?>"></br></p>
                                <p><b>Số điện thoại: </b><input type="text" name="tel" value="<?=$tel?>"></br></p>
                            <p style="font-size:270%; margin-top:50px;">Phương thức thanh toán</p>    
                           <table style="font-size:140%;">
                            <tr>
                                <td><input type="radio" name="pttt" value="0" checked>Trả tiền khi nhận hàng</td>
                                <td><input type="radio" name="pttt" value="1">Thanh toán online</td>  
                            </tr>
                           </table>    
                            
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
                    viewcart();
                    ?>
						
					
					</tbody>
				</table>
			</div>

			<div class="row bill pull-right">
				<input class="btn btn-fefault cart" type="submit" value="Đồng ý đặt hàng" name="dongydathang">
			</div>

		</div>
       
	</section> <!--/#cart_items-->
</form>