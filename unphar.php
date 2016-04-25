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
        <form action="unphar-result.php" enctype="multipart/form-data" method="post">
        <p>Select Your zip file:</p>
        <br>
        <input id="file" name="file" type="file">
        <br>
        <input id="submit" name="submit" type="submit" value="Upload">
        </form>      </div>
    </center>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
