<?php

class video
{

    public string $name = '';
    public string $email = '';
    public int $phone = 0;
    public string $memberstate = 'Keine';
    public string $lendstate = 'Ausgeliehen';
    public string $returndate = '';
    public int $movie_id = 0;
    public string $title = '';



    public function __construct(string $name, string $email, int $phone, string $memberstate, string $returndate, int $movie_id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->memberstate = $memberstate;
        $this->returndate = $returndate;
        $this->movie_id = $movie_id;
        return $this;
    }

    /**
     * Datensatz mit gegebener ID von der Datenbank ins Objekt laden
     */
    public function find(int $id): ?self
    {
        $statement = db()->prepare('SELECT * FROM example WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch();

        if ($result) {
            // Datensatz gefunden? Eigenschaften setzen und Objekt zurückgeben.
            $this->id = $result['id'];
            $this->name = $result['name'];

            return $this;
        }

        // Datensatz NICHT gefunden -> null zurückgeben.
        return null;
    }

    /**
     * Alle Datensätze aus der Datenbank laden.
     */
    public function getAllMovies(): array
    {
        $result = db()->query('SELECT * FROM movies');

        $result = $result->fetchAll();
        return $result;
    }

    public function getAllEntries(): array
    {
        $result = db()->query('SELECT * FROM lending');

        $result = $result->fetchAll();
        return $result;
    }

    public function getEntryTable(): array
    {
        $statement = db()->query('SELECT * FROM lending WHERE lendstate = "Ausgeliehen"');
        $result = $statement->fetchAll();
        return $result;
    }

    /**
     * Erstellt einen neuen Eintrag in der Datenbank.
     */
    public function create()
    {

        $statement = db()->prepare('INSERT INTO `lending` (name,email,phone,memberstate,lendstate,returndate,movie_id) VALUES (:name, :email, :phone, :memberstate, :lendstate, :returndate, :movie_id)');
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':memberstate', $this->memberstate);
        $statement->bindParam(':lendstate', $this->lendstate);
        $statement->bindParam(':returndate', $this->returndate);
        $statement->bindParam(':movie_id', $this->movie_id);
        $statement->execute();
    }

    /**
     * Aktualisiert die aktuellen Daten in der Datenbank.
     */
    public function update($post)
    {
        $statement = db()->prepare('UPDATE `lending` SET name = :name, email = :email, phone = :phone, movie_id = :movie_id, lendstate = :lendstate  WHERE id = :id');
        $statement->bindParam(':name', $post['name']);
        $statement->bindParam(':id', $post['id']);
        $statement->bindParam(':email', $post['email']);
        $statement->bindParam(':phone', $post['phone']);
        $statement->bindParam(':lendstate', $post['lendstate']);
        $statement->bindParam(':movie_id', $post['movie_id']);

        $statement->execute();
    }

    /**
     * Lösche einen Datensatz, entweder mit der angegebenen $id oder falls nicht angegeben, der aktuell geladene.
     */
    public function delete(int $id)
    {
        // Falls keine $id angegeben ist, lösche den aktuell geladenen ($this->id) des Objektes.
        if (!$id) {
            $id = $this->id;
        }

        if ($id > 0) {

            $statement = db()->prepare('DELETE FROM `lending` WHERE id = :id');
            $statement->bindParam(':id', $id);
            $statement->execute();

            // Gib die Anzahl der gespeicherten Datensätze zurück (1 = Erfolg, 0 = Fehler)
            //return $statement->rowCount();
        }

        return 0;
    }

    public function getVideoName(int $id): array
    {
        $statement = db()->prepare('SELECT movies.title FROM movies WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
}
 /* Anwendung: load (SELECT), save (INSERT oder UPDATE) und delete (DELETE).
 */
