<?php
    if(isset($_FILES["img"]["tmp_name"])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "schooldb";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO gallery VALUES (NULL)";
        $res = $conn->query($sql);
        $id = $conn->lastInsertId();
        move_uploaded_file($_FILES["img"]["tmp_name"], "gallery/$id.jpg");
    }
?>

<!DOCTYPE html>
<html lang="sk">
    <head>
    </head>
    <body>
        <div class="d-block">
            <form action="index.php?page=galeria" method="POST" enctype="multipart/form-data">
                <input type="file" name="img" id="img">
                <input type="submit" value="pridaj">
            </form>
            <?php
            $dir = 'gallery';
            $files = scandir($dir);
                foreach ($files as $img) {
                    if ($img != "." && $img != "..") {
                        echo '<img src="gallery/' . $img . '" alt="Image" width="500" height="500">';
                        
                    }
                }
            ?>
        </div>
    </body>
</html>