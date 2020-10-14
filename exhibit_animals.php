<?php
    require 'constants.php';

    $exhibit_id = null;
    $animals = "";

    if( !isset( $_GET['exhibit_id'] ) || $_GET['exhibit_id'] === "" ) {
        echo "You have reached this page by mistake.";
        exit();
    }
    $exhibit_id = $_GET['exhibit_id'];

    $animal_sql = "SELECT Name, CommonName, ScientificName
    FROM Animal
    INNER JOIN ExhibitAnimal USING(AnimalID)
    INNER JOIN Species USING(SpeciesID)
    WHERE ExhibitID = $exhibit_id
    ORDER BY Name ASC";

    $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if( $connection->connect_errno ) {
        die("Connection failed: ". $connection->connect_error);
    }

    if( !$animal_result = $connection->query($animal_sql) ) {
        echo "Something went wrong with the animal query";
        exit();
    }

    $connection->close();

    while( $animal = $animal_result->fetch_assoc() ) {
        // echo '<pre>';
        // print_r($animal);
        // echo '</pre>';
        $animals .= sprintf('
        <h3>%s - %s</h3>
        <p>%s</p>',
        $animal['Name'],
        $animal['CommonName'],
        $animal['ScientificName'],
        );

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCareers Exhibit Animals</title>
</head>
<body>
    <h1>Animals in the Exhibit Name Exhibit</h1>
    <p>Exhibit Description</p>
    <?php echo $animals; ?>
</body>
</html>





