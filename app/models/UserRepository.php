<?php
class UserRepository {
    private $conn;

    public function __construct($db) {
        $this->conn = $db->getPDO();
    }

    public function getUsers() {
        $users = [];

        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['id'], 
                $row['username'], 
                $row['password'], 
                $row['latest_access_date'],
                $row['email'],
                $row['cellphone'],
                $row['join_date'],
                $row['gender'],
                $row['role'],
                $row['salary']);
            $users[]= $user;
        }

        return $users;
    }

    public function create($user) {
        $sql = "INSERT INTO users (username, password, latest_access_date, email, cellphone, join_date, gender, role, salary) VALUES (:username, :password, now(),:email, :cellphone,now(), :gender, :role, :salary)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'username' => $user->getUsername(),
            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            'email' => $user->getEmail(),
            'cellphone' => $user->getCellphone(),
            'gender' => $user->getGender(),
            'role' => $user->getRole(),
            'salary' => $user->getSalary()
        ]);
        return getById($this->conn->lastInsertId());
    }

    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function update($user) {
        if($user->getPassword()==''){
            $sql = "UPDATE users SET email = :email, cellphone = :cellphone, gender = :gender, role = :role, salary = :salary WHERE id = :id";
            $without = [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'cellphone' => $user->getCellphone(),
                'gender' => $user->getGender(),
                'role' => $user->getRole(),
                'salary' => $user->getSalary()
            ];
        }else{
            $sql = "UPDATE users SET password = :password, email = :email,cellphone = :cellphone, gender = :gender, role = :role, salary = :salary WHERE id = :id";
            $with = [
                'id' => $user->getId(),
                'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
                'email' => $user->getEmail(),
                'cellphone' => $user->getCellphone(),
                'gender' => $user->getGender(),
                'role' => $user->getRole(),
                'salary' => $user->getSalary()
            ];
        }
        
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(($user->getPassword()=='')?$without:$with);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        return $stmt->execute();
    }
}
?>
