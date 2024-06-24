<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($data['title'])) {
    $movieId = $data['id'];
    $movieTitle = $data['title'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moviedb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
        exit;
    }


    $name = $_POST[''];
    $sql = "INSERT INTO `favourites` (`movie`) VALUES ('$name');";



    // $stmt = $conn->prepare(
    // $stmt->bind_param("ss", $movieId, $movieTitle);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Movie added to favorites']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add movie to favorites']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
?>
