<?php

    $user = "root";
    $pw = "serreets";

	$connexion = new PDO('mysql:dbname=Eau;charset=utf8;host=192.168.2.20', $user, $pw);

    for($i = 0; $i < 20; $i++){
        $statement = $connexion->prepare("INSERT INTO Datas (IdSensor, DataValue)
            VALUES(" . rand() . "," . rand() . ")");
        $statement->execute();
    }

    $statement = $connexion->prepare("SELECT * FROM Datas");
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $statement->execute();

    $result = $statement->fetchAll();

    $connexion = null;
?>

<?php
for($i = 0; $i < count($result); $i++){
?>
    <div style="margin-bottom:20px;">
        <div> ID: <?= $result[$i]['NoData'] ?> </div>
        <div> Sensor: <?= $result[$i]['IdSensor'] ?> </div>
        <div> Data: <?= $result[$i]['DataValue'] ?> </div>
        <div> Date: <?= $result[$i]['DateReceived'] ?> </div>
    </div>
<?php
}
?>
