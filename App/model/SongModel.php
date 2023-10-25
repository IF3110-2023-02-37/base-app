<?php 
  class SongModel {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getAllSongs () {
      $this->db->query('SELECT *, song.id as songID FROM song, artist WHERE song.artistID = artist.id;');
      return $this->db->resultSet();
    }
    
    public function getAllGenres() {
      $this->db->query('SELECT DISTINCT genre FROM song;');
      return $this->db->resultSet();
    }

    public function getArtistSongs ($artistName) {
      $query = "SELECT *, s.id as songID FROM song s, artist a WHERE s.artistID = a.id AND '$artistName' = a.name";
      $this->db->query($query); 
      return $this->db->resultSet();
    }

    public function getLikedSongs () {
      $username = $_SESSION['username'];
      $query = "SELECT DISTINCT title, name, coverImage, audio, s.id as songID FROM song s, likedSong ls, artist a WHERE ls.idSong = s.id AND s.artistID = a.id AND ls.userName = '$username'";
      
      $this->db->query($query);
      $dataResult = $this->db->resultSet();
      $songsPerPage = 8;
      $totalSong = count($dataResult);
      $currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;
      $startIndex = ($songsPerPage * $currentPage) - $songsPerPage;
      $append = " LIMIT $startIndex, $songsPerPage";
      $query = $query . $append;
      
      $totalPage = ceil($totalSong/$songsPerPage);

      $this->db->query($query);
      $return = array();
      $return[] = $this->db->resultSet();
      $return[] = $totalPage;
      return $return;
    }

    public function getIDLikedSongs() {
      $likedSongs = $this->getLikedSongs();
      $data = array();
        
      foreach ($likedSongs[0] as $s) {
        $data[] = $s['songID'];
      }

      return $data;
    }

    public function getSongID ($title, $artistID) {
      $query = "SELECT * FROM song WHERE title = '$title' AND artistID = '$artistID'";
      $this->db->query($query);
      return $this->db->single()['id'];
    }

    public function addFavorite ($username, $songID) {
      $query = "INSERT INTO likedSong (userName, idSong) VALUES (:userName, :idSong)";
      $this->db->query($query);
      $this->db->bind('idSong', $songID);
      $this->db->bind('userName', $username);
      $this->db->execute();
    }

    public function removeFavorite ($username, $songID) {
      $query = "DELETE FROM likedSong WHERE userName = '$username' AND idSong = '$songID'";
      $this->db->query($query);
      $this->db->execute();
    }

    public function browseAllSongs() {
      $query = "SELECT *, song.id as songID FROM song, artist WHERE song.artistID = artist.id";
      if (isset($_GET['genre'])) {
        $genre = $_GET['genre'];
        $append = " AND genre LIKE '$genre'";
        $query = $query . $append;
      }

      if (isset($_GET['artist'])) {
        $artist = $_GET['artist'];
        $append = " AND artist.id LIKE '$artist'";
        $query = $query . $append;
      }

      if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $search = str_replace('%20', ' ', $search);
        $append = " AND (title LIKE '$search' OR name LIKE '$search')";
        $query = $query . $append;
      }

      if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        if ($sort === 'artist_asc') {
          $append = " ORDER BY name ASC";
        } else if ($sort === 'artist_desc') {
          $append = " ORDER BY name DESC";
        } else if ($sort === 'title_asc') {
          $append = " ORDER BY title ASC";
        } else if ($sort === 'title_desc') {
          $append = " ORDER BY title DESC";
        }
        $query = $query . $append;
      }
      
      $this->db->query($query);
      $dataResult = $this->db->resultSet();
      $songsPerPage = 8;
      $totalSong = count($dataResult);
      $currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;
      $startIndex = ($songsPerPage * $currentPage) - $songsPerPage;
      $append = " LIMIT $startIndex, $songsPerPage";
      $query = $query . $append;
      
      $totalPage = ceil($totalSong/$songsPerPage);

      $this->db->query($query);
      
      $return = array();
      $return[] = $this->db->resultSet();
      $return[] = $totalPage;
      return $return;
    }

    public function editMusic ($data) {
      $songID = $data['id'];
      $title = $data['title'];
      $genre = $data['genre'];
      $coverImage = $data['coverImage'];
      $audio = $data['audio'];
      
      $query = "UPDATE song SET title = '$title', genre = '$genre'";
      if ($coverImage !== "") {
        $query = $query . ", coverImage = '$coverImage'";
      }
      if ($audio !== "") {
        $query = $query . ", audio = '$audio'";
      }

      $query = $query . " WHERE id = '$songID'";
      $this->db->query($query);
      $this->db->execute();
    }

    public function checkMusicTitle ($id, $title) {
      $query = "SELECT * FROM song WHERE artistID = '$id' AND title = '$title'";
      $this->db->query($query);
      $this->db->execute();

      return ($this->db->rowCount() > 0) ? 1 : 0;
    }
    
    public function getArtistName($id) {
      $query = "SELECT * FROM artist WHERE id = '$id'";
      $this->db->query($query);
      return $this->db->single()['name'];
    }

    public function createMusic ($data) {
      if ($this->checkMusicTitle($data['artist'], $data['title']) === 0) {
        $query = "INSERT INTO song (title, genre, artistID, coverImage, audio) VALUES (:title, :genre, :artistID, :coverImage, :audio)";
        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('genre', $data['genre']);
        $this->db->bind('coverImage', $data['coverImage']);
        $this->db->bind('audio', $data['audio']);
        $this->db->bind('artistID', $data['artist']);
  
        $this->db->execute();

        $newSongID = $this->getSongID($data['title'], $data['artist']);
        $artistName = $this->getArtistName($data['artist']);
        
        
        http_response_code(200);
        echo json_encode([
          "title" => $data['title'],
          "genre" => $data['genre'],
          "coverImage" => $data['coverImage'],
          "audio" => $data['audio'],
          "artistID" => $data['artist'],
          "songID" => $newSongID,
          "name" => $artistName
        ]);
        
      } else {
        http_response_code(400);
        echo json_encode(["message"=> "The song by this artist already exists."]);
      }
    }

    public function deleteMusic ($data) {
      $id = $data['songID'];
      $query = "DELETE FROM song WHERE id = '$id'";
      $this->db->query($query);
      $this->db->execute();
    }
    
  }


?>