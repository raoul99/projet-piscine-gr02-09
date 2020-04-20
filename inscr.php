
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$ad = isset($_POST["ad"])? $_POST["ad"] : "";
	$pays = isset($_POST["pays"])? $_POST["pays"] : "";
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
	$tel = isset($_POST["tel"])? $_POST["tel"] : "";
	$carte = isset($_POST["carte"])? $_POST["carte"] : "";
	$num = isset($_POST["num"])? $_POST["num"] : "";
	$nomc = isset($_POST["nomc"])? $_POST["nomc"] : "";
	$date = isset($_POST["date"])? $_POST["date"] : "";
	$code = isset($_POST["code"])? $_POST["code"] : "";


	$database="items";
     $db_handle = mysqli_connect('localhost', 'root', '');
     $db_found = mysqli_select_db($db_handle, $database);
	
 
        if ($_POST["button1"]) {
          if ($db_found) {
            if ($nom=="" || $prenom=="" || $ad="" || $pays=="" || $mail=="" || $mdp=="" || $tel=="" || $carte=="" || $num=="" || $nomc=="" || $date=="" || $code=="") {
                header("Status: 301 Moved Permanently", false, 301);
                header("Location: http://localhost/inscriptionerreur.html");
                exit;
            }
             
                
             $sql = "SELECT * FROM client";
             if ($mail != "") {
                 
                 $sql .= " WHERE Mail LIKE '%$mail%'";
                
             }
             $result = mysqli_query($db_handle, $sql);
             
             if (mysqli_num_rows($result) != 0) {
                 
                header("Status: 301 Moved Permanently", false, 301);
                header("Location: http://localhost/inscriptioncompteexistedeja.html");
                exit;
             } else {
                 $sql = "INSERT INTO client (Nom, Prenom, Adresse, Pays, Mail, Motdepasse, Numerodetelephone, Typedecarte, Numerodelacarte, Nomaffichedanslacarte, expiration, Codedesecurite)
                         VALUES ('$nom', '$prenom', '$ad', '$pays', '$mail', '$mdp', '$tel', '$carte', '$num', '$nomc', '$date', '$code')";
                 $result = mysqli_query($db_handle, $sql);
                header("Status: 301 Moved Permanently", false, 301);
                header("Location: http://localhost/paged'acceuil.html");
                exit;
                  
               
             }
            } else {
             echo "Database not found";
            }
        }
     
     mysqli_close($db_handle);
?>


