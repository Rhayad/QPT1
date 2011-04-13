<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

	//einfacher Tabellenaufbau für die Galerie
    $pagetitle = "Lex Corii";

    include "functions.php";	
	include "header.php";
?>
<link href="style.css" rel="stylesheet" type="text/css" />

    
    <h1>Videogalerie</h1>
    
<table> 
     <tr>
    	<td><img class="artikelbilder1" src="images/assasine/thn/assasine8thn.jpg" alt="...Die Assasine..." /></td>
        <td><h3 style="text-decoration:underline">Die Assasine</h3>
        	<p class="galerietext">Am Tage h&auml;lt sie sich versteckt und kommt erst nach der D&auml;mmerung heraus. Der Schatten ist Gef&auml;hrte und
            mit dem Hinterhalt bringt sie den Tod. Ich kann nur f&uuml;r Dich hoffen, mein Freund, dass Du nicht der N&auml;chste bist auf ihrer Liste...
            </p>
            <a href="videoassasine.php">&lt; zum Video &gt;</a>
        </td>
	</tr>
</table>


<?php include "footer.php"; ?>
