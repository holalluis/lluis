<?php include'header.php'?>
<b>Blog</b>
<ul>
  <?php
    include 'timeAgo.php'; //function
    //mostra 10 últimes entrades blog
    $dir = getcwd()."/blog";
    $files_in_dir=array_diff(scandir($dir),array('..', '.'));
    rsort($files_in_dir);
    foreach($files_in_dir as $file){
      if(is_dir($dir."/".$file))continue;
      if($file=='index.php')continue;
      if($file=='css.php')continue;
      if($file[0]=='.')continue;

      $date = substr($file,0,10); //string de 10 caràcters (data)
      $timeago = timeAgo($date);  //string ("fa 2 mesos")
      $nom = substr($file,13);    //titol article comença a la posició 13
      $nom = str_replace('_',' ',$nom);
      $nom = str_replace('.php','',$nom);
      $nom = preg_replace('/(\w)-(\w)/i','$1 $2',$nom);
      $nom = preg_replace('/(.)-(.)/i','$1 $2',$nom); //a vegades no desapareixen els guions (?)
      $nom = ucfirst($nom);

      echo "<li>
        <a href='blog/$file'>$nom</a> ($timeago)
      </li>";
    }
  ?>
</ul>
