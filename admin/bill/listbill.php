<div class="row frmtitle mb">
                <h1>DANH SÁCH CÁC ĐƠN HÀNG</h1>
            </div>
            <form action="index.php?act=listbill" method="post" style="margin-bottom: 20px;">
                            <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
                            <input type="submit" name="listok" value="Go">
            </form>

            <div class="row frmcontent">

                    <div class="row mb10 frmdsloai">
                       
                       <table> 
                        <tr>
                            <th></th>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>KHÁCH HÀNG</th>
                            <th>SỐ LƯỢNG HÀNG</th>
                            <th>GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT HÀNG</th>
                            <th>THAO TÁC</th>
                        </tr>
                        <?php 
                            foreach ($listbill as $bill) {
                                extract($bill);
                                $kh = $bill["bill_name"].'
                                <br> '.$bill["bill_email"].'
                                <br> '.$bill["bill_address"].'
                                <br> '.$bill["bill_tel"];
                                $demsl = loadall_cart_count($bill['id']);
                                $ttdh = get_ttdh($bill['bill_status']);
                                $suabill = "index.php?act=suabill&id=".$id;
                                $xoabill = "index.php?act=xoabill&id=".$id;
                                echo '<tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>'.$bill['id'].'</td>
                                        <td>'.$kh.'</td>
                                        <td>'.$demsl.'</td>
                                        <td>'.$bill['total'].'</td>
                                        <td>'.$ttdh.'</td>
                                        <td>'.$bill['ngaydathang'].'</td>
                                        <td><a href="'.$suabill.'"><input type="button" value="Sửa"> <a href="'.$xoabill.'"><input type="button" value="Xóa"></td>
                                    </tr>';
                            }   
                        ?>                                           
                       </table>
                    </div>

                    <div class="row mb10">
                        
                    </div>

                    
                </form>
            </div>