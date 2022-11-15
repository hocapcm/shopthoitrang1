<?php 
    
    if(is_array($sanpham1)){
        extract($sanpham1);
    }
    $img = $img_path.$img;   
    
?>
<section>
		<div class="container">
			<div class="row" style="margin-top: 10px;">			
            
					<div class="product-details"><!--product-details-->
                     <?php
                        
                     ?>

                        <div class="img-detail col-sm-5">                
                        
                        <div class="view-product">
								<img src="<?=$img?>" alt="" />
								
						</div>
                                    
                        </div>
                        <div class="col-sm-7">
							<div class="product-information"><!--/product-information-->							
								<form action="index.php?act=addtocart" method="post">	
								<h2 style="font-size: 280%;"><?=$name?></h2>								
								<span>
									<span>$<?=number_format($price, 2)?></span>
								</span>									
								<p><b>Số lượng:</b> <input type="text" value="1" name="soluong" />
									</p>
                                    
								
									<input type="hidden" name="id" value="<?=$id?>">
									<input type="hidden" name="name" value="<?=$name?>">
									<input type="hidden" name="img" value="<?=$img?>">
									<input type="hidden" name="price" value="<?=$price?>">
									<input class="btn btn-fefault cart" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
								</form>	
							</div><!--/product-information-->
						</div>	
					
                    </div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
                                <div class="col-sm-12">
                                    <p><?=$des?></p>
                                </div>
							</div>
						
							
						
							
						</div>
					</div><!--/category-tab-->

					<div class="recommended_items"><!--sp cùng loại-->
						<h2 class="title text-center">Sản phẩm cùng loại</h2>				
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
									if(!empty($dssanphamcungloai))
									foreach ($dssanphamcungloai as $key  => $value){
										if($key % 3 == 0){
											?> 
											<div class="item <?php echo $key == 0 ? 'active' : '' ?>">	
											<?php
										}
										$imgcungloai = $img_path.$value['img'];
										$linkspcungloai = "index.php?act=sanphamct&idsp=".$value['id'];
										?>

									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?=$imgcungloai?>" alt="" style="width:357.48; height:357.48px;"/>
													<h2>$<?=number_format(($value['price']),2)?></h2>
													<p><?=$value['name']?></p>
													<a href="<?=$linkspcungloai?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Xem ngay</a>
												</div>
											</div>
										</div>
									</div>
									<?php
									if($key % 3 == 2){
										?> 									
									</div>
									<?php
								}
								?>
								<?php
							}
						?>			
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/sp cùng loại-->
					
            </div>		
		
					
				
			</div>
		</div>
	</section> 