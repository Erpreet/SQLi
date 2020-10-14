

<?php

require 'constants.php';

// $connection = new mysqli('localhost', 'root', '', 'zoo');

$connection = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($connection->connect_error)
{
    die('Connection failed:' .$connection->connect_error);
}  

// echo 'Connected successfully. Now you can perform queries.';

$sql = "SELECT * from exhibit";

$result = $connection->query($sql);

if( $result->num_rows > 0) {

    while( $row = $result->fetch_assoc() ){
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }
    // echo "WE have exhibits";
} else {
    echo "There are no exhibits";
}



$connection->close();

?>