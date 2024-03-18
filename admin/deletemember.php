<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $hno = $_POST['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'communigate');

    $sql = "DELETE FROM members WHERE hno = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $hno);

    if (mysqli_stmt_execute($stmt)) {
        // Deletion successful
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        echo "success";

        header('announcement.php');

        exit;
        
    } else {
        // Error with the deletion
        echo "error";
    }
} else {
    echo "invalid request";
}
header('location:member.php');
?>
