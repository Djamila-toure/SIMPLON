<?php
try{
    $connection = new PDO('mysql:host=localhost;dbname=participant','toure','h@nia20');
}catch(Exception $e){
    die("Erreur : ".$e->getMessage());
}   
    //affecter les valeur entrer dans le formulaire
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $num=$_POST['telephone'];

    $query="INSERT INTO information (Nom,Prenom,Email,Num) values (?,?,?,?)";
    $prepare2=$connection->prepare($query);
    $prepare2->execute(array($nom,$prenom,$email,$num));
    header("location: page2.php");