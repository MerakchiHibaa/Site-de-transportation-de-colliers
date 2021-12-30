<?php

 include_once 'header.php';
 include_once './helpers/session_helper.php';

?>
      <div class="card ">
        <div class="card-header">
          <h3><i class="fas fa-users mr-2"></i>User list <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
$prenom = $_SESSION['userPrenom'];
if (isset($prenom)) {
  echo $prenom;
}
 ?></span>

          </strong></span></h3>
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th  class="text-center">SL</th>
                      <th  class="text-center">Nom</th>
                      <th  class="text-center">Prenom</th>
                      <th  class="text-center">Email address</th>
                      <th  class="text-center">Numéro de téléphone</th>
                      <th  class="text-center">Status</th>
                      <th  width='25%' class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                 
 <?php 

include_once './controllers/affichControl.php';


$_controller = new affichControl();
$allUser = $_controller->selectAllUserData(); 
                   
                      if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          $i++;

                     ?>

                      <tr class="text-center"
              
                      >

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['nom']; ?></td>
                        


                        <td><?php echo $value['prenom']; ?> <br>
                        <td><?php echo $value['adresse']  ?></td>
                        <td><?php echo $value['numero'] ; ?></td>

                          <?php if ( $value['type']  == 'client'){
                          echo "<span class='badge badge-lg badge-info text-white'>Client</span>";
                        } elseif ($value['type'] == 'transporteur') {
                          echo "<span class='badge badge-lg badge-dark text-white'>Transporteur</span>";
                        } ?></td>
                        <td><?php echo $value['email'] ; ?></td>

                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value['numero']; ?></span></td>
                        <td>
                      
                          <?php if ($value['statut'] == 'certifie') { ?>
                          <span class="badge badge-lg badge-info text-white">Certifié</span>
                        <?php }else if($value['statut']  == 'refuse'){ ?>
                    <span class="badge badge-lg badge-danger text-white">Refusé</span>
                        <?php }
                        else { ?>
                          <span class="badge badge-lg badge-secondary text-white"><?php echo $value['statut'] ; ?></span>

                        } ?>

                        
                        
                            <a class="btn btn-success btn-sm
                            " href="userProfile.php?id=<?php echo $value['ID_user'] ;?>">Voir</a>
                            <a class="btn btn-info btn-sm " href="userProfile.php?id=<?php echo $value['ID_user'] ;?>">Editer</a>
                            <a onclick="return confirm('Vous voulez vraiment supprimer cet utilisateur ?')" class="btn btn-danger btn-sm " href="?remove=<?php echo $value['ID_user'];?>">Supprimer</a>
                            
                             <?php if ($value['statut']  == 'en attente') {  ?>
                               <a onclick="return confirm('Vous voulez changer le statut à <En cours de traitement> ?')" class="btn btn-secondary btn-sm " href="?deactive=<?php echo $value['ID_user'];?>">Changer le statut</a>
                             <?php }  ?>

                        </td>
                      </tr>
                  <?php 
                  } 
                }
              }

                   else{ ?>
                      <tr class="text-center">
                      <td>No user availabe now !</td>
                    </tr>
                    <?php } ?>

                  </tbody>

              </table>









        </div>
      </div>



  <?php
  include '../simple/inc/footer.php';

  ?>
