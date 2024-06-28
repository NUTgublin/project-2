<?php
final class dbhandler
{
    public $dataSource = "mysql:dbname=stemwijzer;host=localhost;";
    public $username = "root";
    public $password = "";
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dataSource, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            error_log("Database connection error: " . $exception->getMessage());
            exit('Database connection error.');
        }
    }

    public function SelectPartijen()
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM partijen");
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM partijen");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }
    public function SelectNieuws()
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM nieuws");
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM nieuws");
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

    private function executeQuery($query, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {

            return false;
            //sdsdsdfas
        }
    }
    public function getUserByUsername($username)
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
    }
    public function createUser($username, $password)
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


    public function getQuestionById($question_id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM stelling WHERE vraag_id = :vraag_id");
        $statement->bindParam(':vraag_id', $question_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertUserAnswer($user_id, $vraag_id, $antwoord)
    {
        $statement = $this->pdo->prepare("INSERT INTO gebruiker_antwoorden (gebruiker_id, vraag_id, antwoord) VALUES (:gebruiker_id, :vraag_id, :antwoord)");
        $statement->bindParam(':gebruiker_id', $user_id, PDO::PARAM_STR);
        $statement->bindParam(':vraag_id', $vraag_id, PDO::PARAM_INT);
        $statement->bindParam(':antwoord', $antwoord, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function getUserAnswers($user_id)
    {
        $statement = $this->pdo->prepare("SELECT vraag_id, antwoord FROM gebruiker_antwoorden WHERE gebruiker_id = :gebruiker_id");
        $statement->bindParam(':gebruiker_id', $user_id, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBestMatchingParty($user_id)
    {
        try {
            // Haal de antwoorden van de gebruiker op
            $statement = $this->pdo->prepare("SELECT vraag_id, antwoord FROM gebruiker_antwoorden WHERE gebruiker_id = :gebruiker_id");
            $statement->bindParam(':gebruiker_id', $user_id, PDO::PARAM_STR);
            $statement->execute();
            $user_answers = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($user_answers)) {
                throw new Exception("Geen antwoorden gevonden voor gebruiker ID: $user_id");
            }

            // Haal de antwoorden van de politieke partijen op met de partijnaam
            $statement = $this->pdo->prepare(
                "SELECT p.naam AS partij_naam, pa.stelling_ID, pa.antwoord 
            FROM partij_antwoorden pa 
            INNER JOIN partijen p ON pa.partij_id = p.id"
            );
            $statement->execute();
            $party_answers = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Bereken de scores voor elke partij
            $scores = [];
            foreach ($party_answers as $pa) {
                foreach ($user_answers as $ua) {
                    if ($pa['stelling_ID'] == $ua['vraag_id'] && $pa['antwoord'] == $ua['antwoord']) {
                        if (!isset($scores[$pa['partij_naam']])) {
                            $scores[$pa['partij_naam']] = 0;
                        }
                        $scores[$pa['partij_naam']]++;
                    }
                }
            }

            // Zoek de partij met de hoogste score
            $best_party = null;
            $highest_score = -1;
            foreach ($scores as $party_name => $score) {
                if ($score > $highest_score) {
                    $highest_score = $score;
                    $best_party = $party_name;
                }
            }

           

            if ($best_party === null) {
                throw new Exception("Geen partij gevonden die overeenkomt met de antwoorden.");
            }
            else {
                return $best_party;
            }

        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        } catch (Exception $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }
}
?>