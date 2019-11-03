<main role="main" class="container">
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
    <div class="row">
        <? foreach($arg as $data): ?>
        <div class="col-sm-6">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['name']; ?>
                        <? if(!$data['status']): ?>
                            <p class="float-right">В процессе</p>
                            <? else: ?>
                            <p class="float-right">Выполнено</p>
                        <? endif; ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> <?= htmlspecialchars($data['email']); ?></h6>
                    <p class="card-text"><?= htmlspecialchars($data['text']); ?></p>
                    <? if(!$data['status']): ?>
                        <a href="/admin/success/<?=$data['id']?>" class="btn btn-primary">Выполнено</a>
                    <?endif;?>
                    <a class="card-link float-right" href="/admin/edit/<?=$data['id']?>" >Редактировать</a>
                </div>
            </div>
            <br>
        </div>
        <? endforeach; ?>
</main>