<?php
    $name = '';
    $description = '';

    if (empty($teacherSelected)) {
        $teacherSelected = [];
    }

    if (!empty($type) && $type == 'edit') {
        $name = $course->name;
        $description = $course->description;
    } else $type = 'create';
?>
<a class="btn btn-secondary mb-2" href="/admin-cursuri">Inapoi la pagina de index</a>
<form class="form-group" method="post" action="/grade/<?= $type == 'create' ? 'store' : 'update/' . $course->id ?>">
    <label for="name">Nume curs</label>
    <input id="name" class="form-control" name="name" value="<?= $name ?>" required>
    <label for="description" class="mt-3">Descriere curs</label>
    <input id="description" class="form-control" name="description" value="<?= $description ?>">

    <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>

    <div class="d-flex flex-column">
        <label for="usersIds" class="mt-3">Profesori asociati cursului</label>
        <select class="js-example-basic-multiple form-control" id="usersIds" name="usersIds[]" multiple="multiple">
            <?php foreach ($usersFormatted as $value => $userFormatted) { ?>
                <option <?= in_array($value,$teacherSelected) ? 'selected' : '' ?> value="<?=$value?>"><?=$userFormatted?></option>
            <?php } ?>
        </select>
    </div>


    <button class="btn btn-success mt-2"><?= $type == 'create' ? 'Creaza' : 'Editeaza' ?></button>
</form>
