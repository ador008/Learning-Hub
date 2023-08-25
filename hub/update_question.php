<?php
// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "hub";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $question_name = $_POST["question_name"];
    $pdf_download = $_POST["pdf_download"];
    $video_link = $_POST["video_link"];

    // Update the question details in the database
    $query = "UPDATE subject SET question_name = ?, pdf_download = ?, video_link = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $question_name, $pdf_download, $video_link, $id);
    
    if ($stmt->execute()) {
        // Redirect back to the subject page after updating
        header("Location: subject.php?subject=$subject&chapter=$runningChapterNumber&came_from=$came_from");
        exit();
    } else {
        echo "Error updating question: " . $stmt->error;
    }

    $stmt->close();
}
?>
