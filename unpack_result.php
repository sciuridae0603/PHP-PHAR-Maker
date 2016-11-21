<!DOCTYPE html>
<html>
<title>PHAR Maker</title>
<head>
<!--W3C Script-->
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<!-- HTML Tags-->
<meta name="description" content="This Tool can Make phar file(plugin and server core)" />
<!-- Charset -->
<meta charset="UTF-8" />
<!-- Facebook Tags -->
<meta property="og:type"        content="article" />
<meta property="og:title"       content="PHAR Maker-Make MCPE Server Plugin Tool!" />
<meta property="og:description" content="This Tool can Make phar file(plugin and server core)" />
<meta property="og:locale"      content="zh_TW" />
<!-- Tocas UI -->
<link rel="stylesheet" href="//cdn.rawgit.com/TeaMeow/TocasUI/master/dist/tocas.min.css">
<!--CSS-->
<style>
#middle {
    left: 0;
    line-height: 200px;
    margin: auto;
    margin-top: -100px;
    position: absolute;
    top: 20%;
    width: 100%;
}
</style>
<head>
<body>
<div w3-include-html="nav.html"></div>

<script>
w3IncludeHTML();
</script>

<div id="middle">
<center>
  <?php
    require("function.php");

    $random = random();
    $tempdir = $_SERVER['DOCUMENT_ROOT'].'/temp/';
    $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/upload/';
    $uploadfile = $uploaddir . basename($_FILES['uploadfile']['name'] ,".phar"). "_" .$random . ".phar";
    $zipfilename = basename($_FILES['uploadfile']['name'],".phar"). "_" .$random. ".zip";
    $zipfile = $uploaddir.basename($_FILES['uploadfile']['name'],".phar"). "_" .$random .".zip";

    //Check Upload dir is exist
    start($uploaddir,$tempdir);

    //Check File Type
    checkfiletype($_FILES['uploadfile']['type'],"phar");

    //Move file to upload dir
    if (!move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
      echo "ERROR_MSG:UPLOAD_FAILED<br>
            Upload Failed";
      die();
    }

    $phar = new Phar($uploadfile,0);
    $phar->extractTo($tempdir);

    $zip = new ZipArchive();
    $zip->open($zipfile, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $files = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($tempdir),
      RecursiveIteratorIterator::LEAVES_ONLY
    );
    foreach ($files as $name => $file)
     {
       if (!$file->isDir())
        {
         $filePath = $file->getRealPath();
         $relativePath = substr($filePath, strlen($tempdir) + 0);
         $zip->addFile($filePath, $relativePath);
        }
     }
     $zip->close();

    echo("<a href='upload/".$zipfilename."'><button class='ts massive button'>Download Your Zip</button></a>")
    ?>
</center>
</div>

</body>
</html>
