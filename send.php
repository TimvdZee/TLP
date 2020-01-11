<?php
# Access data
$db_server = 'rdbms.strato.de';
$db_user = 'U3949062';
$db_password = 'Gebruiker001?';
$db_name = 'DB3949062';
# Connection establishment

$conn = mysqli_connect($db_server,$db_user, $db_password, $db_name);
$sql = "SELECT * FROM Quotes";

$result = $conn->query($sql);
$rowcount=mysqli_num_rows($result);
mysqli_free_result($result);


if($conn){
    echo "";
}else{
    echo "Probeer nog een keer";
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="indexStyle.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Reenie+Beanie&display=swap" rel="stylesheet">
    </head>
    <body>
        <aside id="info-block">
        <section class="file-marker">
                <div>
                    <div class="box-title">
                        &nbsp;&nbsp;THE LONELY PROJECT&nbsp;&nbsp;
                    </div>
                    <div class="box-contents">
                        <div id="quote">
                        <?php
                        // Variabelen voor data
                        $quote = $_POST['quote'];
                        $name = $_POST['naam'];
                        if ($rowcount == 0){
                            $id = 0;
                        }else{
                            $id = $rowcount + 1;
                        }

                        if ($quote == "" || $quote == " " || $name == ""){
                            ?> <span id="status"><?php echo "Je hebt het niet volledig ingevuld"; ?> </span> <?php
                        }else{
                            $sql = "INSERT INTO Quotes (id, Quote, Naam)
                            VALUES ('$id','$quote', '$name')";

                            if ($conn->query($sql) === TRUE) {
                                ?> <span id="status"><?php echo "Dankjewel! \n Je verhaal is verstuurd."; ?> </span><br> <?php
                                ?> <span class="val"><?php echo $quote; ?> </span><br> <?php
                                ?> <span class="val"><?php echo $name; ?> </span> <?php
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                        }
                        ?>
                        </div>
                        <br>
                        <br>
                        <a href="http://thelonelyproject.tvanderzee.nl" id="terugBtn">TERUG</a>
                    </div>
                </div>
        </section>
        </aside>
        <?php
$conn->close();

?>
    </body>
</html>