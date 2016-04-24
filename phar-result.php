<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMT</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">PMT</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PMT</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="phar.php">Create Phar</a></li>
            <li><a href="core.php">Create Phar(Core)</a></li>
            <li class="active"><a href="unphar.php">Extract Phar</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <center>
        <br>
        <br>
        <br>
        <br>
        <br>
      <div class="yee">
        <?php

        if($_FILES["fileToUpload"]["name"]) {
            $file = $_FILES["fileToUpload"];
            $filename = $file["name"];
            $tmp_name = $file["tmp_name"];
            $type = $file["type"];

            $name = explode(".", $filename);
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');

            if(in_array($type,$accepted_types)) {
                $okay = true;
            }

            $continue = strtolower($name[1]) == 'zip' ? true : false;

            if(!$continue) {
                $message = "The file you are trying to upload is not a .zip file. Please try again.";
            }
                $ran = uniqid();
                $pharname = $filename.$ran;
                $targetdir = "tmp/".$filename.$ran;
                $targetzip = "tmp/".$filename.$ran.".zip";

            if(move_uploaded_file($tmp_name, $targetzip)) { //Uploading the Zip File

                /* Extracting Zip File */

                $zip = new ZipArchive();
                $x = $zip->open($targetzip);  // open the zip file to extract
                if ($x === true) {
                    $zip->extractTo($targetdir); // place in the directory with same name
                    $zip->close();
                    $phar = new Phar("tmp/".$pharname.".phar");
                    $phar->buildFromDirectory(dirname(__FILE__) . $targetdir);
                    $phar->setStub(<?php __HALT_COMPILER(););
                }
                $message = "Your phar file is already created,and your download link here".<a href=$targetdir.".phar">Link</a>;

            } else {
                $message = "There was a problem with the upload. Please try again.";
            }
        }

        ?>
        </form>
      </div>
    </center>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>