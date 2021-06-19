<?php
$name = '';
$value = 1;
$feedback = '';


if (!empty($type) && $type == 'edit') {
    $name = $grade->name;
    $feedback = $grade->feedback;
    $value = $grade->value;

} else $type = 'create';
?>
<a class="btn btn-secondary mb-2" href="/note/<?= $course->id ?>/<?= $student->id ?>">Inapoi la pagina de index</a>
<form class="form-group" method="post"
      action="/grade/<?= $type == 'create' ? 'store/' . $course->id . '/' . $student->id : 'update/' . $grade->id ?>">
    <label for="name">Denumire activitate</label>
    <input id="name" class="form-control" name="name" value="<?= $name ?>" required>

    <label for="feedback" class="mt-3">Feedback</label>
    <textarea id="feedback" rows="6" class="form-control" name="feedback"><?= $feedback ?></textarea>

    <label for="value" class="mt-3">Nota (maxim 2 zecimale)</label>
    <input id="value" class="form-control" name="value" value="<?= $value ?>" required>

    <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>


    <button class="btn btn-success mt-4"><?= $type == 'create' ? 'Creaza' : 'Editeaza' ?></button>
</form>
