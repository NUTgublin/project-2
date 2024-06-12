<?php

final class dbhandler
{
    private $dataSource = "mysql:dbname=stemwijzer;host=localhost;"; //Hier dient je connection string te komen mysql:dbname=;host=;
    private $username = "root";
    private $password = "";

    public function SelectPartijen()
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);

            $statement = $pdo->prepare("SELECT * FROM  partijen");

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
            //Hier doe je grootendeels hetzelfde als bij SelectAll, echter selecteer je alleen alles uit de category tabel.
        } catch (PDOException $exception) {
            //Indien er iets fout gaat kun je hier de exception var_dumpen om te achterhalen wat het probleem is.
            //Return false zodat het script waar deze functie uitgevoerd wordt ook weet dat het misgegaan is.
        }
    }
    public function SelectStellingen()
    {

        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM  stelling");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $exception) {
            //throw $th;
        }

    }

    public function SelectAntwoorden($vraag_id)
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);

            $statement = $pdo->prepare("SELECT * FROM stelling WHERE vraag_id = :vraag_id");
            $statement->bindParam(':vraag_id', $vraag_id, PDO::PARAM_INT);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }









}
?>