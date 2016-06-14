<?php
    require_once("Connection.php");

	class Content {

		public static function getData($hours, $role, $status){
            
            $connexion = Connection::getConnection();
            $result = [];

            $statement = $connexion->prepare("SELECT * FROM Datas
            	LEFT JOIN InfoSensor ON Datas.IdSensor = InfoSensor.IdSensor
            	WHERE DateReceived >= date_sub(NOW(), interval ? hour) AND InfoSensor.Role = ? AND InfoSensor.StatuSensor = ?
            	ORDER BY DateReceived");
            $statement->bindParam(1, $hours);
            $statement->bindParam(2, $role);
            $statement->bindParam(3, $status);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            $resultHash = $statement->fetchAll();

            for ($i = 0; $i < count($resultHash); $i++) {
                array_push($result, $resultHash[$i]);
            }

            return $result;
		}
	}