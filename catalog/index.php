<?

include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/class/Database.php';
$Database = new Database();

include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/header.php'; ?>

<? include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/nav-top.php'; ?>

<section class="product-section clearfix">
		<div class="container">
				<!-- row -->
				<div class="row">
						<div class="col-lg-7 col-md-8 ml-auto mr-auto">
								<!-- section title -->
								<div class="section-title title-style-center_text style2">
										<div class="title-header">
												<h2 class="title">Каталог товаров</h2>
												<input class="mt-4" type="text" id="mySearch" onkeyup="myFunction()" placeholder="Поиск.." title="Type in a category">
										</div>
								</div><!-- section title end -->
						</div>
				</div><!-- row end -->
				<div class="row">
						<div class="col-lg-12">
								 <div class="ttm-tabs tabs-for-products d-flex" data-effect="fadeIn">
										<ul class="tabs clearfix col-lg-2 col-md-12 col-sm-12 col-xs-12 m-0">
											<?
                      $categories = $Database->SelectCategoriesMini();
                      for($i = 0; $i < Count($categories); $i++):?>
												<li class="tab w-100 m-0 <?if($i == 0):?>active<?endif;?>"><a href="#"><?=$categories[$i]['name']?></a></li>
                      <?endfor;?>
										</ul>
										<div class="content-tab col-lg-10 col-md-12 col-sm-12 col-xs-12 m-0">
												<!-- content-inner -->
											<?
											$countProducts = 0;
											?>
                        <?for($i = 0; $i < Count($categories); $i++):?>
													<div class="content-inner <?if($i == 0):?>active<?endif;?>">
														<div class="products row">
																<!-- product -->
                                <?
                                $goods = $Database->SelectFullCatalog($categories[$i]['id']);

                                for($j = 0; $j < Count($goods); $j++):?>


																	<div id="product<?=$countProducts?>" class="shadow product col-md-6 col-sm-6 col-xs-12">
																	<div class="product-box">
																			<!-- product-box-inner -->
																			<div class="product-box-inner">
																					<div class="product-image-box">
																							<img class="img-fluid" src="<?=$goods[$j]['img']?>" alt="" style="height: 300px">
																					</div>
																			</div><!-- product-box-inner end -->
																			<div class="product-content-box">
																					<a class="product-title" href="/AvtoKolesa/product/?id=<?=$goods[$j]['id']?>">
																							<h2 class="productName<?=$countProducts?>"><?=$goods[$j]['name']?></h2>
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
																<?$countProducts++?>
                                <?endfor;?>
														</div>
												</div>
                        <?endfor;?>
										</div>
						</div>
				</div>
		</div>
</section>

<script>
function myFunction() {
    // Объявить переменные
    var input, filter, products, countProducts, productName, productName2, ul, li, a, i;
    //input = document.querySelector(".mySearch").textContent;
    input = document.getElementById('mySearch').value;

    countProducts = <?=$countProducts?>;


    // Перебирайте все элементы списка и скрывайте те, которые не соответствуют поисковому запросу
    for (i = 0; i < countProducts; i++) {
        productName = document.querySelector(".productName" + i).textContent;
        //productName = document.getElementById("productName0");
        //productName2 = productName.value;

        if (productName.toUpperCase().indexOf(input.toUpperCase()) !== -1) {
            document.getElementById('product' + i).style.display = "";
        } else {
            document.getElementById('product' + i).style.display = "none";
        }
    }
}
</script>

<? include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/footer.php'; ?>
