<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	$pagetitle = "Lex Corii";
	include "functions.php";
	
	//Überprüfung ob alles richtig ausgefüllt ist in der function.php. Wichtig ist, das selbst wenn Felder nicht richtig ausgefüllt sind, bleibt das bisher eingegebene Daten
	//nicht verschwinden sondern komplett erhalten bleiben.

	$username = $_POST['uid'];
	
	//Username vorhanden 
	$sth = $dbh->prepare("SELECT count(*) as uidvorhanden FROM kunden WHERE username = ?");
	$sth->execute(array($_POST['uid']));
	$uid = $sth->fetch(PDO::FETCH_OBJ);
	
	

	// Eintrag in die Datenbank für KUNDEN und LIEFERADRESSEN	
	if ($vollstaendig == "" && $_POST['uid'] != '') {
		$sth = $dbh->prepare( "INSERT INTO kunden (username, pass, isfemale, vorname, nachname, strasse, plz, ort, email, gebdatum, telefon, land) VALUES
											   (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
		$sth->execute(
				  array(
				  		$_POST['uid'],
    					$_POST['pid1'],
						$_POST['isfemale'],
						$_POST['vorname'],
						$_POST['nachname'],
						$_POST['strasse'],
						$_POST['plz'],
						$_POST['ort'],
						$_POST['email'],
						$_POST['alter'],
						$_POST['telefon'],
						$_POST['land']
						)
					);
		$sth = $dbh->prepare( "INSERT INTO lieferadressen (vorname, nachname, strasse, plz, ort, land, username) VALUES
											   (?, ?, ?, ?, ?, ?, ?)"); 
		$sth->execute(
				  array(				  		
    					$_POST['vorname'],
						$_POST['nachname'],
						$_POST['strasse'],
						$_POST['plz'],
						$_POST['ort'],
						$_POST['land'],
						$_POST['uid']
						)
					);
	} 
 
 	include "header.php";
	
?>
<div id="profil">

<h1><?php echo $pagetitle ?></h1>
    
<?php if (!isset($_POST["abschicken"]) || 
   			$_POST["abschicken"] != "speichern" ||
   			$vollstaendig != "") {
  			
		 
		if ($_POST["abschicken"] == "speichern") { ?>	
			<p>Bitte f&uuml;llen Sie die mit <span class="stern">*</span> gekennzeichneten Benutzerdaten vollst&auml;ndig aus </p>		
			<p>Folgende Angaben fehlen bzw. sind nicht korrekt:<br />
		<?php }?>
		<ul><?php print $vollstaendig; ?></ul>
		</p>
		<?php 
		?>
    	<form method="post" >
    	<input type="hidden" name="from_form" value="1" />
   		     <p><label class="leftcol" for="uid"><span class="stern">*</span>  Username </label> <input name="uid" value="<?php
  		      	if (isset($_POST["uid"]) && 
  		      		is_string($_POST["uid"])) {
  		      			print(htmlspecialchars($_POST["uid"]));
   		     	}
   		     ?>"/><span id="user_free"></span></p>
  		      <p><label class="leftcol" for="pid1"> <span class="stern">*</span>  Passwort</label> <input type="password" name="pid1" /></p>
  		      <p><label class="leftcol" for="pid2"> <span class="stern">*</span>  Passwort wiederholen</label> <input type="password" name="pid2" /></p>
  		      <p><span class="leftcol"></span>
  		            <label><input type="radio" name="isfemale" value="1"
                    <?php
						if (isset($_POST['isfemale']) &&
							$_POST['isfemale'] == 1) {
								print("checked=\"checked\"");
							}
                        ?>
						><span style="margin-left:5px">Frau</span></label>
  		            <label style="margin-left:5px"><input type="radio" name="isfemale" value="0"
                    <?php
						if (isset($_POST['isfemale']) &&
							$_POST['isfemale'] == 0) {
								print("checked=\"checked\"");
							}
                        ?>
                        ><span style="margin-left:5px">Mann</span></label>
 	           </p>		
 		       <p><label class="leftcol" for="vorname"> <span class="stern">*</span>  Vorname</label> <input name="vorname" value="<?php
  		      	if (isset($_POST["vorname"]) && 
  		      		is_string($_POST["vorname"])) {
 		       			print(htmlspecialchars($_POST["vorname"]));
 		       	}
 		       ?>" /></p>
 		       <p><label class="leftcol" for="nachname"><span class="stern">*</span>  Nachname </label> <input name="nachname" value="<?php
		        	if (isset($_POST["nachname"]) && 
		        		is_string($_POST["nachname"])) {
		        			print(htmlspecialchars($_POST["nachname"]));
		        	}
		        ?>" /></p>
 		      <!-- <p><label class="leftcol" for="profil">Profil</label> <textarea name="profil" rows="7" cols="40" ></textarea></p>-->
 		       <p><label class="leftcol" for="strasse"><span class="stern">*</span>  Strasse </label><input  name="strasse" value="<?php
 		       	if (isset($_POST["strasse"]) && 
		        		is_string($_POST["strasse"])) {
  		      			print(htmlspecialchars($_POST["strasse"]));
 		       	}
 		       ?>" /></p>
 		       <p><label class="leftcol" for="plz"><span class="stern">*</span>  Plz </label><input  name="plz" value="<?php
 		       	if (isset($_POST["plz"]) && 
 		       		is_string($_POST["plz"])) {
		        			print(htmlspecialchars($_POST["plz"]));
		        	}
		        ?>" /></p>
		        <p><label class="leftcol" for="ort"><span class="stern">*</span>  Stadt </label><input  name="ort" value="<?php
		        	if (isset($_POST["ort"]) && 
		        		is_string($_POST["ort"])) {
		        			print(htmlspecialchars($_POST["ort"]));
		        	}
		        ?>" /></p>
		        <p><label class="leftcol" for="land"><span class="stern">*</span>  Land </label><input  name="land" value="<?php
   		     	if (isset($_POST["land"]) && 
   		     		is_string($_POST["land"])) {
  		      			print(htmlspecialchars($_POST["land"]));
  		      	}
 		       ?>" /></p>
 		       <p><label class="leftcol" for="alter">Geburtstag</label><input  name="alter" value="<?php
   		     	if (isset($_POST["alter"]) && 
   		     		is_string($_POST["alter"])) {
  		      			print(htmlspecialchars($_POST["alter"]));
  		      	}
 		       ?>" /></p>
 		       <p><label class="leftcol" for="email"><span class="stern">*</span>  E-mail Adresse </label><input  name="email" value="<?php
 		       	if (isset($_POST["email"]) && 
 		       		is_string($_POST["email"])) {
 		       			print(htmlspecialchars($_POST["email"]));
		        	}
		        ?>" /></p>
     		   <p><label class="leftcol" for="telefon">Telefon</label> <input  name="telefon" value="<?php
   		     	if (isset($_POST["telefon"]) && 
   		     		is_string($_POST["telefon"])) {
  		      			print(htmlspecialchars($_POST["telefon"]));
  		      	}
 		       ?>" /></p>    
    		   <p><span class="leftcol"></span>
    		          <input type="submit" name ="abschicken" value="speichern" />
    		   </p>

   		 </form>
    <?php } else {
   		 ?>
   		 <p>Danke! Die Benutzerdaten wurden gespeichert </p>
         <p><a href="login.php">weiter zum Login</a></p>
   	<?php }
   		  ?>
          
</div>

    
<?php include "footer.php"; ?>
