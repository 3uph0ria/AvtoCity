<?php
$title = "Админ панель";
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/admin_header.php';
?>
  <!-- Navigation -->
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/admin_navbar.php' ?>

<div class="col">
    <h3 class="text-center font-weight-bold py-4">Каталог товаров</h3>
    <div class="shadow">
        <div class="row p-4">
            <?if($_SESSION['alert']):?>
							<div class="alert alert-success alert-dismissible fade show w-100" role="alert">
										<?=
                    $_SESSION['alert'];
                    unset($_SESSION['alert']);
                    ?>
								</div>
            <?endif;?>
					<a href="#gameAdd" class="btn btn-outline-success my-2" data-toggle="modal">Добавить товар</a>
								<table class="table table-striped">
										<thead>
												<tr>
														<th scope="col">#</th>
														<th scope="col">Название</th>
														<th scope="col">Цена</th>
														<th scope="col">Кол-во</th>
														<th scope="col">Изменить</th>
														<th scope="col">Удалить</th>
												</tr>
										</thead>
										<tbody>
												<?
                        $games = $Database->GetProducts();
                        for($i = 0; $i < count($games); $i++):
                            ?>
													<tr>
																<th scope="row">
																		<?=$i + 1?>
																</th>
																<td class="d-flex">
																		<?=htmlspecialchars($games[$i]['name'])?>
																</td>
																<td>
																		<?=htmlspecialchars($games[$i]['cost'])?>руб</td>
																<td>
																		<?=htmlspecialchars($games[$i]['amount'])?>шт</td>
																<td><a href="#gameUpdate<?=$i?>" class="btn btn-primary" data-toggle="modal">Изменить</a></td>
																<td><a href="#gameDelete<?=$i?>" class="btn btn-danger" data-toggle="modal">Удалить</a></td>
														</tr>
                        <?endfor;?>
										</tbody>
								</table>
								<div class="modal fade" id="gameAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
														<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel<?=$i?>">Добавление нового товара</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
														</div>
														<div class="modal-body">
																<form action="action_add_product.php" method="post">
																		<div class="md-form mt-4">
																				<label for="name">Наименование товара</label>
																				<input type="text" id="name" class="form-control" name="name" maxlength="500">
																		</div>
																		<div class="md-form mt-4">
																				<label for="cost">Стоимость</label>
																				<input type="number" min="1" id="cost" class="form-control" name="cost" maxlength="11">
																		</div>
																		<div class="md-form mt-4">
																				<label for="amount">Кол-во</label>
																				<input type="number" min="1" id="amount" class="form-control" name="amount" maxlength="11">
																		</div>
																		<div class="md-form mt-4">
																				<label for="img">Изображение</label>
																				<input type="text" id="img" class="form-control" name="img" maxlength="500">
																		</div>
																		<div class="md-form mt-4">
																				<label for="stars">Кол-во звезд</label>
																				<input type="number" min="1" id="stars" class="form-control" name="stars" maxlength="50">
																		</div>
																		<div class="md-form mt-4">
																				<label for="category ">Категория</label>
																				<input type="number" min="1" id="category" class="form-control" name="category" maxlength="50">
																		</div>
																	<div class="md-form mt-4">
																				<label for="description">Описание</label>
																				<textarea name="description" id="description" cols="30" rows="10" class="form-control w-100" maxlength="5000"></textarea>
																		</div>
																	<div class="text-center mt-4 d-flex justify-content-center">
																		<button type="submit" class="btn btn-primary btn-block btn-rounded z-depth-1a" style="width: 40%;height: 50px;border-radius: 34px">Добавить</button>
																	</div>
																</form>
														</div>
														<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
														</div>
												</div>
										</div>
								</div>
            <? for($i = 0; $i < count($games); $i++):?>
							<div class="modal fade" id="gameUpdate<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$i?>" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
														<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel<?=$i?>"><?echo 'Редактирование '. htmlspecialchars($games[$i]['name'])?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
														</div>
														<div class="modal-body">
																<form action="action_upd_product.php" method="post">
																		<div class="md-form mt-5" style="display: none">
																				<label for="Form-id" class="disabled">ID игры (disabled)</label>
																				<input type="text" id="Form-id" class="form-control disabled" name="id" value="<?=htmlspecialchars($games[$i]['id'])?>">
																		</div>
																		<div class="md-form mt-4">
																				<label for="name">Наименование товара</label>
																				<input type="text" id="name" class="form-control" name="name" maxlength="500" value="<?=htmlspecialchars($games[$i]['name'])?>">
																		</div>
																		<div class="md-form mt-4">
																				<label for="cost">Стоимость</label>
																				<input type="number" min="1" id="cost" class="form-control" name="cost" maxlength="11" value="<?=htmlspecialchars($games[$i]['cost'])?>">
																		</div>
																		<div class="md-form mt-4">
																				<label for="amount">Кол-во</label>
																				<input type="number" min="1" id="amount" class="form-control" name="amount" maxlength="11" value="<?=htmlspecialchars($games[$i]['amount'])?>">
																		</div>
																		<div class="md-form mt-4">
																				<label for="img">Изображение</label>
																				<input type="text" id="img" class="form-control" name="img" maxlength="500" value="<?=htmlspecialchars($games[$i]['img'])?>">
																		</div>
																		<div class="md-form mt-4">
																				<label for="activation">Кол-во звезд</label>
																				<input type="number" min="1" id="activation" class="form-control" name="activation" maxlength="50" value="<?=htmlspecialchars($games[$i]['stars'])?>">
																		</div>
																		<div class="md-form mt-4">
																				<label for="category">Категория</label>
																				<input type="number" min="1" id="category" class="form-control" name="category" maxlength="50" value="<?=htmlspecialchars($games[$i]['category'])?>">
																		</div>
																		<div class="md-form mt-4">
																				<label for="description">Описание</label>
																				<textarea name="description" id="description" cols="30" rows="10" class="form-control w-100" maxlength="5000"><?=htmlspecialchars($games[$i]['description'])?></textarea>
																		</div>
																		<div class="text-center mt-4 d-flex justify-content-center">
																					<button type="submit" class="btn btn-primary btn-block btn-rounded z-depth-1a" style="width: 40%;height: 50px;border-radius: 34px">Сохранить</button>
																		</div>
																</form>
														</div>
														<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
														</div>
												</div>
										</div>
								</div>
            <?endfor;?>
            <? for($i = 0; $i < count($games); $i++):?>
							<div class="modal fade" id="gameDelete<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$i?>" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
														<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel<?=$i?>"><?echo 'Удаление '. htmlspecialchars($games[$i]['name'])?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
														</div>
														<div class="modal-body">
																<h4 class="text-center ">Вы действительно хотите удалить <?=htmlspecialchars($games[$i]['name'])?>?</h4>
																<form action="action_del_product.php" method="post">
																		<div class="md-form mt-5" style="display: none">
																				<label for="Form-id" class="disabled">ID игры (disabled)</label>
																				<input type="text" id="Form-id" class="form-control disabled" name="id" value="<?=htmlspecialchars($games[$i]['id'])?>"> </div>
																		<div class="text-center mt-4 d-flex justify-content-center">
																					<button type="submit" class="btn btn-danger btn-block btn-rounded z-depth-1a" style="width: 40%;height: 50px;border-radius: 34px">Удалить</button>
																		</div>
																</form>
														</div>
														<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
														</div>
												</div>
										</div>
								</div>
            <?endfor;?>
        </div>
    </div>
</div>


  <!-- Footer -->
<?require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/admin_footer.php'?>
