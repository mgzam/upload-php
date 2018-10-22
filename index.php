<html>
<head></head>
<body>

<table>
                
    <thead> <!-- En-tête du tableau -->
        <tr>
            <th>Nom</th>
            <th>Taille</th>
            <th>Dernière modification</th>
        </tr>
    </thead> 
     
                 
<?php
                    // Fonction human_filesize pour convertir les tailles des fichiers en kB, MB, etc.
function human_filesize($bytes, $decimals = 2) {   
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}                  
                    // Ouverture du dossier "/tmp" afin d'en extraire les noms des fichiers qu'il contient
if($MyDirectory = opendir('/data') or die('Erreur'));{
        while(false !== ($file = readdir($MyDirectory))) {
        if($file != '.' && $file != '..' && $file != '') {
                     
echo '<tr><td><a href="/data/' . $file . '">' . $file . '</a></td>';
         
        $fichier = '/data/' . $file . ''; //astuce qui permet de redonner le chemin de chaque fichier donné par readdir()
if (file_exists($fichier)) {
                    // 2eme colonne : Affiche la taille de chaque fichier:
echo '<td>' .human_filesize(filesize($fichier)).'</td>';
                    // 3eme colonne : Affiche leur date de derniere modification:
echo '<td>'. date ("d M Y, H:i", filemtime($fichier)).'</td></tr>';}
        }
    }
closedir($MyDirectory);
  }
?>
         
</table>
<h4> File uploads </h4>
<form enctype="multipart/form-data" action="upload.php" 
	method="post">
<p>
Select File:
<input type="file" size="35" name="uploadedfile" />
<br />
<input type="submit" name="Upload" value="Upload" />
</p>
</form>
</body>
</html>
