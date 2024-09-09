<?php
require_once("./functions/db.php");

$id = $_GET['id'];

$delete = $conn->prepare("DELETE FROM contacts WHERE id = ?");
$delete->bind_param("i", $id);

if ($delete->execute()) {
    header("Location: index.php");
} else {
    echo "Fail: " . $delete->error;
}

$delete->close();
$conn->close();
?>
