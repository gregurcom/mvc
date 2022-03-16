<?php $title = $course['title'] ?>

<?php ob_start() ?>
<h1><?= $course['title'] ?></h1>
<p><?= $course['description'] ?></p>
<?php $content = ob_get_clean() ?>

<?php require_once 'layout/layout.php' ?>
