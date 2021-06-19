<?php
$firstName = '';
$lastName = '';
$birthDay = '';
$gender = '';
$role = \models\User::STUDENT;
$phone = '';
$email = '';
$gender = 'm';
$serieId = 0;
$groupId = 0;

if (!empty($type) && $type == 'edit') {
    $firstName = $userTmp->first_name;
    $lastName = $userTmp->last_name;
    $birthDay = $userTmp->birthday();
    $gender = $userTmp->gender;
    $role = $userTmp->role;
    $phone = $userTmp->phone;
    $email = $userTmp->email;
    $gender = $userTmp->gender;
    $serieId = $userTmp->serie_id;
    $groupId = $userTmp->group_id;
} else $type = 'create';
?>
<a class="btn btn-secondary mb-2" href="/admin-utilizatori">Inapoi la pagina de index</a>
<form class="form-group" method="post" action="/admin/user/<?= $type == 'create' ? 'store' : 'update/' . $userTmp->id ?>">
    <div>
        <label for="email" class="mt-3">Email</label>
        <input id="email" class="form-control" name="email" value="<?= $email ?>">
        <div>
            <?php if (!empty($_GET['email']) && $_GET['email'] ) {?>
            <div class="alert alert-danger mt-2 mb-0">Adresa de email este deja inregistrata in baza noastra de date!</div>
            <?php } ?>
        </div>
    </div>

    <label for="password" class="mt-3">Parola <?= $type == 'edit' ? '(optional)' : '' ?></label>
    <input id="password" class="form-control" type="password" autocomplete=off name="password" <?= $type == 'create' ? 'required' : '' ?> >

    <label for="first_name" class="mt-3">Prenume utilizator</label>
    <input id="first_name" class="form-control" name="first_name" value="<?= $firstName ?>" required>

    <label for="last_name" class="mt-3">Nume utilizator</label>
    <input id="last_name" class="form-control" name="last_name" value="<?= $lastName ?>" required>

    <label for="birthday" class="mt-3">Ziua de nastere</label>
    <input id="birthday" data-provide="datepicker" class="form-control" name="birthday" value="<?= $birthDay ?>">

    <label for="role" class="mt-3">Tip de utilizator</label>
    <select name="role" id="role" class="form-control" required>
        <?php foreach (\models\User::ROLES as $valueRole => $nameRole) { ?>
            <option <?= $valueRole == $role ? 'selected' : '' ?> value="<?= $valueRole ?>"><?= $nameRole ?></option>
        <?php } ?>
    </select>

    <label for="gender" class="mt-3">Gen</label>
    <select name="gender" id="gender" class="form-control">
        <?php foreach (\models\User::GENDERS as $valueGender => $nameGender) { ?>
            <option <?= $valueGender == $gender ? 'selected' : '' ?> value="<?= $valueGender ?>"><?= $nameGender ?></option>
        <?php } ?>
    </select>

    <label for="serie" class="mt-3">Serie</label>
    <select name="serie_id" id="serie" class="form-control">
        <option value=""></option>
        <?php foreach ($series as $serie) { ?>
            <option <?= $serie->id == $serieId ? 'selected' : '' ?> value="<?= $serie->id ?>"><?= $serie->name ?></option>
        <?php } ?>
    </select>

    <label for="serie" class="mt-3">Grupa</label>
    <select name="group_id" id="serie" class="form-control">
        <option value=""></option>
        <?php foreach ($groups as $group) { ?>
            <option <?= $group->id == $groupId ? 'selected' : '' ?> value="<?= $group->id ?>"><?= $group->name ?></option>
        <?php } ?>
    </select>

    <label for="phone" class="mt-3">Numar de telefon</label>
    <input id="phone" class="form-control" name="phone" value="<?= $phone ?>">

    <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>

    <button class="btn btn-success mt-4"><?= $type == 'create' ? 'Creaza' : 'Editeaza' ?></button>
</form>
