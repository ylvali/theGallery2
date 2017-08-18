<?php
namespace Ylva\Gallery;

 include(__DIR__.'/galleryClass.php');
 $gallery = new CGallery;


 //show smaller versions / big versions
    //if there is an id call the function for showing that picture big
if (isset($_GET['id'])) {
        $idNr = $_GET['id'];
        $images = $gallery->getBigVersion($idNr);
        $info = "<a href=theGallery.php> Back to Galley </a>";
} else {
      $images = $gallery->getSmallImages();
      $info = "";
}
?>

<!doctype html>
<html lang='en' class='no-js'>
<head>
<meta charset='utf-8' />
<link rel="stylesheet" type="text/css" href="css/style.css">
<title> The Gallery </title>
</head>
<body>

<div id="box">
    <br/><br/><br/>
<h1> Gallery </h1>


<?=$images?>
<br/><br/>
<?=$info?>
<br/><br/>
</div>
<?php
  $d = explode("/", trim($path, "/"));
  $srcUrl = 'source.php?dir=' . end($d) . '&amp;file=' . basename($_SERVER["PHP_SELF"]) . '#file';
?>
<a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a>
<p><em>"Don't worry, the <a href='<?=$srcUrl?>'>source</a> is with you."</em></p>
</body>
</html>
