<?php

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], '/mnt/')) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
?>
