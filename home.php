<?php
session_start();
include 'php/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
}

$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
$member = $_SESSION['member_type'];

$stmt = $conn->prepare("SELECT * FROM photos");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>question 1</title>
    <h1>photo website</h1>
</head>

<body>
    <div>
        <h2>Welcome <?php echo $name; ?></h2>
        <p>Email: <?php echo $email; ?></p>

        <p>Member: <?php echo $member; ?></p>
        <p><a href="logout.php">Logout</a></p>

        <div style="text-align: center;">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="photo">
                    <img src="<?php echo "images/" . $row['file_name']; ?>" alt="<?php echo $row['description']; ?>"
                        style="width:200px;height:auto;">
                    <p><?php echo $row['id']; ?></p>
                    <form method="post" action="php/download.php">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Download</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div id="question2">
        <h2>Question 2</h2>
        <p><a href="question2/cateringDiscount.php">click here to question2</a></p>
    </div>
    <div id="question3">
        <h2>Question 3</h2>
        <p><a href="question3/dateCount.php">click here to question3</a></p>
    </div>
</body>

</html>