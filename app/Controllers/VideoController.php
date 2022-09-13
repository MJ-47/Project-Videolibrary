<?php

class VideoController
{

    public function index()
    {

        $videoModel = new Video('', '', 0, '', '', 0);
        $movies = $videoModel->getAllMovies();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movie_id = $_POST['movie_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $memberstate = $_POST['memberstate'];
            $returndate = $_POST['returndate'];

            $name = trim($name);
            $email = trim($email);
            $phone = trim($phone);
            $memberstate = trim($memberstate);
            $returndate = trim($returndate);


            if ($name === '') {
                $errors[] = 'Bitte geben Sie Ihren Namen ein!';
            }

            if ($email === '') {
                $errors[] = 'Bitte geben Sie Ihre Email ein!';
            }

            if ($memberstate === 'Bitte wählen') {
                $errors[] = 'Bitte wählen Sie Ihren Mitgliedstatus aus!';
            }

            if ($movie_id === 'Bitte wählen') {
                $errors[] = 'Bitte wählen Sie den gewünschten Film aus!';
            }

            if ($phone === '') {
                $errors[] = 'Bitte geben Sie Ihre Telefonnummer ein!';
            }

            if (empty($errors)) {
                $videoModel = new Video($name, $email, $phone, $memberstate, $returndate, $movie_id);
                $videoModel->create();
            }
            //$this -> validateInput();
        }

        require "app/Views/videoform.view.php";
    }



    public function list()
    {

        $videoModel = new Video('', '', 0, '', '', 0);
        $videoEntries = $videoModel->getEntryTable();
        require "app/Views/videolist.view.php";
    }

    public function edit()
    {
        $videoModel = new Video('', '', 0, '', '', 0);
        $movies = $videoModel->getAllMovies();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $NEWmovie_id = $_GET['movie_id'];
            $name = $_GET['name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            $lendstate = $_GET['lendstate'];


            $name = trim($name);
            $email = trim($email);
            $phone = trim($phone);
            $lendstate = trim($lendstate);


            if ($name === '') {
                $errors[] = 'Bitte geben Sie den Namen ein!';
            }

            if ($email === '') {
                $errors[] = 'Bitte geben Sie die Email ein!';
            }

            if ($NEWmovie_id === 'Bitte wählen') {
                $errors[] = 'Bitte wählen Sie den gewünschten Film aus!';
            }

            if ($lendstate === '') {
                $errors[] = 'Bitte wählen Sie einen Leihstatus aus!';
            }

            //$this -> validateInput();
        }

        require "app/Views/videoedit.view.php";
    }

    public function delete()
    {
        $videoModel = new Video('', '', 0, '', '', 0);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            //$this -> validateInput();
            $videoModel->delete($_GET['id']);
        }

        header('LOCATION: /project/videolist');
    }

    public function update()
    {
        $videoModel = new Video('', '', 0, '', '', 0);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $movie_id = $_GET['movie_id'];
            $name = $_GET['name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            $lendstate = $_GET['lendstate'];


            $name = trim($name);
            $email = trim($email);
            $phone = trim($phone);
            $lendstate = trim($lendstate);
            $videoModel->update($_GET);
        }


        header('LOCATION: /project/videolist');
    }

    public function getLendState($returnDate): string
    {
        $nowDate = date("j/n/Y");

        if ($nowDate === $returnDate || $nowDate < $returnDate) {
            return "\u{1F601}";
        } else if ($nowDate > $returnDate) {
            return "\u{1F620}";

        }
    }
}
