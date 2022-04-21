<?php
  session_start();

  if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['pass'];

    require('../Database/Database.php');
      $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
      if(mysqli_connect($host, $server_username, $server_pass,$base ))
          
      $x = mysqli_query($conn,$sql);    
              if(mysqli_num_rows($x) == 1){
                  $_SESSION['username'] = $username;
                  header('Location: ../../index.php');
                } 
                else {
                  header('Location: ../../login.php');
                }
            }  
?>