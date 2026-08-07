```php
<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (empty($name) || empty($email)) {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {

        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([
            ':name' => $name,
            ':email' => $email
        ])) {
            $message = "Record added successfully.";
        } else {
            $message = "Error saving record.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

<h2>Create User</h2>

<p><?php echo $message; ?></p>

<form method="post">

    Name:
    <input type="text" name="name">
    <br><br>

    Email:
    <input type="text" name="email">
    <br><br>

    <input type="submit" value="Save">

</form>

<br>

<a href="list.php">View Records</a>

</body>
</html>
```
