<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Harvest Greener</title>
  <link rel="stylesheet" href="style/css.css">
  <link rel="icon" type="image/x-icon" href="images/logo_col.jpeg">
  <!--fonts for footer-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
  
  
</head>

<body>
<?php
// Database credentials
$servername = "127.0.0.1"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password (if any)
$dbname = "products"; // Replace with your database name


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve customer's purchases
$query = "SELECT * FROM products"; // Adjust the query to fetch specific data related to customers or purchases

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each purchase
    while ($row = $result->fetch_assoc()) {
        echo "Item Name: " . $row['name'] . ", Price: €" . $row['price'] . "<br>";
        // Display other purchase details as needed
	  echo '<form method="post">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="text" name="item_name" value="' . $row['name'] . '">'; // Assuming inputs for other fields similarly
      echo '<input type="text" name="item_price" value="' . $row['price'] . '">';
	  echo '<input type="text" name="item_type" value="' . $row['type'] . '">';
	  echo '<input type="text" name="item_size" value="' . $row['size'] . '">';
	  echo '<input type="text" name="item_color" value="' . $row['color'] . '">';
      echo '<input type="submit" name="update" value="Update">';
      echo '<input type="submit" name="delete" value="Delete">';
      echo '</form>';
    }
} else {
    echo "No purchases found.";
}



// Code for Update and Delete Operations

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update Operation
    if (isset($_POST['update'])) {
        $id = $_POST['id']; // Assuming you have a hidden field for item ID in the form

        $item_name = $_POST['item_name'];
        $item_type = $_POST['item_type'];
        $item_size = $_POST['item_size'];
        $item_color = $_POST['item_color'];
        $item_price = $_POST['item_price'];

        // Construct UPDATE query
        $sql = "UPDATE products SET name='$item_name', type='$item_type', size='$item_size', color='$item_color', price='$item_price' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Delete Operation
    if (isset($_POST['delete'])) {
        $id = $_POST['id']; // Assuming you have a hidden field for item ID in the form

        // Construct DELETE query
        $sql = "DELETE FROM products WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}


// Close connection
$conn->close();
?>

<p><a href="saviourbox.php" class="button button1" >To our saviour box</a>


