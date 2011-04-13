<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	//Usernamen Abfrage für den Login

	$pagetitle = "Lex Corii";
	include "functions.php";
	
	if (isset($_POST['uid'])) {
		$username = $_POST['uid'];
		$passwort =	$_POST['pid1'];
		if(strlen($username) > 0 and check_login($username,	$passwort)){
			$_SESSION['USER'] = $username;
			header("Location: index.php");
			exit;
		} else {
			$error = 'wrong_username_password';
		}
	}

    include "header.php";
?>

<div id="profil">
	<h3>
		<?php if (isset($error) && $error == 'wrong_username_password'): ?>
			Benutzername und/oder Passwort ist leider falsch!
		<?php else: ?>
 			Bitte loggen Sie sich ein!
 		<?php endif ?>
	</h3>
	<form action="login.php" method="post">
   		<p><label class="leftcol" for="uid" style="width:100px"><span class="stern">*</span>  Username </label> <input name="uid" value="<?php
  		      	if (isset($_POST["uid"]) && 
  		      		is_string($_POST["uid"])) {
  		      			print(htmlspecialchars($_POST["uid"]));
   		     	}
   		     ?>"/></p>
  		<p><label class="leftcol" for="pid1" style="width:100px"> <span class="stern">*</span>  Passwort</label> <input type="password" name="pid1" /></p><br />
		<p><input type="submit" name ="login" value="login" /></p>
    </form>
    
</div>
	
<?php include "footer.php"; ?>
