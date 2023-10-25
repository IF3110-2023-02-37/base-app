<?php 
  class ArtistModel {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getAllArtists() {
      $query = "SELECT * FROM artist";
      
      $this->db->query($query);
      return $this->db->resultSet();
    }

    public function browseAllArtists() {
      $query = "SELECT * FROM artist";
      
      $this->db->query($query);
      $dataResult = $this->db->resultSet();

      $artistPerPage = 8;
      $totalArtist = count($dataResult);
      $currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;
      $startIndex = ($artistPerPage * $currentPage) - $artistPerPage;
      $append = " LIMIT $startIndex, $artistPerPage";
      $query = $query . $append;
      
      $totalPage = ceil($totalArtist/$artistPerPage);

      $this->db->query($query);
      
      $return = array();
      $return[] = $this->db->resultSet();
      $return[] = $totalPage;
      return $return;
    }

    public function getDetailArtist($artist) {
      $query = "SELECT * FROM artist WHERE name LIKE '$artist'";
      $this->db->query($query);
      return $this->db->single();
    }


    public function editArtist ($data) {
      $artistID = $data['id'];
      $description = $data['description'];
      $name = $data['name'];
      $image = $data['image'];

      if ($this->checkArtistWithID($name, $artistID) === 0) {
        http_response_code(400);
        return;
      }
      
      $query = "UPDATE artist SET name = '$name', description = '$description'";
      if ($image !== "") {
        $query = $query . ", artistImage = '$image'";
      }

      $query = $query . " WHERE id = '$artistID'";
      $this->db->query($query);
      $this->db->execute();
    }


    public function deleteArtist ($data) {
      $id = $data['artistID'];
      $query = "DELETE FROM artist WHERE id = '$id'";
      $this->db->query($query);
      $this->db->execute();
    }
    
    public function checkArtistName ($name) {
      $query = "SELECT * FROM artist WHERE name = '$name'";
      $this->db->query($query);
      $this->db->execute();

      return ($this->db->rowCount() > 0) ? 1 : 0;
    }

    public function checkArtistWithID ($name, $id) {
      $query = "SELECT * FROM artist WHERE name = '$name'";
      $this->db->query($query);
      $data = $this->db->resultSet();
      return ($data[0]['id'] === $id) ? true : false;
    }

    public function getArtistID ($name) {
      $query = "SELECT * FROM artist WHERE name = '$name'";
      $this->db->query($query);
      return $this->db->single()['id'];
    }


    public function createArtist ($data) {
      if ($this->checkArtistName($data['name']) === 0) {
        $query = "INSERT INTO artist (name, description, artistImage) VALUES (:name, :description, :artistImage)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('artistImage', $data['image']);
  
        $this->db->execute();
        $artistID = $this->getArtistID($data['name']);
        http_response_code(200);
        echo json_encode([
          "name" => $data['name'],
          "description" => $data['description'],
          "artistImage" => $data['image'],
          "artistID" => $artistID          
        ]);
      } else {
        http_response_code(400);
      }
    }
    
  }
?>