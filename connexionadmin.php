<?php

	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

	$database = "items";

	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["button1"]) {
		if ($db_found) {
			$sql = "SELECT * FROM admin";

			    if (($mail == "") || ($mdp=="")){

			    	header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/connexionadminerreur.html");
                    exit;

			    }

				if (($mail != "") && ($mdp!="")) {

					$sql .= " WHERE Mail='$mail' AND Mdp='$mdp'";
					/*if ($mdp != "") {
						$sql .= " AND Motdepasse LIKE '%$mdp%'";
					}*/
				}
				
				
				$result = mysqli_query($db_handle, $sql);

				if (mysqli_num_rows($result) == 0) {

				    header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/connexionadminexistepas.html");
                    exit;

                } else {
					header("Status: 301 Moved Permanently", false, 301);
                    header("Location: http://localhost/acceuiladmin.html");
                    exit;}

        }
			
     	else {
			echo "Database not found";
        }
    }


	mysqli_close($db_handle);

?>
