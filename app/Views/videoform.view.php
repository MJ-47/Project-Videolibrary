<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./public/js/app.js"></script>
    <base href="<?= ROOT_URL ?>/">
    <title>Erfassen</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18pt;
        }

        body {
            background: linear-gradient(to right, turquoise, rgb(94, 69, 182));
        }

        h1 {
            font-size: 40px;
            color: white;
            text-decoration: underline;
        }

        .full-form {
            margin-top: 2em;
            width: 80%;
            max-width: 550px;
            margin: 2em auto 0;
        }

        label {
            transition: .2s all ease-in;
            color: #e33714;
            display: block;
        }

        .full-form input {
            height: 25px;
            margin-bottom: 10px;
        }

        .full-form button[type="submit"] {
            width: 100%;
            border: none;
            margin: 10px 5px;
            padding: 8px;
            border-radius: 3px;
            color: white;
            background-color: #006ed5;
        }

        .full-form button[type="submit"]:hover {
            background: #004688;
            cursor: pointer;
        }
    </style>


</head>

<body>

    <section class="full-form">

        <form action="" method="POST">

            <h1>Videothek</h1>

            <h3>Ausleihe erfassen</h3>

            <div>
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" value="">
                <div></div><?php ?>
            </div>

            <div>
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" value="">
            </div>

            <div>
                <label for="phone">Telefon*</label>
                <input type="text" id="phone" name="phone" value="">
            </div>

            <div>
                <label for="memberstate">Mitgliedschafts-Status*</label>
                <select id="memberstate" name="memberstate" onchange="getdate()">
                    <option selected value="Bitte wählen">Bitte wählen</option>
                    <option value="Keine">Keine</option>
                    <option value="Bronze">Bronze</option>
                    <option value="Silber">Silber</option>
                    <option value="Gold">Gold</option>
                </select>
            </div>

            <div>
                <label for="returndate">Rückgabedatum</label>
                <input type="text" id="returndate" name="returndate" value="" readonly>
            </div>


            <label for="movie_id">Ausleih-Video*</label>
            <select class="movies" id="movie_id" name="movie_id">
                <option selected value="Bitte wählen">Bitte wählen</option>
                <?php foreach ($movies as $movie) : ?>
                    <option value='<?= $movie['id']; ?>'><?= $movie['title']; ?></option>
                <?php endforeach ?>
            </select>
            <button onclick="validateForm();" type="submit">Speichern</button>
            <a href="videolist">Liste anzeigen</a>
        </form>

        <ul>
            <?php foreach($errors as $error):?>
                <li><?= $error?></li>
            <?php endforeach;?>
        </ul>

    </section>
    <pre id="errors">
    </pre>

</body>

</html>