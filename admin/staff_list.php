<?php
require '../constants.php';

$staff_members = null;

// Create connection
$connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
if( $connection->connect_errno ) {
    die('Connection failed: ' . $connection->connect_error);
}
$sql = "SELECT * FROM Staff";

if( !$result = $connection->query($sql) ) {
    echo "Crap! Something went wrong with the staff query";
    exit();
}

if( 0 === $result->num_rows ) {
    $staff_members = '<tr><td colspan="4">There are no staff members</td></tr>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo - Staff List</title>
</head>
<body>
    <h1>Staff Members</h1>
    <table>
        <?php $staff_members; ?>
    </table>
</body>
</html> 