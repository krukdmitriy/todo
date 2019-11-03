<div class="container">
<form class="form-signin" method="post" action="/login">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
    </div>
    <? if(isset($arg['error_massages'][0])): ?>
        <? foreach($arg['error_massages'] as $data): ?>
            <div class="alert alert-danger" role="alert">
                <?=$data?>
            </div>
        <? endforeach; ?>
    <? endif; ?>
    <div class="form-label-group">
        <label for="username">Имя пользователя</label>
        <input name="username" type="text" id="username" class="form-control"  autofocus="">
    </div>
    <br>
    <div class="form-label-group">
        <label for="inputPassword">Пароль</label>
        <input name="password" type="password" id="inputPassword" class="form-control" >
    </div>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Ввойти</button>
</form>
</div>