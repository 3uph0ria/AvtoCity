<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/class/Database.php';
$Database = new Database();
$good = $Database->SelectGood($_GET['id']);

include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/header.php'; ?>

<? include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/nav-top.php'; ?>
    <!--site-main start-->
    <div class="site-main">

        <!-- single-product-section -->
        <section class="single-product-section layout-1 clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ttm-single-product-details">
                            <div class="ttm-single-product-info clearfix">
                                <div class="row">
																	<div class="col-lg-4 col-md-4 col-sm-12 ml-auto mr-auto">
                                        <div class="product-gallery easyzoom-product-gallery">
                                            <div class="product-look-preview-plus right">
                                                <div class="pl-35 res-767-pl-15">
                                                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails is-ready">
                                                        <a href="images/product/pro-01-plus.png">
                                                            <img class="img-fluid" src="<?=$good['img']?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="summary entry-summary pl-30 res-991-pl-0 res-991-pt-40">
                                            <h2 class="product_title entry-title"><?=$good['name']?></h2>
																						<h2 class="product_title entry-title" id="cost"><?=$good['cost'] * 4?>руб.</h2>
																							<form action="/AvtoKolesa/action/action_pay.php" method="post">
																								<input onmouseup="AddCost()" id="quantity"  type="number" placeholder="Кол-во едениц товара" value="4" min="1" max="<?=$good['amount']?>" step="1" />
                                             <input class="mt-4" type="email" name="email" placeholder="Введите Ваш Email.." required="">
																						 <input  class="mt-4" type="text" name="phone" placeholder="Введите Ваш телефон.." required="">
																						 <input  class="mt-4" type="text" name="address" placeholder="Введите Ваш адрес.." required="">
																							<input  class="mt-4" type="text" name="FullName" placeholder="Введите Ваше ФИО.." required="">
                                            <button  type="submit" class=" mt-4 ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor">Заказать</button>
																						</form>
                                        </div>

                                    </div>
                                </div>
                            </div>
													<div class="product-details__short-description text"><?=$good['description']?></div>

                        </div>
                        <? include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/catalog-mini.php'; ?>
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!-- single-product-section end -->

			<script>
function AddCost() {

    // Объявить переменные
    var cost, quantity, products, countProducts, productName, productName2, ul, li, a, i;
    //input = document.querySelector(".mySearch").textContent;
    quantity = document.getElementById ('quantity').value;
    cost = <?=$good['cost']?> * quantity;
    document.getElementById ('cost').textContent = cost + 'руб.';
}
</script>


    </div><!--site-main end-->
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/footer.php'; ?>
