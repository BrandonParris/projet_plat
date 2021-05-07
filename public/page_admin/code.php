<?php
session_start();
$connection = mysqli_connect("localhost","root","","projetplateforme_laravel");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO register (username,email,password) VALUES('$username','$email','$password')";
        $query_run = mysqli_query($connection,$query);

        if ($query_run)
        {
            //echo "Sauvegardé";
            $_SESSION['success'] = "Profile Admin ajouté";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Echec de l'ajout du profile";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Les mots de passe ne correspondent pas";
        header('Location: register.php');
    } 
}

?>