<?php
require_once("./functions/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $add = $conn->prepare("INSERT INTO contacts (name, phone) VALUES (?, ?)");
    $add->bind_param("ss", $name, $phone);

    if ($add->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $add->error;
    }

    $add->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Add New Contact</h1>
        <form method="POST" action="add_contact.php" class="mt-4">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
