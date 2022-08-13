<?php
require_once "models/get_tasks.php";

function getTasks($sort) {
    $current_page = $_GET['page'] ?? 1;
    $limit = 3;
    $showData = ($current_page-1) * $limit;
    return getTasksModel($sort, $showData,$limit);
}
function getTasksPagination() {
    return getTasksPaginationModel();
}

function insertTask($post) {
    return insertTaskModel($post);
}

function updateTask($post, $id) {
    return updateTaskModel($post, $id);
}

function getCurrentTask($id) {
    return getCurrentTaskModel($id);
}