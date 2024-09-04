<?php
class User {
    private $id;
    private $username;
    private $password;
    private $latest_access_date;
    private $email;
    private $cellphone;
    private $join_date;
    private $gender;
    private $role;
    private $salary;

    // Constructor para inicializar las propiedades
    public function __construct($id, $username, $password, $latest_access_date, $email, $cellphone, $join_date, $gender, $role, $salary) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->latest_access_date = $latest_access_date;
        $this->email = $email;
        $this->cellphone = $cellphone;
        $this->join_date = $join_date;
        $this->gender = $gender;
        $this->role = $role;
        $this->salary = $salary;
    }

    // Métodos getters y setters para cada propiedad
    // (Incluye los métodos para las nuevas propiedades)
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getLatestAccessDate() { return $this->latest_access_date; }
    public function setLatestAccessDate($latest_access_date) { $this->latest_access_date = $latest_access_date; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getCellphone() { return $this->cellphone; }
    public function setCellphone($cellphone) { $this->cellphone = $cellphone; }

    public function getJoinDate() { return $this->join_date; }
    public function setJoinDate($join_date) { $this->join_date = $join_date; }

    public function getGender() { return $this->gender; }
    public function setGender($gender) { $this->gender = $gender; }

    public function getRole() { return $this->role; }
    public function setRole($role) { $this->role = $role; }

    public function getSalary() { return $this->salary; }
    public function setSalary($salary) { $this->salary = $salary; }
}
?>
