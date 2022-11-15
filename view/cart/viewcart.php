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
				<a href="index.php?act=bill"><input class="btn btn-fefault cart" type="button" value="Đặt hàng">
				<a href="index.php?act=delcart"><input class="btn btn-fefault cart" type="button" value="Xóa giỏ hàng"></a>
			</div>

		</div>
	</section> <!--/#cart_items-->