<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $member = $_POST['member_type']=='yes' ? 'member' : 'non-member';

    $stmt = $conn->prepare("SELECT * FROM users WHERE name = ? AND email = ? AND password = ?");
    $stmt->bind_param("sss", $name, $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "user already exists";
    } else {
        $stmt = $conn->prepare("INSERT INTO users(name, email, password, member_type) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $name, $email, $password, $member);
        if ($stmt->execute()) {
            header("Location: ../index.html");
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}

?>