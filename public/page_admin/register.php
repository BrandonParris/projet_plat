<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">

                        <div class="form-group">
                            <label> Nom Prénom </label>
                            <input type="text" name="username" class="form-control" placeholder="Nom Prénom">
                        </div>

                        <div class="form-group">
                            <label> Email </label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label> Mot de passe </label>
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                        </div>

                        <div class="form-group">
                            <label> Confirmer mot de passe </label>
                            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmer mot de passe">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">

<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile Admin
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Ajouter un Admin
            </button>
        </h6>
    </div>
    <div class="card-body">

        <?php 
        if (isset($_SESSION['success']) && $_SESSION['success'] !='')
        {
            echo '<h2>'.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }
        
        ?>
        <div class="table-responsive">

        <?php
            $connection = mysqli_connect("localhost","root","","projetplateforme_laravel");
            $query = "SELECT * FROM register ";
            $query_run = mysqli_query($connection,$query);
        
        ?>
        
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>EDITER</th>
                        <th>SUPPRIMER</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(mysqli_num_rows($query_run)>0)
                {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                       ?>
                    <tr>
                        <td><?php echo $row['id'];  ?></td>
                        <td><?php echo $row['username'];  ?></td>
                        <td><?php echo $row['email'];  ?></td>
                        <td><?php echo $row['password'];  ?></td>
                        <td><button type="submit" class="btn btn-success">EDITER</button></td>
                        <td><button type="submit" class="btn btn-danger">SUPPRIMER</button></td>
                        
                    </tr>
                    <?php  
                    }
                }
                else
                {
                    echo "No record found";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<!-- /.container-fluid -->
 
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>