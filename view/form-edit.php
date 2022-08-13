<?php
require_once "controllers/tasksController.php";
$task = getCurrentTask($id);
if (!empty($_POST)) {
    updateTask($_POST, $id);
}
?>
<form action="/edit.php?id=<?=$id?>" method="post">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <select name="status" required  class="form-control" id="" cols="30" rows="10">
            <option value="0" <?= !$task['status'] ? 'selected' : '' ?>>To do</option>
            <option value="1" <?= $task['status'] == 1 ? 'selected' : '' ?>>In progress</option>
            <option value="2" <?= $task['status'] == 2 ? 'selected' : '' ?>>Done</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea name="description" required  class="form-control" id="" cols="30" rows="10"><?= $task['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update task</button>
</form>