<?php
$title = "Вход";
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/header.php';
?>
<h3 class="text-center font-weight-bold my-5">Войдите в аккаунт</h3>
  <div class="container">
    <form class="justify-content-center d-flex" action="action_signin.php" method="post">
      <div class="form-group py-2 col-lg-6 shadow">
        <div class="mt-4">
          <label for="login">Логин</label>
          <input name="login" type="text" class="form-control" id="login" required autofocus />
        </div>
        <div class="mt-4">
          <label for="password">Пароль</label>
          <input name="password" type="password" class="form-control" id="password" required autofocus />
        </div>
        <div class="row d-flex justify-content-center py-4">
          <button class="btn btn-primary" type="submit">
            Войти
          </button>
        </div>
      </div>
    </form>
  </div>

</body>
