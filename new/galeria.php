<?php
    if(isset($_FILES["img"]["tmp_name"])) {
        $name = $_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"], "gallery/$name");
    }
?>

<!DOCTYPE html>
<html lang="sk">
    <head>
        <link href="css/galeria.css" rel="stylesheet">
        <title>galeria</title>
    </head>
    <body data-ng-app="gallery">
        <div class="d-block galeria" data-ng-controller="gallery_controler">
            <div data-ng-if="prava.admin">
                <span>Pridaj obrázok</span>
                <form action="index.php?page=galeria" method="POST" enctype="multipart/form-data">
                    <input type="file" accept="image/*" name="img" id="img">
                    <input type="submit" value="pridaj obrazok">
                </form>
            </div>
            <?php
            $dir = 'gallery';
            $files = scandir($dir);
                foreach ($files as $img) {
                    if ($img != "." && $img != "..") {
                        echo '<img src="gallery/' . $img . '" alt="Image" width="250" height="250">';

                    }
                }
            ?>
        </div>
    </body>
</html>