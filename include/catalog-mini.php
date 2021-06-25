<section class="product-section clearfix mt-4">
		<div class="container">
				<!-- row -->
				<div class="row">
						<div class="col-lg-7 col-md-8 ml-auto mr-auto">
								<!-- section title -->
								<div class="section-title title-style-center_text style2">
										<div class="title-header">
												<h2 class="title">Популярные шины</h2>
										</div>
								</div><!-- section title end -->
						</div>
				</div><!-- row end -->
				<div class="row">
						<div class="col-lg-12">
												<!-- content-inner -->
												<div class="content-inner active">
														<div class="products row">
																<!-- product -->
															<?
															$goods = $Database->SelectGamesMini();
															for($j = 0; $j < Count($goods); $j++):?>


																<div class="shadow product col-md-3 col-sm-6 col-xs-12">
																	<div class="product-box">
																			<!-- product-box-inner -->
																			<div class="product-box-inner">
																					<div class="product-image-box">
																							<img class="img-fluid" src="<?=$goods[$j]['img']?>" alt="" style="height: 300px">
																					</div>
																			</div><!-- product-box-inner end -->
																			<div class="product-content-box">
																					<a class="product-title" href="/AvtoKolesa/product/?id=<?=$goods[$j]['id']?>">
																							<h2><?=$goods[$j]['name']?></h2>
																					</a>
																					<div class="star-ratings">
																							<ul class="rating">
																									<?for($k = 0; $k < $goods[$j]['stars']; $k++):?>
																									<li><i class="fa fa-star"></i></li>
																									<?endfor;?>
																									<?if($goods[$j]['stars'] < 5):
																										$currentStart = 5 - $goods[$j]['stars'];
																										for($k = 0; $k <= $currentStart; $k++):
																										?>
																									<li><i class="fa fa-star-o"></i></li>
																								<?endfor;?>
																								<?endif;?>
																							</ul>
																					</div>
																					<a href="/AvtoKolesa/product/?id=<?=$goods[$j]['id']?>" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor"><?=$goods[$j]['cost']?>руб.</a>

																			</div>
																	</div>
															</div>
															<?endfor;?>
														</div>
												</div>
										</div>
						</div>
				</div>
</section>
<!-- product-section end-->
