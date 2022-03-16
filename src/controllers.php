<?php

function list_action()
{
    $courses = get_all_courses();

    require_once '../templates/list.php';
}

function show_action(int $id)
{
    $course = get_course_by_id($id);

    require_once '../templates/show.php';
}