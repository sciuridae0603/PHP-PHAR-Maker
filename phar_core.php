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
<center>

  <div class="ts very narrow container icon message">
      <i class="notice icon"></i>
      <div class="content">
          <div class="header">Notice</div>
          <p>Upload zip file only.</p>
      </div>
  </div>
  <form action="phar_result.php" method="post" enctype="multipart/form-data">
      <div class="ts borderless right icon inverted primary input">
      <input type="file" name="uploadfile" id="uploadfile">
      <input type="submit" class="ts primary button" value="Upload" name="submit">
  </form>
</center>
<div id="middle">
<center>

    <div class="ts very narrow container icon message">
        <i class="notice icon"></i>
        <div class="content">
            <div class="header">Notice</div>
            <p>Upload zip file only.</p>
        </div>
    </div>
    <form action="phar_core_result.php" method="post" enctype="multipart/form-data">
        <div class="ts borderless right icon inverted primary input">
        <input type="file" name="uploadfile" id="uploadfile">
        <input type="submit" class="ts primary button" value="Upload" name="submit">
      </form>
</center>
</div>

</body>
</html>
