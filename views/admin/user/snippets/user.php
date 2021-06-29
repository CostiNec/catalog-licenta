<div class="card mt-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $userTmp->fullName() ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $userTmp->userRoleName() ?> <i class="<?= $userTmp->icon() ?>"></i></h6>
        <div class="ml-auto width-fit-content">
            <a href="/admin-utilizatori/editeaza/<?= $userTmp->id ?>" class="card-link"><i class="fas fa-user-edit"></i></a>
            <a data-toggle="modal" href="#" data-target="#deleteuser<?=$userTmp->id?>" class="card-link"><i class="fas fa-user-minus color-red"></i></a>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteuser<?=$userTmp->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Esti sigur ca vrei sa stergi acest utilizator?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="/admin/user/delete/<?=$userTmp->id?>">
                <input name="csrf_token" value="<?=$_SESSION['csrf_token']?>" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
                    <button type="submit" class="btn btn-danger">Sunt sigur</button>
                </div>
            </form>
        </div>
    </div>
</div>
