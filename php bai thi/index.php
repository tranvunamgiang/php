<?php
require_once("./functions/db.php");

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Phonebook</h1>
        <div class="text-right mb-3">
            <a href="add_contact.php" class="btn btn-primary">Add New Contact</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['phone']; ?></td>
                    <td><a href="edit_contact.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a href="delete_contact.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
