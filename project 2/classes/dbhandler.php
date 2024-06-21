<?php

final class dbhandler
{
    private $dataSource = "mysql:dbname=stemwijzer;host=localhost;";
    private $username = "root";
    private $password = "";
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dataSource, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            error_log("Database connection error: " . $exception->getMessage());
            exit('Database connection error. Please try again later.');
        }
    }

    public function SelectPartijen()
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM partijen");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }

    public function SelectStellingen()
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM stelling");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }

    public function SelectAntwoorden($vraag_id)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM stelling WHERE vraag_id = :vraag_id");
            $statement->bindParam(':vraag_id', $vraag_id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }

   
 private function executeQuery($query, $params = [])
{
    try {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {

        return false;
    }
}public function getUserByUsername($username)
{
    try {
        $statement = $this->pdo->prepare("SELECT * FROM inloggen WHERE user = :username");
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
       
        return $result;
    } catch (PDOException $exception) {
      
        return false;
    }
} public function createUser($username, $password)
{
    try {
        $statement = $this->pdo->prepare("INSERT INTO inloggen (user, password) VALUES (:username, :password)");
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);

        $result = $statement->execute();
        return $result;
    } catch (PDOException $exception) {
        error_log("Database error: " . $exception->getMessage());
        return false;
    }
}

}
?>
