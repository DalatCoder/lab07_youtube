<?php

class DepartmentModel
{
    private PDO $pdo_helper;

    public function __construct()
    {
        $this->pdo_helper = new PDO("mysql:hostname=localhost;dbname=lab07_mvc;charset=utf8", "root", "");
        $this->pdo_helper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function get_all_departments()
    {
        $sql = "SELECT * FROM `department`";

        $statement = $this->pdo_helper->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT * FROM `department` WHERE id = :id";

        $statement = $this->pdo_helper->prepare($sql);
        $statement->bindValue('id', $id);

        $statement->execute();

        return $statement->fetch();
    }

    public function create_new_department($deparment_name)
    {
        $sql = "INSERT INTO `department` (name) VALUES (:department_name)";

        $statement = $this->pdo_helper->prepare($sql);
        $statement->bindValue('department_name', $deparment_name);

        $statement->execute();
    }

    public function update_department($department_id, $new_department_name)
    {
        $sql = "UPDATE department 
                SET name = :new_name
                WHERE id = :id";

        $statement = $this->pdo_helper->prepare($sql);

        $statement->bindValue('new_name', $new_department_name);
        $statement->bindValue('id', $department_id);

        $statement->execute();
    }

    public function delete_department($department_id)
    {
        $sql = "DELETE FROM department WHERE id = :id";

        $statement = $this->pdo_helper->prepare($sql);

        $statement->bindValue('id', $department_id);

        $statement->execute();
    }
}
