<div class="container">
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
    <form class="form-signin" action="/" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Введите имя пользователя</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="<?= $arg['input']['name']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Введите Email</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" value="<?= $arg['input']['email']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Введите описание задачи</label>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $arg['input']['text']?></textarea>
        </div>
        <input class="form-control" type="submit" value="Добавить задачу">
    </form>
    <br>
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Сортировать
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/?sort=name+asc">По имени А...я</a>
            <a class="dropdown-item" href="/?sort=name+desc">По имени Я...а</a>
            <a class="dropdown-item" href="/?sort=email+asc">По Емаil A...z</a>
            <a class="dropdown-item" href="/?sort=email+desc">По Емаil Z...a</a>
            <a class="dropdown-item" href="/?sort=status+asc">По статус выполнен</a>
            <a class="dropdown-item" href="/?sort=status+desc">По статус в процессе</a>
        </div>
    </div>
    <br>
    <br>
    <? foreach($arg['tasks'] as $data): ?>
    <div class="card bg-light mb-3" >
        <div class="card-header">
            <?= $data['name']; ?> <?= htmlspecialchars($data['email']); ?>
            <? if(!$data['status']): ?>
                <p class="float-right">В процессе</p>
            <? else: ?>
                <p class="float-right">Выполнено</p>
            <? endif; ?>
            <? if($data['is_edited']): ?>
                <p >Редактировано администратором</p>
            <? endif; ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?= htmlspecialchars($data['text']); ?></p>
        </div>
    </div>
    <? endforeach; ?>
    <? if($arg['total_page'] > 1):?>
    <nav aria-label="Page navigation ">
        <ul class="pagination">
            <? for($i = 1; $i <= $arg['total_page']; $i++) {
                if(empty($arg['sort'])) {
                    if ($arg['page'] === $i) {
                        echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                else{
                    if ($arg['page'] === $i) {
                        echo '<li class="page-item active"><a class="page-link" href="?sort='.$arg['sort'].'&page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="?sort='.$arg['sort'].'&page=' . $i . '">' . $i . '</a></li>';
                    }
                }
            } ?>
        </ul>
    </nav>
    <? endif;?>
</div>

