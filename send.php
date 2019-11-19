<?php

error_reporting(E_ALL);
# Access data
$db_server = 'rdbms.strato.de';
$db_user = 'U3949062';
$db_password = 'Gebruiker001?';
$db_name = 'DB3949062';
# Connection establishment

$conn = mysqli_connect($db_server,$db_user, $db_password, $db_name);

if($conn){
    echo "";
}else{
    echo "Probeer nog een keer";
}

// Variabelen voor data
$quote = $_POST['quote'];
$name = $_POST['naam'];

$sql = "INSERT INTO Test (Quote, Naam)
VALUES ('$quote', '$name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>