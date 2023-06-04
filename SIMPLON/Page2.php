<?php
session_start();
try {
    $connect= new PDO("mysql:host= mysql-toure.alwaysdata.net;dbname=toure_hania","toure","h@nia20");
} catch(Exception $e) {
    die("Erreur : ".$e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter la liste des participants</title>
    <link rel="stylesheet" href="page2.css">
</head>
<body>
    <nav>
        <ul>
            <li>
                <label for="search">Recherche:</label>
                <input type="search" name="search" id="search" oninput="filterTable()" required/>
            </li>
        </ul>
    </nav>
        <Strong> <h1>LISTE DES PARTICIPANTS - SIMPLON CÔTE D'IVOIRE </h1></Strong>

    <table id="participants-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Numéro de téléphone</th>
                <th>Adresse email</th>
            </tr>
        </thead>
        <tbody>
                <?php
                $req = "SELECT * FROM information";
                $prep = $connect->prepare($req);
                $prep->execute();
                $donnees = $prep->fetchAll();
                foreach($donnees as $result) {
                ?>
                <tr>
                    <td><?= $result["Nom"]; ?></td>
                    <td><?= $result["Prenom"]; ?></td>
                    <td><?= $result["Num"]; ?></td>
                    <td><?= $result["Email"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>

    <script>
        function filterTable() {
            // Récupérer la valeur saisie dans la barre de recherche
            var searchInput = document.getElementById("search").value.toLowerCase();

            // Récupérer les lignes du tableau des participants
            var table = document.getElementById("participants-table");
            var rows = table.getElementsByTagName("tr");

            // Parcourir les lignes du tableau et masquer celles qui ne correspondent pas à la recherche
            for (var i = 0; i < rows.length; i++) {
                var name = rows[i].getElementsByTagName("td")[0];
                if (name) {
                    var nameValue = name.textContent.toLowerCase();
                    if (nameValue.indexOf(searchInput) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>