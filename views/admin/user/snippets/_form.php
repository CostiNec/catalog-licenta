<?php
$firstName = '';
$lastName = '';
$birthDay = '';
$gender = '';
$group_name = '';
$role = \models\User::STUDENT;
$phone = '';
$email = '';
$gender = 'm';

if (!empty($type) && $type == 'edit') {
    $firstName = $userTmp->first_name;
    $lastName = $userTmp->last_name;
    $birthDay = $userTmp->birthday();
    $gender = $userTmp->gender;
    $group_name = $userTmp->group_name;
    $role = $userTmp->role;
    $phone = $userTmp->phone;
    $email = $userTmp->email;
    $gender = $userTmp->gender;
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

    <label for="group_name" class="mt-3">Grupa</label>
    <input id="group_name" class="form-control" name="group_name" value="<?= $group_name ?>">

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

    <label for="phone" class="mt-3">Numar de telefon</label>
    <input id="phone" class="form-control" name="phone" value="<?= $phone ?>">

    <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>

    <button class="btn btn-success mt-4"><?= $type == 'create' ? 'Creaza' : 'Editeaza' ?></button>
</form>
