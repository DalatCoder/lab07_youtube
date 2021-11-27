<?php

class EmployeeController
{
    private $employee_model;
    private $department_model;

    public function __construct()
    {
        include __DIR__ . '/../models/EmployeeModel.php';
        include __DIR__ . '/../models/DepartmentModel.php';

        $this->employee_model = new EmployeeModel();
        $this->department_model = new DepartmentModel();
    }

    /**
     * Phương thức này dùng để hiển thị danh sách toàn bộ nhân viên
     */
    public function index()
    {
        // Lấy danh sách tất cả nhân viên
        $all_employees = $this->employee_model->get_all_employees();

        for ($i = 0; $i < count($all_employees); $i++) {
            // Tìm được thông tin phòng ban của nhân viên
            $department_id = $all_employees[$i]['department_id'];
            $department = $this->department_model->get_by_id($department_id);

            // Thêm thông tin này vào mảng employeees hiện thời
            $all_employees[$i]['department'] = $department;
        }

        // Truyền danh sách này vào view
        include __DIR__ . '/../views/employee/index.php';
    }

    /**
     * Phương thức này dùng để hiển thị giao diện tạo mới 1 nhân viên
     */
    public function create()
    {
        // Lấy được danh sách phòng ban
        $all_departments = $this->department_model->get_all_departments();

        // Truyền danh sách này vào views để hiển thị
        include __DIR__ . '/../views/employee/create.php';
    }

    /**
     * Phương thức này dùng để lưu trữ dữ liệu về nhân viên mới
     */
    public function store()
    {
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $department = $_POST['department'];

        $this->employee_model->create_new_employee($firstname, $surname, $email, $phone, $department);

        header('location: ?controller=EmployeeController&action=index');
    }

    /**
     * Phương thức này dùng để hiển thị giao diện chỉnh sửa nhân viên
     */
    public function edit()
    {
        // Tìm nhân viên mà người dùng muốn chỉnh sửa
        $employee_id = $_GET['id'];
        $employee = $this->employee_model->get_by_id($employee_id);
        $all_departments = $this->department_model->get_all_departments();

        // Gọi view và tryền sẵn dữ liệu
        include __DIR__ . '/../views/employee/edit.php';
    }

    /**
     * Phương thức này dùng để lưu trữ dữ liệu cập nhật nhân viên
     */
    public function update()
    {
        $employee_id = $_POST['id'];
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $department = $_POST['department'];

        $this->employee_model->update_employee($employee_id, $firstname, $surname, $email, $phone, $department);
        header('location: ?controller=EmployeeController&action=index');
    }

    /**
     * Phương thức này dùng để xóa bỏ nhân viên
     */
    public function destroy()
    {
        $employee_id = $_GET['id'];

        $this->employee_model->delete_employee($employee_id);
        header('location: ?controller=EmployeeController&action=index');
    }
}
