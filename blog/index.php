<!doctype html><html><head>
  <meta charset="utf8">
  <link rel="stylesheet" href="../css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/favicon.png" type="image/x-icon">
  <title>lluis.ovh</title>
</head><body><main>
<h2><a href=../>Inici</a> / Blog</h2>

<ul id=posts>
  <?php
    include '../timeAgo.php';
    $dir=getcwd();
    $files_in_dir=array_diff(scandir($dir),array('..', '.'));
    rsort($files_in_dir);
    foreach($files_in_dir as $file){
      if(is_dir($file)) continue;
      if($file=='index.php') continue;
      if($file=='css.php') continue;
      if($file[0]=='.') continue;
      $data = substr($file,0,10);
      $ago  = timeAgo($data);
      $nom  = str_replace('.php','',$file);
      $nom  = str_replace('_-_',' - ',$nom);
      $nom  = str_replace('_',' ',$nom);
      $nom  = preg_replace('/([a-z])-([a-z])/i','$1 $2',$nom);
      $nom  = preg_replace('/([a-z])-([a-z])/i','$1 $2',$nom); //a vegades no desapareixen els guions (?)
      $nom  = preg_replace('/això-és/i','això és',$nom);
      $nom  = preg_replace('/uè-és/i','uè és',$nom);
      $nom  = preg_replace('/perquè-thauria dimportar/i',"perquè t'hauria d'importar",$nom);
      echo "<li><a href='$file' style=font-family:monospace;font-size:large>$nom</a> <small>($ago)</small>";
    }
  ?>
</ul>

<style>
  ul#posts li {
    font-family:sans-serif;
  }
</style>
