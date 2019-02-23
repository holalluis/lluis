<!doctype html><html><head>
  <meta charset=utf-8>
  <link rel="stylesheet" href="../css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>lluis.ovh</title>
  <style>
    body {
      font-size:16px;
    }
  </style>
</head><body>

<h2><a href=../>Inici</a> / Blog</h2>

<ul>
<?php
  $dir = getcwd();
  $files_in_dir=array_diff(scandir($dir),array('..', '.'));
  rsort($files_in_dir);
  foreach($files_in_dir as $file){
    if($file=='index.php')continue;

    echo "<li><a href='$file'>$file</a>";
  }
?>
</ul>
