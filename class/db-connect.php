<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=GestionStock', 'root', '');
        // set the PDO error mode to exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
