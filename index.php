<html>
<head></head>
<body>
<h1> File Downloads </h1>
<?php
if ($handle = opendir('/data/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<a href='download.php?file=".$entry."'>".$entry."</a>\n";
        }
    }
    closedir($handle);
}
?>
<h1> File uploads </h1>
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