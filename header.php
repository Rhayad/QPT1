<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	//allgemeine Header mit den Navigationsleisten für den User und den Shopbereich. Außerdem einen eigenen Admin-Link wo im weiteren Verlauf neue Artikel angelegt werden können
	//später Rechnungen verwaltet werden etc.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $pagetitle ?></title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="jquery.hintbox.css" />
    
    
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/slimbox2.js"></script>
	<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
    
</head>
<body>
	<div id="loginhead">
  		<div id="loginheadnavi">
          <ul>
            <?php if (isset($_SESSION['USER'])): ?>
                <li><a href="profil.php">Profil</a></li>
            	<li><a href="logout.php">logout</a></li>
                <li><a href="warenkorb.php">Warenkorb</a></li>
                <li><a href="merkliste.php">Merkliste</a></li>  
            <?php else : ?>
            	<li><a href="register.php">Registrieren</a></li>
                <li><a href="login.php">Login</a></li>
            <?php endif ?>
          </ul>
      </div>
	</div>
  <div id="main">
  	<div id="mainnavi">
        <ul>
        	<li><a href="index.php">Startseite</a></li>
            <?php if ($_SESSION['USER'] == "Rhayad") : ?>
            <li><a href="admin.php">Adminbereich</a></li>
            <?php endif ?>
            <li><a href="produkte.php">Lederprodukte</a></li>
            <li>
            	<ul>
                	<li><a href="armschienen.php">Armschienen</a></li>
                    <li><a href="mieder.php">Mieder</a></li>
                    <li><a href="schulterplatte.php">Schulterplatten</a></li>
                    <li><a href="torso.php">Torsor&uuml;stungen</a></li>
                    <li><a href="halsband.php">Halsb&auml;nder</a></li>
                    <li><a href="guertel.php">H&uuml;ftg&uuml;rtel</a></li>
                    <li><a href="waffenhalter.php">Waffenhalter</a></li>
                    <li><a href="sets.php">R&uuml;stungssets</a></li>
                    <li><a href="zubehoer.php">Zubeh&ouml;r</a></li>
                </ul>
            </li>
            <li><a href="galerie.php">Galerie</a></li>
            <li>
            	<ul>
                	<li><a href="patrouille1.php">Die Elfenpatrouille</a></li>
                    <li><a href="assasine.php">Die Assasine</a></li>
                    <li><a href="magier.php">Der Magier</a></li>
                    <li><a href="kundenbilder.php">Kundengalerie</a></li>
                </ul>
            </li>
            <li><a href="video.php">Videos</a></li>
            <li>
            	<ul>
                	<li><a href="videoassasine.php">Die Assasine</a></li>
                </ul>
            </li>
        </ul>
    </div>
  	<div id="maininbox">
  

