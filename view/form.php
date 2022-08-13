<?php
require_once "controllers/tasksController.php";
if (!empty($_POST)) {
    insertTask($_POST);
}

?>
<form action="/create.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">User name</label>
        <input type="text" name="username" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea name="description" required  class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add task</button>
</form>