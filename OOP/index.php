
<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once("./classes/Car.php");

        $car02 = new Car(2, "black", "Ford");
        echo $car02->displayCar();
        $car02->setColor("white");
        echo "<br>";
        echo $car02->displayCar();

    ?>

    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <button>Signup</button>
    </form>
</body>
</html>