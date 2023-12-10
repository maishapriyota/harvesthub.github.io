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
} else {
    echo "Connected successfully"; // This line will help confirm if the connection is successful
}

// If form data is available from admin panel
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name']; // Assuming you have a form field for item name
    $item_type = $_POST['item_type']; // Assuming you have a form field for item type
    $item_size = $_POST['item_size']; // Assuming you have a form field for item size
    $item_color = $_POST['item_color']; // Assuming you have a form field for item color
    $item_price = $_POST['item_price']; 
    
    // Construct INSERT query
    $sql = "INSERT INTO products (name, type, size, color, price) VALUES ('$item_name', '$item_type', '$item_size', '$item_color', '$item_price')"; // Adjust fields accordingly

    // Execute the INSERT query
    if ($conn->query($sql) === TRUE) {
        // Redirect to purchase page after successful insertion
        header("Location: purchase.php"); // Redirect to the purchase page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
