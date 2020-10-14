

<?php

require 'constants.php';

// $connection = new mysqli('localhost', 'root', '', 'zoo');

$connection = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($connection->connect_error)
{
    die('Connection failed:' .$connection->connect_error);
}  

echo 'Connected successfully. Now you can perform queries.';

$connection->close();

?>