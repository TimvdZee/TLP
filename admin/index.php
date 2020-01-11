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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            var php_var = <?php echo $rowcount ?>;
            $(document).ready(function() {
        var i = 0;
        setInterval(function() {
            $(".fadeIn").css("opacity", "0");
            $(".fadeIn:eq("+i+")").css("opacity", "1");
            console.log("interval"+i);
            if(i == (php_var - 1)) {  
            i = 0;
            } else {
            i++;
            }
        }, 10000);
        });
        </script>
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
                        $sql = "SELECT * FROM Quotes ORDER BY id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                ?> <div class="fadeIn"> <?php
                                echo $row["Quote"];?> <br> <?php
                                ?> <?php echo $row["Naam"]; ?> <?php
                                echo $number_rows;
                                ?> </div> <?php
                                
                            }
                        } else {
                            echo "0 results";
                        }
                        $rowcount=mysqli_num_rows($result);
                        mysqli_free_result($result);
                                                    
                        ?>
                            
                        </div>
                    </div>
                </div>
        </section>
        </aside>
<?php
$conn->close();
?>
    </body>
</html>