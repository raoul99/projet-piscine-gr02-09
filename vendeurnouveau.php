<?php

	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $imagep = isset($_POST["imagep"])? $_POST["imagep"] : "";
    $back = isset($_POST["back"])? $_POST["back"] : "";

	$database="items";

	 $db_handle = mysqli_connect('localhost', 'root', '');
     $db_found = mysqli_select_db($db_handle, $database);
     if ($_POST["button1"]) {
          if ($db_found) {
             $sql = "SELECT * FROM vendeur";
             if ($pseudo=="" || $mail=="" || $mdp=="" || $imagep=="" || $back=="") {
                 header("Status: 301 Moved Permanently", false, 301);
                 header("Location: http://localhost/inscrvendeurerreur.html");
                 exit;
             }
             if ($mail != "") {
                 
                 $sql .= " WHERE Mail LIKE '%$mail%'";
                
             }
             $result = mysqli_query($db_handle, $sql);
             
             if (mysqli_num_rows($result) != 0) {
                 
                 header("Status: 301 Moved Permanently", false, 301);
                 header("Location: http://localhost/inscrvendeurcompteexistedeja.html");
                 exit;
             } else {
                 $sql = "INSERT INTO vendeur (Pseudo, Mail, Mdp, Imagep, Background)
                         VALUES('$pseudo','$mail','$mdp', '$imagep', '$back')";
                 $result = mysqli_query($db_handle, $sql);
                 header("Status: 301 Moved Permanently", false, 301);
                 header("Location: http://localhost/connexionvendeur.html");
                
                
                
             }
         } else {
             echo "Database not found";
         }
     }
     
     mysqli_close($db_handle);
?>
