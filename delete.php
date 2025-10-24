<?php
include('tp.php'); 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = intval($_GET['id']);

    $sql = "DELETE FROM teet WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect with success message (optional)
        header("Location: dashboard.php?deleted=1");
        exit();
    } else {
        echo "<h3 style='color:red; text-align:center;'>Error deleting user: " . $conn->error . "</h3>";
    }
} else {
    echo "<h3 style='color:red; text-align:center;'>Invalid ID</h3>";
}
?>
