<?php
    if(isset($_FILES["file"]["tmp_name"]) && isset($_POST["year"])) {
        $name = $_FILES["file"]["name"];
        if($_POST["year"] == 7) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "downloadables/7/$name");
        } else if ($_POST["year"] == 8) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "downloadables/8/$name");
        }else if ($_POST["year"] == 9) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "downloadables/9/$name");
        }
    }
?>

<!DOCTYPE html>
<html lang="sk">
    <head>
        <link href="css/ucivo.css" rel="stylesheet">
    </head>
    <body data-ng-app="curriculum">
        <div data-ng-controller="curriculum_controler" class="ucivo">
            <div data-ng-if="prava.admin">
            <span>Pridaj súbor</span>
                <form action="index.php?page=ucivo" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file" data-ng-model="save.file" id="file" class="d-block">
                    <span>vyberte ročník</span>
                    <input type="radio" id="7" name="year" value="7">
                    <label for="7">7</label>
                    <input type="radio" id="8" name="year" value="8">
                    <label for="8">8</label>
                    <input type="radio" id="9" name="year" value="9">
                    <label for="9">9</label><br>
                    <input type="submit" value="pridaj subor">
                </form>
            </div>
            <div>
                <ul>
                    <li>
                        <span>Ročnik 7</span>
                        <ul>
                        <?php
                        $dir = 'downloadables/7';
                        $files = scandir($dir);
                            foreach ($files as $file) {
                                if ($file != "." && $file != "..") {
                                    echo '<li><a href="downloadables/7/'.$file.'" download>'.$file.'</a>';
                                }
                            }
                        ?>
                        </ul>
                    </li>
                    <br>
                    <li>
                        <span>Ročnik 8</span>
                        <ul>
                        <?php
                        $dir = 'downloadables/8';
                        $files = scandir($dir);
                            foreach ($files as $file) {
                                if ($file != "." && $file != "..") {
                                    echo '<li><a href="downloadables/8/'.$file.'" download>'.$file.'</a>';
                                }
                            }
                        ?>
                        </ul>
                    </li>
                    <br>
                    <li>
                        <span>Ročnik 9</span>
                        <ul>
                        <?php
                        $dir = 'downloadables/9';
                        $files = scandir($dir);
                            foreach ($files as $file) {
                                if ($file != "." && $file != "..") {
                                    echo '<li><a href="downloadables/9/'.$file.'" download>'.$file.'</a>';
                                }
                            }
                        ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>