<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausgeleihte Videos</title>
    <script></script>
    <base href="<?= ROOT_URL ?>/">
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }

        table,
        tr,
        th {
            border: 1px solid black;
            text-align: left;
        }

        table {
            width: 80%;
        }

        th,
        td {
            padding: 5px; 
        }

        button {
            width: 100%;
            border: none;
            margin: 10px 5px;
            padding: 8px;
            border-radius: 3px;
            color: white;
            background-color: #2db56f;
        }

        button:hover {
            width: 100%;
            border: none;
            margin: 10px 5px;
            padding: 8px;
            border-radius: 3px;
            color: white;
            background-color: #1f804e;
            cursor: pointer;
        }


        .list-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }


        .list-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        }

        .list-table tbody tr {
        border-bottom:  solid #dddddd;
        }


        .list-table td{
        padding: 12px 15px;
        }

    </style>
</head>

<body>
    <div class="container">
         <h1>
            Ausgeliehene Videos
        </h1>
    </div>
       

    <form action="/project/videoedit" method="GET">
        <table class="list-table">
          <thead>
            <tr>
                <td>
                    <div>Name</div>
                </td>
                <td>
                    <div>Email</div>
                </td>
                <td>
                    <div>Telefon</div>
                </td>

                <td>
                    <div>Mitgliedschaftsstatus</div>
                </td>

                <td>
                    <div>Rückgabedatum</div>
                </td>

                <td>
                    <div>Ausleihfrist</div>
                </td>

                <td>
                    <div>Ausleihstatus</div>
                </td>

                <td>
                    <div>Ausleih-Video</div>
                </td>

                <td>
                    <div></div>
                </td>
                
                <td>
                    <div></div>
                </td>

            </tr>
         </thead>
         <tbody>
            <?php foreach ($videoEntries as $entry) : ?>
                <tr>
                    <td><?= htmlspecialchars($entry['name'], ENT_QUOTES, 'UTF-8');  ?></td>
                    <td><?= htmlspecialchars($entry['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($entry['phone'], ENT_QUOTES, 'UTF-8');?></td>
                    <td><?= htmlspecialchars($entry['memberstate'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($entry['returndate'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= ($this->getLendState($entry['returndate']));?></td>
                    <td><?= htmlspecialchars($entry['lendstate'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <?php ?>
                    <td><?php echo $videoModel->getVideoName($entry['movie_id'])["title"];?></td>
                    <td><a href="videoedit?id=<?=$entry['id']?>&name=<?=$entry['name']?>&email=<?=$entry['email']?>&phone=<?=$entry['phone']?>&movie_id=<?=$entry['movie_id']?>&lendstate=<?=$entry['lendstate']?>">Bearbeiten</a></td>
                    <td><a href="videodelete?id=<?=$entry['id']?>">Löschen</a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a href="">Eintrag erfassen</a>
    </form>

    <!--</*?php foreach($title as $s):?*/>
        <td></*?=$s;?*/></td>
    </*?php endforeach;?*/>-->

</body>

</html>