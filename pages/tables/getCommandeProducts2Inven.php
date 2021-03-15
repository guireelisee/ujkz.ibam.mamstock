<?php
  include '../../class/Commande.php';
  include '../../class/Produit.php';
  include '../../class/Categorie.php';
  include '../../class/Helper.php';
  include '../../class/InventaireProduct.php';
  include '../../class/db-connect.php';


  $idCommande = $_POST['idCommande'];

  $achats = InventaireProduct::getAllByInventaireId($idCommande);



?>

    <form method="post">
        <table id="example1" class="table table-bordered table-hover">
            <input type="hidden" value="<?php echo $idCommande ?>" name="idComm2" id="idcom">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité physique</th>
                    <th>Quantité logique</th>
                    <th>Difference</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($achats as $achat): ?>
                    <tr>
                        <td style="padding-top:17px;"><?php echo Helper::getProduitName($achat['idProduit']) ?></td>
                        <td style="padding-top:17px;"><?php echo $achat['quantite'] ?></td>
                        <!--<td style="padding-top:17px;">
                                <button id="delProd" onclick="del2('<?php echo $achat['idProduit'] ?>')" type="button" data-idProd="<?php echo $achat['idProduit'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td> -->
                        <td style="padding-top:17px;">
                            <?php $prod = Produit::findById($achat['idProduit']); echo $prod['stockActuelProduit'];?>
                        </td>
                        <td style="padding-top:17px;"><?php echo $achat['diff'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
        <div class="" style="margin-left: 86%;">
            <button type="submit" name="upgrade" class="btn btn-info">Valider</button>
        </div><br>

    </form>


    <script>


        for (i = 0; i < button.length; i++) {
            button[i].addEventListener('click', function(e){
                var x = button[i].getAttribute('data-idProd');
                alert(x);
            })
        }



    </script>


