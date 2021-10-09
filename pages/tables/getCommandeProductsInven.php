<?php
include '../../class/Commande.php';
include '../../class/Produit.php';
include '../../class/Categorie.php';
include '../../class/Helper.php';
include '../../class/InventaireProduct.php';
include '../../class/Inventaire.php';
include '../../class/db-connect.php';


$idCommande = $_POST['idCommande'];

$achats = InventaireProduct::getAllByInventaireId($idCommande);



?>

<table id="example1" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité physique</th>
            <th>Quantité logique</th>
            <th>Difference</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $id = [];
        foreach ($achats as $achat) {
            if (in_array($achat['idProduit'], $id) != true) {
        ?>
                <tr>
                    <td style="padding-top:17px;"><?php echo Helper::getProduitName($achat['idProduit']) ?></td>
                    <td style="padding-top:17px;">
                        <?php $prod = Inventaire::getValue($idCommande, $achat['idProduit'], 'quantite')[0]['quantite'] - Inventaire::getValue($idCommande, $achat['idProduit'], 'diff')[0]['diff'];
                        echo $prod; ?>
                    </td>
                    <td style="padding-top:17px;"><?php
                                                    $somme = Inventaire::sommeQte('inventairesproducts', $idCommande, $achat['idProduit'])[0]['qteTotale'];
                                                    echo $somme;
                                                    ?></td>
                    <td style="padding-top:17px;">
                        <?php
                        if (Inventaire::getValue($idCommande, $achat['idProduit'], 'diff')[0]['diff'] > 0) {
                            echo '+';
                        }
                        echo Inventaire::getValue($idCommande, $achat['idProduit'], 'diff')[0]['diff'];
                        ?>
                    </td>
                </tr>
        <?php
            }
            $id[] = $achat['idProduit'];
        }
        ?>
    </tbody>

</table>

<script>
    for (i = 0; i < button.length; i++) {
        button[i].addEventListener('click', function(e) {
            var x = button[i].getAttribute('data-idProd');
            alert(x);
        })
    }
</script>
