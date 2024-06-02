<?php
include 'checkDownload.php';
include 'db.php';
$memberType = $_SESSION['member_type'];

$checkResult = checkDownload($memberType);

if ($checkResult == "Download allowed") {
    $photoId = $_POST['id'];
    $userId = $_SESSION['user_id'];
    $timestamp = time();

    $stmt = $conn->prepare("INSERT INTO download_attempts(user_id,timestamp,photo_id)  VALUES (?,?,?)");
    $stmt->bind_param("isi", $userId, $timestamp, $photoId);
    if($stmt->execute()){
        header("Location: ../home.php");
    }else{
        echo "Error: " . $stmt->error;
    }
} else {
    echo $checkResult; 
}
?>