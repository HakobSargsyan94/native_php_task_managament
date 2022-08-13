<?php
require_once 'functions/pdo_functions.php';
$current_page = $_GET['page'] ?? 1;
function getTasksModel ($sort, $page = 0, $limit = 3) {
    if (!empty($sort)) {
        $key = array_keys($sort)[0];
        $orderType = $sort[$key];
        return pdo_return_fetch_assoc_all("SELECT * FROM `tasks` ORDER BY `$key` $orderType LIMIT $limit OFFSET $page");
    }else {
        return pdo_return_fetch_assoc_all("SELECT * FROM `tasks` LIMIT $limit OFFSET $page");
    }
}

function getTasksPaginationModel ($page = 0, $limit = 3) {
    return pdo_return_fetch_column("SELECT COUNT(`id`) as `count` FROM `tasks`")['count'];
}

function insertTaskModel($post) {
    return pdo_return_insert("INSERT INTO `tasks`( `username`, `email`, `description`)
                                    VALUES ('".$post['username']."', '".$post['email']."', '".$post['description']."' )");
    header("Location : index.php");
}

function updateTaskModel($post, $id) {
    return pdo_return_update("UPDATE `tasks` SET `description`='".$post['description']."',
                                        `status`='".$post['status']."',`isChanged`=1 WHERE `id` = " . $id);
}

function getCurrentTaskModel($id) {
    return pdo_return_fetch_column("SELECT `status`, `description` FROM `tasks` WHERE `id` = " . $id);
}