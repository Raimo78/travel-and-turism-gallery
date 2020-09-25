<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

$errors = [];

// Check for fake image
if (isset($_POST['submit'])){
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if ($check == false){
        $errors[] = 'File is fake image';
    }
}

// Check for file format
$image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);
if ($image_file_type != 'jpg' && $image_file_type != 'jpeg'){
    $errors[] = 'Sorry, only jpeg-files are allowed!';
}

// Check for file size
if ($_FILES['fileToUpload']['size'] > 500000000) {
    $errors[] = 'Sorry, file is too large!';
}

// Check if file exists
if (file_exists($target_file)){
    $errors[] = 'Sorry, file already exists!';
}

if (count($errors) > 0){
    foreach ($errors as $error){
        echo $error."<br>";
    }
} else {

    // No errors! Lets move file!
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        // Tallennus XML-tiedostoon
        include_once 'my_functions.php';
        saveDataToXML($_POST, basename( $_FILES["fileToUpload"]["name"] ));

    } else {
        echo "Tiedoston siirtämisessä tapahtui virhe!";
    }
}