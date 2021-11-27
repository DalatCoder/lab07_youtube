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
                        <a class="nav-link" href="?controller=EmployeeController&action=index">Nhân Công</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?controller=DepartmentController&action=index">Phòng Ban</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <h1 class="my-5 text-center h3">Thêm phòng ban mới</h1>

        <div class="row my-3">
            <div class="col">
                <a href="?controller=DepartmentController&action=index" class="btn btn-primary">Quay lại trang trước đÓ</a>
            </div>
        </div>

        <form action="?controller=DepartmentController&action=store" method="POST">
            <input type="hidden" name="controller" value="DepartmentController">
            <input type="hidden" name="action" value="store">
            <div class="mb-3">
                <label for="name" class="form-label">Tên phòng ban</label>
                <input name="department_name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
