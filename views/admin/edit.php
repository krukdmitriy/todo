<main role="main" class="container">
    <h2>Редактирование задачи</h2>
    <a class="btn btn-primary" href="/admin">Вернутся к задачам</a>
    <br>
    <br>
    <? if(isset($arg['success_massages'])): ?>
        <div class="alert alert-success" role="alert">
            <?=$arg['success_massages']?>
        </div>
    <? endif; ?>
    <? if(isset($arg['error_massages'][0])): ?>
        <? foreach($arg['error_massages'] as $data): ?>
            <div class="alert alert-danger" role="alert">
                <?=$data?>
            </div>
        <? endforeach; ?>
    <? endif; ?>
    <form action="/admin/edit/<?= $arg['page']; ?>" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Введите имя пользователя</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="<?= $arg['input']['name']; ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Введите Email</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" value="<?= $arg['input']['email']; ?>">
        </div>
        <div class="form-group">
            <label for="formControlTextarea">Введите описание задачи</label>
            <textarea name="text" class="form-control" id="formControlTextarea" rows="3" ><?= $arg['input']['text']; ?></textarea>
        </div>
        <input class="form-control" type="submit" value="Сохранить задачу">
    </form>
</main>