<!DOCTYPE html>
<html >
<head>
   <!-- Les élements suivants permettent d'appeller Bootstrap -->
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">  
   <link rel="stylesheet" type="text/css" href="affiche.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <script type="text/javascript">      
        $(document).ready(function(){           
            $('.header').height($(window).height());      
        }); 
     </script>
   <title>Déposer votre item</title>   
</head>


<body style="background-color:  #424242 ">

     <div class="row">
        <!-- on défini les caractéristiques de ce block  -->
          <div class="col-sm-12" style="height:90px; background-color: #4B4A47 ">
                   <!-- on insere le logo  -->
                   <a href="paged'acceuil.html"><img src="../images/logo.png" class="img-fluid" height="70" width="300"></a>
                   <!-- on insere la barre de recherche  -->
                   <button style="background-color: #06A28F; color: white; float:right; margin-top: 30px; margin-right: 5px"><font face="Berlin Sans FB">Rechercher</font></button>
                   <input type="search" style="width: 600px; float:right; margin-top: 30px; margin-right: 5px"  name="rechercher">
          </div>
     </div>

     <nav class="navbar sticky-top navbar-expand-xl" style="width:1368px">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
             <ul class="navbar-nav">
               <li class="nav-item active">
                    <a class="nav-link" href="paged'acceuil.html"><b>Acceuil</b></a>
                  </li>
               <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Catégories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Ferrailles ou Trésor</a>
                              <a class="dropdown-item" href="#">Bon pour le Musée</a>
                              <a class="dropdown-item" href="#">Accessoires VIP</a>
                            <div class="dropdown-divider"></div>
                            </div>
                    </li>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Achats
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Enchères</a>
                              <a class="dropdown-item" href="#">Achetez-le Maintenant</a>
                              <a class="dropdown-item" href="#">Meilleure Offre</a>
                            <div class="dropdown-divider"></div>
                            </div>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="./Vendre/vendre.html"><center>Vendre</center></a>';
                 </li>                        
                 <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Se connecter
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="Connexion/Votre Compte/connexionclient.html">Votre compte</a>
                              <a class="dropdown-item" href="Connexion/Vendeur/connexionvendeur.html">Vendeur</a>
                              <a class="dropdown-item" href="Connexion/Administrateur/connexionadmin.html">Administrateur</a>
                            <div class="dropdown-divider"></div>
                            </div>

                    </li>  
             </ul>
         </div>
     </nav>

     <br>

     <div class="container features">
          <div class="col-lg-12 col-md-4 col-sm-12">
          <center><font size="3%">
                <div class="description">       
                         <h1>Gerer vos items</h1>
                



<?php 
    $id = isset($_POST["id"])? $_POST["id"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $dscr = isset($_POST["dscr"])? $_POST["dscr"] : "";
    $cat = isset($_POST["cat"])? $_POST["cat"] : "";
    $vnt = isset($_POST["vnt"])? $_POST["vnt"] : "";
    $vnt2 = isset($_POST["vnt2"])? $_POST["vnt2"] : "";

    $prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $photo = isset($_POST["photo"])? $_POST["photo"] : "";
    $vid = isset($_POST["vid"])? $_POST["vid"] : "";

    $erreur= "";
   

    if ($id == "") {
        $erreur .= "Id est vide. <br>"; }

    if ($nom == "") {
        $erreur .= "Nom est vide. <br>"; }

    if ($cat == "") {

        $erreur .= "Categorie est vide. <br>"; }

    if ($vnt == "") {

        $erreur .= "Type de vente est vide. <br>"; }
    if ($prix == "") {

        $erreur .= "Prix est vide. <br>"; }
    if ($photo == "") {

        $erreur .= "Photo est vide. <br>"; }




    $database="items";

     

     $db_handle = mysqli_connect('localhost', 'root', '');
     $db_found = mysqli_select_db($db_handle, $database);
if($erreur == ""){
     if ($_POST["button1"]) {
          if ($db_found) {
             $sql = "SELECT * FROM item";
             if ($id != "") {
                 
                 $sql .= " WHERE Id='$id'";
                
             }
             $result = mysqli_query($db_handle, $sql);
             
             if ((mysqli_num_rows($result) != 0))  {
                 
                 echo "Un item avec le meme id a déja été crée ";
                }
          /*  else if((mysqli_num_rows($result) != 0) && (($id == "") || ($cat == "") || ($prix == "") || ($vnt == "") || ($nom == "") || ($photo == ""))){
           

                echo "Un ou plusieurs champs sont vides";
            }*/

              else {

                if (($vnt == "encheres" && $vnt2 == "meilleurprix") || ($vnt2 == "encheres" && $vnt == "meilleurprix")) {
                    echo "Erreur un item ne peut pas être vendu aux encheres et au meilleur prix <br>";
                    }

                else{
                    $sql = "INSERT INTO item (Id, Nom, Description, Categorie, Vente, Vente2, Prix, photos, videos)
                         VALUES('$id','$nom','$dscr', '$cat', '$vnt', '$vnt2', '$prix', '$photo', '$vid')";
                    $result = mysqli_query($db_handle, $sql);
                     echo "Add successful." . "<br>";}
                  
                 $sql = "SELECT * FROM item";
                 if ($id != "") {
                     
                     $sql .= " WHERE Id LIKE '%$id%'";
                     if ($nom != "") {
                         $sql .= " AND Nom LIKE '%$nom%'";
                     }
                 }

                 $result = mysqli_query($db_handle, $sql);

                 while ($data = mysqli_fetch_assoc($result))  {
                     echo "Informations sur l'item ajouté:" . "<br>";
                     echo "ID: " . $data['Id'] . "<br>";
                     echo "NOM: " . $data['Nom'] . "<br>";
                     echo "DESCRIPTION: " . $data['Description'] . "<br>";
                     echo "CATEGORIE: " . $data['Categorie'] . "<br>";
                     echo "Type de vente: " . $data['Vente'] . "<br>";
                     echo "Type de vente 2: " . $data['Vente2'] . "<br>";
                     echo "Prix: " . $data['Prix'] . "<br>";
                     echo "photos: " . $data['photos'] . "<br>";
                     echo "videos: " . $data['videos'] . "<br>";

                     
                    
                     echo "<br>";
                }
                  
             }
         } else {
             echo "Database not found";
         }
     }
    }
    else
    {
        echo "Erreur : $erreur";
    }

     
     mysqli_close($db_handle);
?>
                     
                   </div> 
     
               </font></center>
          </div>
     </div>
</body>
</html>



