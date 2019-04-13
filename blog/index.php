<!doctype html><html><head>
  <meta charset=utf-8>
  <link rel="stylesheet" href="../css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/favicon.png" type="image/x-icon">
  <title>lluis.ovh</title>
</head><body>
<main>
<h2 style=text-align:center><a href=../>Inici</a> / Blog</h2>
<ul>
<?php
  include '../timeAgo.php';
  $dir = getcwd();
  $files_in_dir=array_diff(scandir($dir),array('..', '.'));
  rsort($files_in_dir);
  foreach($files_in_dir as $file){
    if($file=='index.php')continue;
    if($file[0]=='.')continue;
    $data = substr($file,0,10);
    $ago =timeAgo($data);
    $nom = str_replace('.html','',$file);
    $nom = str_replace('_-_',' - ',$nom);
    $nom = preg_replace('/([a-z])-([a-z])/i','$1 $2',$nom);
    echo "<li><a href='$file'>$nom</a> ($ago)";
  }
?>
</ul>
