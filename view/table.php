<?php
require_once "controllers/tasksController.php";
$sort = "";
$sortData = [];
if (isset($_GET['sortUser'])) {
    $sort = "&sortUser=" . $_GET['sortUser'];
    $sortData['username'] = $_GET['sortUser'];
}
if (isset($_GET['sortEmail'])) {
    $sort = "&sortEmail=" . $_GET['sortEmail'];
    $sortData['email'] = $_GET['sortEmail'];
}
if (isset($_GET['sortStatus'])) {
    $sort = "&sortStatus=" . $_GET['sortStatus'];
    $sortData['status'] = $_GET['sortStatus'];
}
$tasks = getTasks($sortData);
$taskscount = getTasksPagination();
$paginationCount = ceil(($taskscount / 3));
$isAdmin = $_SESSION['isAdmin'];
$statuses = [0 => 'To do', 1 => 'In progress', 2 => 'Done'];
$sort = "";
if (isset($_GET['sortUser'])) {
    $sort = "&sortUser=" . $_GET['sortUser'];
}
if (isset($_GET['sortEmail'])) {
    $sort = "&sortEmail=" . $_GET['sortEmail'];
}
if (isset($_GET['sortStatus'])) {
    $sort = "&sortStatus=" . $_GET['sortStatus'];
}
?>

<table  class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th><a href="?page=<?=$current_page?>&sortUser=<?= isset($_GET['sortUser']) && !empty($_GET['sortUser']) && $_GET['sortUser'] == 'desc' ? 'asc' : 'desc' ?>">User name</a></th>
            <th><a href="?page=<?=$current_page?>&sortEmail=<?= isset($_GET['sortEmail']) && !empty($_GET['sortEmail']) && $_GET['sortEmail'] == 'desc' ? 'asc' : 'desc' ?>">Email</a></th>
            <th>Description</th>
            <th><a href="?page=<?=$current_page?>&sortStatus=<?= isset($_GET['sortStatus']) && !empty($_GET['sortStatus']) && $_GET['sortStatus'] == 'desc' ? 'asc' : 'desc' ?>">Status</a></th>
            <th>Changed by</th>
            <?php if ($isAdmin) : ?>
            <th></th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php if ($tasks) : ?>
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?= $task['id'] ?></td>
                    <td><?= $task['username'] ?></td>
                    <td><?= $task['email'] ?></td>
                    <td><?= $task['description'] ?></td>
                    <td><?= $statuses[$task['status']] ?></td>
                    <td><?= $task['isChanged'] ? 'edited by admin' : '' ?></td>
                    <?php if ($isAdmin) : ?>
                    <td><a href="/edit.php?id=<?= $task['id'] ?>">Edit</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?page=<?= $current_page > 1 ? $current_page - 1 : 1?><?=$sort?>">Previous</a></li>
        <?php if ($paginationCount) : ?>
            <?php for ($i = 1; $i <= $paginationCount; $i++) : ?>
                <li style="display: none" class="page-item numbers_item <?= $current_page == $i ? 'active activeItem' : '' ?>" data-page="<?=$i?>"><a class="page-link" href="?page=<?= $i ?><?=$sort?>"><?= $i ?></a></li>
            <?php endfor; ?>
        <?php endif; ?>
        <li class="page-item"><a class="page-link" href="?page=<?=$current_page < $paginationCount ? $current_page + 1 : $paginationCount ?><?=$sort?>">Next</a></li>
    </ul>
</nav>
