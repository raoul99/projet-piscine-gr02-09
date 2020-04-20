<!DOCTYPE html>
<html>
<head>
	<!-- Les élements suivants permettent d'appeller Bootstrap -->
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">  
   <link rel="stylesheet" type="text/css" href="acceuilvendeur.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</script>
	<title>Connexion Vendeur</title>
</head>

			    <?php

                  

	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";


	$database = "items";

	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["button1"]) {
		if ($db_found) {
			$sql = "SELECT * FROM vendeur";
                
				if (($mail == "") || ($pseudo == "") || ($mdp == "")) {

					header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/connexionvendeurerreur.html");
                    exit;
				}


				if (($mail != "") && ($pseudo != "") && ($mdp != "")) {

					$sql .= " WHERE Mail='$mail' AND Pseudo='$pseudo' AND Mdp='$mdp'";
					
					

				}
				
				
				$result = mysqli_query($db_handle, $sql);

				if (mysqli_num_rows($result) == 0) {

					header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/connexionvendeurcompteexistepas.html");
                    exit;}
				else

                   {

                    $result = mysqli_query($db_handle, $sql);
				
					
					  $sql = "SELECT * FROM vendeur";

				    
				    
                 

                if ($mail != "") {
                     //on cherche le compte avec les paramètres titre et auteur
                     $sql .= " WHERE Mail LIKE '%$mail%'";
                     if ($mdp != "") {
                         $sql .= " AND Mdp LIKE '%$mdp%'";
                     }
                     if ($pseudo != "") {
                         $sql .= " AND Pseudo LIKE '%$pseudo%'";
                     }
                 }


                 $result = mysqli_query($db_handle, $sql);
                 

                

                 while ($data = mysqli_fetch_assoc($result))  {
                        echo "<tr>";
                        $image2=$data['Background'];
                        

                 }
 

                }

	       
	    }else {
			    echo "Database not found";
        }

    }

	    mysqli_close($db_handle);
?>

<body style="background-image: url('<?php echo "$image2"; ?>'); background-repeat: no-repeat; background-size: cover;">

	<div class="row">
        <!-- on défini les caractéristiques de ce block  -->
		<div class="col-sm-12" style="height:90px; background-color: #4B4A47 ">
			    <!-- on insere le logo  -->
			    <a href="paged'acceuil.html"><img src="../../images/logo.png" class="img-fluid" height="70" width="300"></a>
			    <!-- on insere la barre de recherche  -->
			    <button style="background-color: #06A28F; color: white; float:right; margin-top: 30px; margin-right: 5px"><font face="Berlin Sans FB">Rechercher</font></button>
			    <input type="search" style="width: 600px; float:right; margin-top: 30px; margin-right: 5px"  name="rechercher">
		</div>
	</div>


<div class="col-lg-12 col-md-4 col-sm-12" style="background-color: #485550  ">
	    	<center><font size="3%">
                      
			        <h1 style="color: white; font:Aparajita";><strong>Bienvenue sur votre page de connexion cher vendeur !</strong> </h1>
             
</div>
<div class="container features">
		<div class="col-lg-12 col-md-4 col-sm-12" >
	    	<center><font size="3%">
                <div class="description">       
			        <h4><strong>eBay ECE c'est maintenant que votre aventure commence !</strong></h4>
			        <h5>Ici, vous pouvez ajouter ou supprimer des produits a vendre</h5>                 
			    </div> 
			    <div class="col-lg-6 col-md-4 col-sm-12" style="background-color: white; height: 300px; padding: 25px 25px">
			    <?php

                  

	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";


	$database = "items";

	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["button1"]) {
		if ($db_found) {
			$sql = "SELECT * FROM vendeur";
                
				if (($mail == "") || ($pseudo == "") || ($mdp == "")) {

					header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/connexionvendeurerreur.html");
                    exit;
				}


				if (($mail != "") && ($pseudo != "") && ($mdp != "")) {

					$sql .= " WHERE Mail='$mail' AND Pseudo='$pseudo' AND Mdp='$mdp'";
					
					

				}
				
				
				$result = mysqli_query($db_handle, $sql);

				if (mysqli_num_rows($result) == 0) {

					header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/connexionvendeurcompteexistepas.html");
                    exit;}
				else

                   {

                    $result = mysqli_query($db_handle, $sql);
				
					
					  $sql = "SELECT * FROM vendeur";

				    
				    
                 

                if ($mail != "") {
                     //on cherche le compte avec les paramètres titre et auteur
                     $sql .= " WHERE Mail LIKE '%$mail%'";
                     if ($mdp != "") {
                         $sql .= " AND Mdp LIKE '%$mdp%'";
                     }
                     if ($pseudo != "") {
                         $sql .= " AND Pseudo LIKE '%$pseudo%'";
                     }
                 }


                 $result = mysqli_query($db_handle, $sql);
                 

                 echo "<table border='3'>";
                 echo "<tr>";
                 echo "<th>" . "PHOTO PROFIL" . "</th>";
                 echo "<th>" . "NOM DU VENDEUR" . "</th>";
                 
                 echo "</tr>";

                 while ($data = mysqli_fetch_assoc($result))  {
                        echo "<tr>";
                        $image=$data['Imagep'];
                        echo "<td>" . "<img src='$image' height='200' width='300'>"."</td>";
                        echo "<td>" . $data['Pseudo'] . "</td>";
                        echo "</tr>";
   

                 }
                       echo "</table>";

                echo "<a href='vendre.html' style='color:black'>"."<strong>"."AJOUTER UN ITEM"."</strong>"."</a>"."&nbsp"."&nbsp";

                echo "<a href='gestion.html' style='color:black'>"."<strong>"."SUPPRIMER UN ITEM"."</strong>"."</a>"."&nbsp";
                

               



                }

                
                


	       
	    }else {
			    echo "Database not found";
        }

    }




	    mysqli_close($db_handle);
?>

				</div>



				<div class="description_bouton">
		            <h5><b> Si vous rencontrez des difficultes pendant votre connexion, n'hesitez pas a contacter le service au vendeur d'eBay ECE</b></h5>
				</div>
				</font></center>
		</div>
	</div>
</body>
</html>
