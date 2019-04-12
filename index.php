<!doctype html><html><head>
  <meta charset=utf-8>
  <link rel="stylesheet" href="css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/favicon.png" type="image/x-icon">
  <title>lluis.ovh</title>

  <style>
    main{
      display:grid;
      grid-template-columns:62% 38%;
      grid-gap:10px;
    }

    main > div{
    }
  </style>
</head><body>

<h1 style=text-align:center>lluis.ovh</h1>

<!--main-->
<main>
  <!--welcome-->
  <div>
    <h3>Benvingut</h3>
    <article>
      <p>
      Em dic Lluís Bosch, sóc d'Anglès (Girona), vaig néixer el 1989 i aquesta
      és la meva pàgina personal. Aquí trobaràs informació sobre informàtica,
      tecnologia, ciència i matemàtiques en català. Tinc preferència pel
      software lliure i pel minimalisme.
      </p>

    </article>

    <p> Sóc: </p>
    <ul>
      <li>MSc en Computer Science     (<a href=//udg.edu target=_blank>UdG</a> 2012).
      <li>Llicenciat en Biotecnologia (<a href=//uab.cat target=_blank>UAB</a> 2011).
      <li>Treballo al centre de recerca <a href=//github.com/icra target=_blank>ICRA</a> (2013-actualitat).
    </ul>
  </div>

  <!--blog-->
  <div>
    <h3><a href=blog>Blog</a> (entrades recents)</h3>
    <ul>
      <?php
        include 'timeAgo.php'; //function

        //mostra 10 entrades blog
        $dir = getcwd()."/blog";
        $files_in_dir=array_diff(scandir($dir),array('..', '.'));
        rsort($files_in_dir);
        $i=0;
        foreach($files_in_dir as $file){
          if($file=='index.php')continue;
          if($file[0]=='.')continue;

          $date = substr($file,0,10); //string de 10 caràcters
          $timeago = timeAgo($date);  //string
          $nom = substr($file,13); //nom article
          $nom = str_replace('_',' ',$nom);
          $nom = str_replace('.html','',$nom);
          $nom = preg_replace('/(\w)-(\w)/i','$1 $2',$nom);
          $nom = ucfirst($nom);

          echo "<li><small><a href='blog/$file'>$nom</a> ($timeago)</small>";
          $i++;
          if($i>10)break;
        }
      ?>
    </ul>
  </div>

  <!--setup-->
  <div>
    <h3>Setup</h3>

      <p><i>"Let's use the terminal more, because if you don't use it, your brain gets
      sloppy, and you don't want a sloppy brain".</i></p>

    <ul>
      <li>Sistem operatiu:          <a href="https://www.gnu.org/">GNU Linux</a>
                                    <a href=//debian.org                        target=_blank>debian</a> (amb
                                    <a href="//i3wm.org"                        target=_blank>i3</a> /
                                    <a href="//gnome.org"                       target=_blank>gnome</a>).
      <li>Terminal manager:         <a href="//tmux.github.io"                  target=_blank>tmux</a>.
      <li>Editor de text:           <a href="//www.vim.org/"                    target=_blank>vim</a> /
                                    <a href="//neovim.io/"                      target=_blank>neovim</a>.
      <li>Control de versions:      <a href="//git-scm.org"                     target=_blank>git</a>.
      <li>Shell:                    <a href="//gnu.org/software/bash/bash.html" target=_blank>bash</a> /
                                    <a href="//https://fishshell.com/"          target=_blank>fish</a> /
                                    <a href="//zsh.sourceforge.net/"            target=_blank>zsh</a>.
      <li>Accés remot:              <a href="//ssh.com/ssh"                     target=_blank>ssh</a>.
      <li>Agenda:                   <a href="//calcurse.org"                    target=_blank>calcurse + caldav</a>.
      <li>Explorador:               <a href="//ranger.github.io"                target=_blank>ranger</a> /
                                    <a href="//vifm.info/"                      target=_blank>vifm</a>.
      <li>Email:                    <a href="//neomutt.org"                     target=_blank>neomutt</a>.
      <li>Fulla de càlcul:          <a href="//github.com/andmarti1424/sc-im"   target=_blank>scim</a>.
      <li>Elaboració de documents:  <a href="//gnu.org/software/groff/"         target=_blank>groff + eqn + tbl</a>.
      <li>Visor documents pdf:      <a href="//pwmt.org/projects/zathura/"      target=_blank>zathura</a>.
      <li>Reproductor multimèdia:   <a href="//mpv.io"                          target=_blank>mpv</a> /
                                    <a href="//videolan.org"                    target=_blank>vlc</a>.
      <li>Visor imatges:            <a href="https://github.com/muennich/sxiv"  target=_blank>sxiv</a>.
    </ul>
  </div>

  <!--info-->
  <div>
    <h3>Info</h3>
    <ul>
      <li><a href=//github.com/holalluis target=_blank>github</a>
      <li><a href=mail.php>mail</a>
      <li><a href=//lluis.ovh >webs</a>
      <li><a href=biblioteca.php>biblioteca</a>
      <li><a href=//www.linkedin.com/in/holalluis target=_blank>linkedin</a>
      <li>donacions
        <ul>
          <li><a href=//paypal.me/lluisma/1 target=_blank>paypal</a>
          <li><a href=donacions/bitcoin.php>bitcoin</a>
        </ul>
      </li>
    </ul>
  </div>
</main>
