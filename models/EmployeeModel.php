<?php

class EmployeeModel
{
    private PDO $pdo_helper;

    public function __construct()
    {
        $this->pdo_helper = new PDO("mysql:dbhost=localhost;dbname=lab07_mvc;charset=utf8", "root", "");
        $this->pdo_helper->setAttribute(PDO::ERR_NONE, PDO::ERRMODE_EXCEPTION);
    }

    public function get_all_employees()
    {
        $sql = "SELECT * FROM `employees`";

        $statement = $this->pdo_helper->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT * FROM `employees` WHERE id = :id";

        $statement = $this->pdo_helper->prepare($sql);
        $statement->bindValue('id', $id);

        $statement->execute();

        return $statement->fetch();
    }

    public function get_by_column($column, $value)
    {
        $sql = "SELECT * FROM `employees` WHERE `$column` = :val";

        $statement = $this->pdo_helper->prepare($sql);
        $statement->bindValue('val', $value);

        $statement->execute();

        return $statement->fetchAll();
    }

    public function create_new_employee($name, $surname, $email, $phone, $department_id)
    {
        $sql = "
            INSERT INTO employees (name, surname, email, phone, department_id)
            VALUES (:name, :surname, :email, :phone, :department_id)
        ";

        $statement = $this->pdo_helper->prepare($sql);

        $statement->bindValue('name', $name);
        $statement->bindValue('surname', $surname);
        $statement->bindValue('email', $email);
        $statement->bindValue('phone', $phone);
        $statement->bindValue('department_id', $department_id);

        $statement->execute();
    }

    public function update_employee($id, $name, $surname, $email, $phone, $department_id)
    {
        $sql = "
            UPDATE employees
            SET 
                name = :name,
                surname = :surname,
                email = :email,
                phone = :phone,
                department_id = :department_id
            WHERE 
                id = :id
        ";

        $statement = $this->pdo_helper->prepare($sql);

        $statement->bindValue('id', $id);
        $statement->bindValue('name', $name);
        $statement->bindValue('surname', $surname);
        $statement->bindValue('email', $email);
        $statement->bindValue('phone', $phone);
        $statement->bindValue('department_id', $department_id);

        $statement->execute();
    }

    public function delete_employee($id)
    {
        $sql = "DELETE FROM employees WHERE id = :id";

        $statement = $this->pdo_helper->prepare($sql);

        $statement->bindValue('id', $id);

        $statement->execute();
    }
}
