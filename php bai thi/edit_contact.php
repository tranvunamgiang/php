<?php
require_once("./functions/db.php");

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $edit = $conn->prepare("UPDATE contacts SET name = ?, phone = ? WHERE id = ?");
    $edit->bind_param("ssi", $name, $phone, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $edit->error;
    }

    $edit->close();
}

$sql = "SELECT * FROM contacts WHERE id = $id";
$result = $conn->query($sql);
$contact = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Edit Contact</h1>
        <form method="POST" action="edit_contact.php?id=<?php echo $id; ?>" class="mt-4">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $contact['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $contact['phone']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
