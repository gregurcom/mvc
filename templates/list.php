<?php $title = 'Course list' ?>

<?php ob_start() ?>
<h1>List of Posts</h1>
<ul>
    <?php foreach($courses as $course): ?>
        <li>
            <a href="index.php/show?id=<?= $course['id'] ?>">
                <?= $course['title'] ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>
<?php $content = ob_get_clean() ?>

<?php require_once 'layout/layout.php' ?>
