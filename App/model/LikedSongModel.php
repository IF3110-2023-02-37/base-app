<?php 
  class LikedSongModel {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getLikedSongs () {
      $username = $_SESSION['username'];
      $query = "SELECT DISTINCT title, name, coverImage, audio FROM song s, likedSong ls, artist a WHERE ls.idSong = s.id AND s.artistID = a.id AND ls.userName = '$username'";

      $this->db->query($query);
      return $this->db->resultSet();
    }
  }

?>