<?php
final class dbhandler
{
    public $dataSource = "mysql:dbname=stemwijzer;host=localhost;";
    public $username = "root";
    public $password = "";

    public function SelectPartijen()
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM partijen");
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
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM stelling");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }

    public function SelectAntwoorden($stelling_id)
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM stelling WHERE id = :stelling_id");
            $statement->bindParam(':stelling_id', $stelling_id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result === false) {
                throw new Exception("Fout bij het uitvoeren van de query.");
            }

            return $result;
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }

    public function getBestMatchingParty($user_id)
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Haal de antwoorden van de gebruiker op
            $statement = $pdo->prepare("SELECT antwoord FROM gebruiker_antwoorden WHERE gebruiker_id = :gebruiker_id");
            $statement->bindParam(':gebruiker_id', $user_id, PDO::PARAM_STR);
            $statement->execute();
            $user_answers = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($user_answers)) {
                throw new Exception("Geen antwoorden gevonden voor gebruiker ID: $user_id");
            }

            // Haal de partij-antwoorden op
            $statement = $pdo->prepare("SELECT * FROM partij_antwoorden");
            $statement->execute();
            $partij_antwoorden = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Bereken de scores voor elke partij
            $scores = [];
            foreach ($partij_antwoorden as $pa) {
                foreach ($user_answers as $ua) {
                    if ($pa['stelling_ID'] == $ua['stelling_id'] && $pa['antwoord'] == $ua['antwoord']) {
                        if (!isset($scores[$pa['partij_ID']])) {
                            $scores[$pa['partij_ID']] = 0;
                        }
                        $scores[$pa['partij_ID']]++;
                    }
                }
            }

            // Zoek de partij met de hoogste score
            $best_party = null;
            $highest_score = -1;
            foreach ($scores as $partij_id => $score) {
                if ($score > $highest_score) {
                    $highest_score = $score;
                    $best_party = $partij_id;
                }
            }

            if ($best_party === null) {
                throw new Exception("Geen partij gevonden die overeenkomt met de antwoorden.");
            }

            // Haal de naam van de beste partij op
            $statement = $pdo->prepare("SELECT naam FROM partijen WHERE id = :partij_id");
            $statement->bindParam(':partij_id', $best_party, PDO::PARAM_INT);
            $statement->execute();
            $party_name = $statement->fetch(PDO::FETCH_ASSOC)['naam'];

            return $party_name;
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