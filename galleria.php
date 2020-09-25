<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel and Turism Gallery</title>

    <style>
    
    h1
     {font-size: 80px;}
    
    h1 {
    text-align:center;
}
    
    h2 {font-size: 48px;}

    h2 {
    text-align:center;
}

    h3 {font-size: 48px;}

    h4 {font-size: 48px;}

    h5 {font-size: 48px;}
   
    .myPic {
        width: 60%;
    }

    body {
    background-image: url("mountain.jpg");
    background-repeat: repeat;
    
    }

    footer {
    display: block;
    }

    </style>

</head>
<body>

    <h1  style="color:Blue;">Travel and Tourism photo gallery</h1>

    <h2  style="color:Blue;">"Here users can add travel themed images"</h2>

    <h3  style="color:Green;">Upload your photo</h3>

    <h4  style="color:Green;">Here you are!</h4>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="author">Author</label>
        <input type="text" name="author">
        <br>
        <input type="file" name="fileToUpload">
        <br>
        <input type="submit" value="Upload" name="submit">    
    </form>

    <form method="post" action="save.php">
        <label for="nimi">Nimi</label>
        <br>
        <input type="text" name="nimi">
        <br>

        <label for="palaute">Palaute</label>
        <br>
        <textarea name="palaute" id="" cols="30" rows="10"></textarea>
        <br>

        <input name="laheta" type="submit" value="Lähetä">
    </form>
    
    <h5  style="color:Green;">After charging press F5, please. The image will be uploaded to the main page. The administrator checks the image.</h5>

    <?php 
    $xml = simplexml_load_file('data/galleria.xml');
    ?>
    
    <?php foreach ($xml->picture as $pic): ?>
        <div>
            <h2><?php echo $pic->author; ?></h2>
            <img src="uploads/<?php echo $pic->file;?>" alt="kuva" class="myPic" />
            <p><?php echo $pic->date; ?></p>
        </div>
    <?php endforeach; ?>

<footer>
  <p>Author: Raimo Jämsén Data2019C<br>
  <a href="mailto:diskos78@gmail.com">diskos78@gmail.com</a></p>
</footer>

</body>
</html>