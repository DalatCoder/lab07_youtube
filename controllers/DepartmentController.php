<?php

class DepartmentController
{
    private $department_model;
    private $employee_model;

    public function __construct()
    {
        include __DIR__ . '/../models/DepartmentModel.php';
        include __DIR__ . '/../models/EmployeeModel.php';

        $this->department_model = new DepartmentModel();
        $this->employee_model = new EmployeeModel();
    }

    /**
     * Phương thức này dùng để hiển thị danh sách toàn bộ phòng ban
     */
    public function index()
    {
        // Lấy danh sách tất cả phòng ban
        $all_departments = $this->department_model->get_all_departments();

        for ($i = 0; $i < count($all_departments); $i++) {
            // Lấy danh sách nhân viên thuộc về phòng ban
            $department_id = $all_departments[$i]['id'];
            $employees = $this->employee_model->get_by_column('department_id', $department_id);

            $number_of_employee = count($employees);
            $all_departments[$i]['number_of_employee'] = $number_of_employee;
        }

        // Truyền danh sách này vào view
        include __DIR__ . '/../views/department/index.php';
    }

    /**
     * Phương thức này dùng để hiển thị giao diện tạo mới 1 phòng ban
     */
    public function create()
    {
        include __DIR__ . '/../views/department/create.php';
    }

    /**
     * Phương thức này dùng để lưu trữ dữ liệu về phòng ban mới
     */
    public function store()
    {
        $department_name = $_POST['department_name'];

        $this->department_model->create_new_department($department_name);

        header('location: ?controller=DepartmentController&action=index');
    }

    /**
     * Phương thức này dùng để hiển thị giao diện chỉnh sửa phòng ban
     */
    public function edit()
    {
        // Tìm phòng ban mà người dùng muốn chỉnh sửa
        $department_id = $_GET['id'];
        $department = $this->department_model->get_by_id($department_id);

        // Gọi view và tryền sẵn dữ liệu
        include __DIR__ . '/../views/department/edit.php';
    }

    /**
     * Phương thức này dùng để lưu trữ dữ liệu cập nhật phòng ban
     */
    public function update()
    {
        $department_name = $_POST['department_name'];
        $department_id = $_POST['department_id'];

        $this->department_model->update_department($department_id, $department_name);
        header('location: ?controller=DepartmentController&action=index');
    }

    /**
     * Phương thức này dùng để xóa bỏ phòng ban
     */
    public function destroy()
    {
        $department_id = $_GET['id'];

        $this->department_model->delete_department($department_id);
        header('location: ?controller=DepartmentController&action=index');
    }
}
