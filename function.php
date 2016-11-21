<?php


function start($udir,$tdir){
    exec("find ".$udir."* -mtime +10 -exec rm {}");
    if (!file_exists($udir)){
      mkdir($udir,0777);
    }
    if (file_exists($tdir)){
      deldir($tdir);
      mkdir($tdir,0777);
    }else {
      mkdir($tdir,0777);
    }
  }

function random($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function deldir($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) deldir("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}

function checkfiletype($type,$check) {
  if ($check == "zip"){
    if ($type !== "application/zip")
    {
      echo "ERROR_MSG:FILE_TYPE_ERROR<br>
            Your File isn't zip file.
        ";
      die();
    }
  }elseif ($check == "phar") {
    if ($type !== "application/octet-stream")
    {
      echo "ERROR_MSG:FILE_TYPE_ERROR<br>
            Your File isn't phar file.
        ";
      die();
    }
  }

}
