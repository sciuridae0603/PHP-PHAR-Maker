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
            <li class="active"><a href="phar.php">Create Phar</a></li>
            <li><a href="core.php">Create Phar(Core)</a></li>
            <li><a href="unphar.php">Extract Phar</a></li>
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
        function make_random($length =5) {
          if(is_numeric($length) && $length >0){
            $chr = array_merge(range('A', 'Z'), range('a', 'z'),range(0, 9));
            $out ='';
            for($i=0;$i < $length;$i++) {
              $out .= $chr[mt_rand(0,count($chr)-1)];
            }
            return $out;
          }
        }
        $ran = make_random();
        if($_FILES['file']['error']>0){
          exit("Upload Fail");
        }
        move_uploaded_file($_FILES['file']['tmp_name'],'tmp/'.$ran."_".$_FILES['file']['name']);
        echo '<a href="tmp/'.$ran."_".$_FILES['file']['name'].'" class="btn btn-info" role="button">tmp/'.$ran."_".$_FILES['file']['name'].'</a>';
        $files = glob('tmp/zip/{,.}*', GLOB_BRACE);
        foreach($files as $file){
          if(is_file($file))
          unlink($file);
        }
        $file = $ran."_".$_FILES['file'];
        $zip = new ZipArchive;
        $dir = "tmp/zip";
        if ($zip->open('tmp/'.$ran."_".$_FILES['file']['name']) === TRUE) {
          $zip->extractTo('tmp/zip/');
          $zip->close();
        } else {
          echo 'zip extract failed';
        }
        $link = 'tmp/'.$file.'.phar';
        $phar = new Phar("tmp/".$file.".phar");
        $phar->setStub("<?php __HALT_COMPILER();");
        $phar->setSignatureAlgorithm(Phar::SHA1);
        $phar->startBuffering();
        $phar->buildFromDirectory($dir);
        $phar->stopBuffering();
        echo '<br><br><br><a href='.$link.' class="btn btn-info" role="button">Your Phar file</a>';
        ?>
        </form>
      </div>
    </center>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
