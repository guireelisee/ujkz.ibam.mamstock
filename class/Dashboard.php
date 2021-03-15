<?php
class Dashboard
{
    public static function getProductsNumber()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM produits");
        $requete->execute();
        $products = $requete->fetchAll();
        return count($products);
    }

    public static function getStockVal()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM produits");
        $requete->execute();
        $products = $requete->fetchAll();
        $valeur = 0;

        foreach ($products as $product) {
            $valeur = $valeur + ($product['prixUnit']*$product['stockActuelProduit']);
        }

        return $valeur;
    }

    public static function getCommendeEnAttente()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM commandes WHERE etatCommande = 0");
        $requete->execute();
        $commande = $requete->fetchAll();

        return count($commande);
    }

    public static function getFactureEnAttente()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM factures WHERE etatFacture = 0");
        $requete->execute();
        $factures = $requete->fetchAll();

        return count($factures);
    }

    public static function getAllProviders()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM fournisseurs");
        $requete->execute();
        $fournisseurs = $requete->fetchAll();

        return count($fournisseurs);
    }

    public static function getAllCustumers()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM clients");
        $requete->execute();
        $clients = $requete->fetchAll();

        return count($clients);
    }

    public static function getAllUsers()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM users");
        $requete->execute();
        $users = $requete->fetchAll();

        return count($users);
    }

    public static function getAllCategorie()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM categories");
        $requete->execute();
        $users = $requete->fetchAll();

        return count($users);
    }

    public static function getTop5Products()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT idProduit, SUM(quantite) qte FROM ventes GROUP BY idProduit ORDER BY SUM(quantite) DESC");
        $requete->execute();
        $products = $requete->fetchAll();
        return $products;


    }


    public static function getAffluenceVente()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM factures");
        $requete->execute();
        return $requete->fetchAll();

    }


    public static function getStockMinProducts()
    {
        include 'db-connect.php';
        $requete = $bdd->prepare("SELECT * FROM produits WHERE stockActuelProduit <= qteProduitMin");
        $requete->execute();
        return $requete->fetchAll();
    }

}




