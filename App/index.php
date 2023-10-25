<?php

$host = 'db';

$user = 'admin';

$pass = 'admin123';

$mydatabase = 'sample_db';

$conn = new mysqli($host, $user, $pass, $mydatabase);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM user_details';

if ($result = $conn->query($sql)) {
    $users = array();
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }

    foreach ($users as $user) {
        echo "<br>";
        echo $user->username . " " . $user->password;
        echo "<br>";
    }

    $result->close();
    $conn->close();
} else {
    echo "Query failed: " . $conn->error;
}
?>