<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lab 07</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Lab 07</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=EmployeeController&action=index">Nhân Công</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=DepartmentController&action=index">Phòng Ban</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <h1 class="my-5 text-center h3">Chỉnh sửa nhân viên</h1>

        <div class="row my-3">
            <div class="col">
                <a href="#" class="btn btn-primary">Quay lại trang chủ</a>
            </div>
        </div>

        <form action="?controller=EmployeeController&action=update" method="POST">
            <input type="hidden" name="controller" value="EmployeeController">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?= $employee['id'] ?>">

            <div class="mb-3">
                <label for="surname" class="form-label">Họ</label>
                <input value="<?= $employee['surname'] ?>" type="text" class="form-control" id="surname" name="surname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Tên</label>
                <input value="<?= $employee['name'] ?>" type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="<?= $employee['email'] ?>" type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">SĐT</label>
                <input value="<?= $employee['phone'] ?>" type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Phòng ban</label>
                <select name="department" id="department" class="form-select">
                    <?php foreach ($all_departments as $department) : ?>
                        <option value="<?= $department['id'] ?>" <?= $department['id'] === $employee['department_id'] ? 'selected' : '' ?>>
                            <?= $department['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
