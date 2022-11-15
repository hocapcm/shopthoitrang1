<section id="cart_items" style="margin-top: 50px;">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Mã đơn hàng</nav></td>
							<td class="description">Ngày đặt</td>
							<td class="quantity">Số lượng đặt hàng</td>
							<td class="total">Tổng giá trị đơn hàng</td>
							<td class="total">Tình trạng đơn hàng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php
                        if(is_array($listbill)){
                            foreach ($listbill as $bill) {
                                extract($bill);
                                $ttdh = get_ttdh($bill['bill_status']);
                                $demsl = loadall_cart_count($bill['id']);
                                echo '<tr>
                                <td class="cart_price">
                                    <p>'.$bill['id'].'</p>
                                </td>
                                <td class="cart_price" name="soluong">
                                    <p>'.$bill['ngaydathang'].'</p>
                                </td>
                                
                                <td class="cart_price">
                                    <p class="cart_total_price">'.$demsl.'</p>
                                </td>
                                <td class="cart_price">
                                    <p class="cart_total_price">$ '.$bill['total'].'</p>
                                </td>
                                <td class="cart_price">
                                    <p class="cart_total_price">'.$ttdh.'</p>
                                </td>
                                
                            </tr>  ';
                            }
                        }
                    ?>					
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->