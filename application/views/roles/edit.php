<!DOCTYPE html>
<html>
<head>
    <title>Edit Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Edit Role</h1>

    <form action="<?= site_url('role/update/'.$role->id) ?>" method="post">

        <div class="mb-3">
            <label class="form-label">Role name</label>
            <input type="text" name="name" class="form-control"
                   value="<?= $role->name ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?= site_url('role') ?>" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
</html>
