<?php 
  class UserModel {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getDisplayName($username) {
      $query = "SELECT displayName FROM user WHERE userName = '$username'";
      $this->db->query($query);
      return $this->db->resultSet();
    }

    public function getUser($username) {
      $query = "SELECT * FROM user WHERE userName = '$username'";
      $this->db->query($query);
      return $this->db->resultSet();
    }
    public function checkUsername($data) {
      $username = $data['username'];
      $query = "SELECT * FROM user WHERE username = '$username'";
      $this->db->query($query);
      $this->db->execute();
      return ($this->db->rowCount() > 0);
    }

    public function createUser($data, $role = "user") {
      if (strlen($data['username']) < 5 ) {
        $_SESSION['error'] = "Username must be at least 5 characters.";
        return 0;
      } else if ($this->checkUsername($data) === true) {
        $_SESSION['error'] = "Username already exists.";
        return 0;
      } else if (!$this->validatePassword($data['password'])){
        $_SESSION['error'] = "Password length must be greater than 8 and includes at least one number";
        return 0;
      } else if ($data['password'] !== $data['confirmPassword']) {
        $_SESSION['error'] = "Your password and confirmation password must match.";
        return 0;
      } else {
      // Enkripsi password
        $password = $data['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (userName, password, displayName, profilePicture, role) VALUES (:userName, :password, :displayName, :profilePicture, :role)";
        $this->db->query($query);
        $this->db->bind('userName', $data['username']);
        $this->db->bind('password', $password);
        $this->db->bind('displayName', $data['displayName']);
        $this->db->bind('profilePicture', 'default.jpg');
        $this->db->bind('role', $role);

        $this->db->execute();

        return 1;
      }
    }

    function validatePassword($password) {
      // Check if the password length is greater than 8
      if (strlen($password) >= 8) {
          // Check if the password contains at least one number
          if (preg_match('/\d/', $password)) {
              return true; // Password meets both criteria
          }
      }

      return false;
    }

    public function checkPassword($data) {
      $username = $data['username'];
      $password = $data['password'];

      $query = "SELECT * FROM user WHERE username = '$username'";
      $this->db->query($query);
      $this->db->execute();
      $userPassword = $this->db->single()['password'];
      return (password_verify($password, $userPassword)) ;
    }

    public function login($data) {
      if ($this->checkUsername($data) === false) {
          return -1;
      }

      if ($this->checkPassword($data) === false) {
          return 0;
      }

      $username = $data['username'];
      $query = "SELECT * FROM user WHERE userName = :username";
      $this->db->query($query);
      $this->db->bind('username', $username);
      $this->db->execute();
      $userData = $this->db->single();

      return $userData;
    }

    public function editUser ($data) {
      $username = $data['username'];
      $image = $data['image'];
      $displayname = $data['displayname'];
      $bio = $data['bio'];

      $query = "UPDATE user SET displayName = '$displayname', bio = '$bio'";

      if ($image !== "") {
        $query = $query . ", profilePicture = '$image'";
      }
      $query = $query .  "WHERE userName = '$username'";
      $this->db->query($query);
      $this->db->execute();
      http_response_code(200);
      echo json_encode(["message"=> "Your profile has been changed."]);

    }

    public function deleteUser ($data) {
      $username = $data['username'];
      $query = "DELETE FROM user WHERE username = '$username'";
      $this->db->query($query);
      $this->db->execute();
    }
  }
?>