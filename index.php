<!doctype html><html><head>
  <meta charset=utf-8>
  <link rel="stylesheet" href="css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/favicon.png" type="image/x-icon">
  <title>lluis.ovh</title>
</head><body>

<h1 style="border-bottom:1px solid #ccc">lluis.ovh</h1>

<!--main-->
<main>
  <!--welcome-->
  <div>
    <h3>Benvingut</h3>
    <p>
    Hola, em dic Lluís Bosch (Girona 1989) i aquesta és la meva pàgina personal. 
    Aquí hi trobaràs informació en català sobre ciència, tecnologia, informàtica i open source, des d'un punt de vista lliure i minimalista.

    </p>
    Sóc:
    <ul>
      <li>Informàtic/programador: MSc en tecnologies de la informació (UdG 2012).
      <li>Científic: Biotecnologia (UAB 2011).
      <li>Aficionat a l'electrònica DIY (autodidacta). 
      <li>Aficionat a la producció musical (autodidacta) i ocasionalment DJ.
      <li>Treballo al centre de recerca <a href=//icra.cat target=_blank>ICRA</a> des del 2013.
    </ul>
  </div>

  <!--blogs recents-->
  <div>
    <h3>Entrades recents al <a href=blog>blog</a></h3>
    <ul>
      <?php
        //mostra 10 entrades blog
        $dir = getcwd()."/blog";
        $files_in_dir=array_diff(scandir($dir),array('..', '.'));
        rsort($files_in_dir);
        $i=0;
        foreach($files_in_dir as $file){
          if($file=='index.php')continue;
          echo "<li><a href='blog/$file'>$file</a>";
          $i++; 
          if($i>10)break;
        }
      ?>
    </ul>
  </div>

  <!--my setup-->
  <div>
    <h3>El meu setup</h3>
    <div>
      La majoria del temps només utilitzo un terminal i un explorador web (Chrome o Firefox).
      <br>
      Els programes que faig servir són majoritàriament gratuïts i de codi obert:
    </div>
    <ul>
      <li>Sistem Operatiu: GNU Linux <a href=//debian.org                        target=_blank>debian</a> (amb 
                                     <a href="//i3wm.org"                        target=_blank>i3</a> /
                                     <a href="//gnome.org"                       target=_blank>gnome</a>).
      <li>Shell:                     <a href="//gnu.org/software/bash/bash.html" target=_blank>bash</a> / 
                                     <a href="//zsh.sourceforge.net/"            target=_blank>zsh</a>.
      <li>Editor de text:            <a href="//www.vim.org/"                    target=_blank>vim</a>.
      <li>Terminal manager:          <a href="//tmux.github.io"                  target=_blank>tmux</a>.
      <li>Control de versions:       <a href="//git-scm.org"                     target=_blank>git</a>.
      <li>Accés remot:               <a href="//ssh.com/ssh"                     target=_blank>ssh</a>.
      <li>Agenda:                    <a href="//calcurse.org"                    target=_blank>calcurse + caldav</a>.
      <li>Ranger:                    <a href="//ranger.github.io"                target=_blank>ranger</a> /
                                     <a href="//vifm.info/"                      target=_blank>vifm</a>.
      <li>Email:                     <a href="//neomutt.org"                     target=_blank>neomutt</a>.
      <li>Fulla de càlcul:           <a href="//github.com/andmarti1424/sc-im"   target=_blank>scim</a>.
      <li>Elaboració de documents:   <a href="//gnu.org/software/groff/"         target=_blank>groff + eqn + tbl</a>.
      <li>Visor documents pdf:       <a href="//pwmt.org/projects/zathura/"      target=_blank>zathura</a>.
      <li>Visor multimèdia:          <a href="//mpv.io"                          target=_blank>mpv</a>.
      <li>Visor imatges:             <a href="https://github.com/muennich/sxiv"  target=_blank>sxiv</a>.
    </ul>
  </div>

  <!--links-->
  <div>
    <h3>Links</h3>
    <ul>
      <li><a href=mail.php>mail</a>
      <li><a href=//github.com/holalluis target=_blank>github</a>
      <li><a href=.. >les meves webs</a>
      <li><a href=blog>blog</a>
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
