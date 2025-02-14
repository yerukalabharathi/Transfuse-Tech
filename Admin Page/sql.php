<?php
// Assuming you have already established a database connection

// Random commit statement
$sql = "INSERT INTO donors (donor_name, donor_email, donor_mobile) VALUES ('Rahul Bijjam', 'biirareddy@gmail.com', '8688433812')";
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Random rollback statement
mysqli_query($conn, "ROLLBACK");

// Close the database connection
mysqli_close($conn);
?>
