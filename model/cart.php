<?php
			function viewcart(){
				global $img_path;
				$tong = 0;
				$i=0;
				foreach ($_SESSION['mycart'] as $cart) {
					$tong+=$cart[5];
					
					$xoasp = 'index.php?act=delcart&idcart='.$i;
					echo '
					<tr>
						<td class="cart_product">
							<a href=""><img src="'.$cart[2].'" alt="" style="width:357.48; height:357.48px;"></a>
						</td>
						<td class="cart_description">
							<h4><a href="">'.$cart[1].'</a></h4>
						</td>
						<td class="cart_price">
							<p>$ '.$cart[3].'</p>
						</td>
						<td class="cart_price" name="soluong">
							<p>'.$cart[4].'</p>
						</td>
						
						<td class="cart_total">
							<p class="cart_total_price">$ '.number_format($cart[5],2).'</p>
						</td>
						<td class="cart_delete"><a class="cart_quantity_delete" href="'.$xoasp.'"><i class="fa fa-times"></i></a>
						</td>
					</tr>      
								
					';
					$i+=1; 
				}
						
					echo '<tr> 
						<td colspan = "4" style="font-size: 180%;" >Tổng giá trị đơn hàng </td>
						<td style="font-size: 180%;">$'.number_format($tong,2).'</td> 
						<td></td> 
					
					</tr>';
                    
				}



				function tongdonhang(){
					$tong = 0;
					foreach ($_SESSION['mycart'] as $cart) {
						$tong+=$cart[5];					
					}
						return $tong;	
					}
	

				function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
					$sql = "INSERT INTO tbl_bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) VALUES('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
					return pdo_execute_return_lastInsertId($sql);
				}

				function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
					$sql = "INSERT INTO tbl_cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) VALUES('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
					return pdo_execute($sql);
				}

				function loadone_bill($id){
					$sql = "SELECT * FROM tbl_bill WHERE id=".$id;
					$bill = pdo_query_one($sql);
					return $bill;
				}

				function loadall_cart($idbill){
					$sql = "SELECT * FROM tbl_cart WHERE idbill=".$idbill;
					$bill = pdo_query($sql);
					return $bill;
				}

				function loadall_cart_count($idbill){
					$sql = "SELECT * FROM tbl_cart WHERE idbill=".$idbill;
					$bill = pdo_query($sql);
					return sizeof($bill);
				}


				function bill_chi_tiet($listbill){
					global $img_path;
					$tong = 0;
					$i=0;
					foreach ($listbill as $cart) {
						$tong+=$cart['thanhtien'];
						echo '
						<tr>
							<td class="cart_product">
								<a href=""><img src="'.$cart['img'].'" alt="" style="width:357.48; height:357.48px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">'.$cart['name'].'</a></h4>
							</td>
							<td class="cart_price">
								<p>$ '.$cart['price'].'</p>
							</td>
							<td class="cart_price" name="soluong">
								<p>'.$cart['soluong'].'</p>
							</td>
							
							<td class="cart_total">
								<p class="cart_total_price">$ '.number_format($cart['thanhtien'],2).'</p>
							</td>
							<td class="cart_delete"><a class="cart_quantity_delete" href="#"><i class="fa fa-times"></i></a>
							</td>
						</tr>      
									
						';
						$i+=1; 
					}
							
						echo '<tr> 
							<td colspan = "4" style="font-size: 180%;" >Tổng giá trị đơn hàng </td>
							<td style="font-size: 180%;">$'.number_format($tong,2).'</td> 
							<td></td> 
						
						</tr>';
						
					}


					function loadall_bill($kyw="",$iduser){

						$sql = "SELECT * FROM tbl_bill WHERE 1";
						if($iduser>0) $sql .=" AND iduser=".$iduser;
						if($kyw!="") $sql .=" AND id like '%".$kyw."%'";
						$sql .=" ORDER BY id DESC";
						$listbill = pdo_query($sql);
						return $listbill;
					}

					function delete_bill($id){
						$sql = "DELETE FROM tbl_bill WHERE id=".$id;
						pdo_execute($sql);
					}

					function update_bill($id, $bill_status){
						$sql = "UPDATE tbl_bill SET bill_status='".$bill_status."' WHERE id=".$id;
						pdo_execute($sql);
					}

					function get_ttdh($i){
						switch ($i) {
							case '0':
								$trangthai = "Đang chờ";
								break;
							case '1':
								$trangthai = "Đang giao hàng";
								break;
							case '2':
								$trangthai = "Đã giao hàng";
								break;
							
							default:
								$trangthai = "Đang chờ";
								break;
						}
						return $trangthai;
					}

					function get_pttt($i){
						switch ($i) {
							case '0':
								$trangthai = "Trả tiền khi nhận hàng";
								break;
							case '1':
								$trangthai = "Thanh toán online";
								break;
				
							default:
								$trangthai = "Trả tiền khi nhận hàng";
								break;
						}
						return $trangthai;
					}

?>