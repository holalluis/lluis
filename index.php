<!doctype html><html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css.css">
  <link rel="icon" href="img/favicon.png" type="image/x-icon">
  <title>
    lluis.ovh
    <?php
      //mostra localhost si estàs editant el blog
      if($_SERVER['SERVER_NAME']=='localhost')
        echo " (localhost)";
    ?>
  </title>
</head><body>
<main >
  <h1>Lluís Mª Bosch</h1><hr>
  <div style="display:flex">
    <!--seccions "pestanyes"-->
    <div style="padding-right:2em;border-right:1px solid #ccc">
      <b>Seccions</b>
      <ul>
        <li><a href=blog>blog</a>
        <li><a href=biblioteca>biblioteca</a>
        <li><a href=//github.com/holalluis>github</a>
        <li><a href=//github.com/holalluis/dotfiles>dotfiles</a>
        <li><a href="../git">git</a>
      </ul>

      <b>Suport</b>
      <ul>
        <li><a href=//paypal.me/lluisma/1>paypal</a>
        <li><a href=donacions/bitcoin.php>bitcoin</a>
      </ul>

      <b>Sobre mí</b>
      <ul>
        <li><a href=cv.php>currículum</a>
        <li><a href=mail.php>mail</a>
        <li><a href=//www.linkedin.com/in/holalluis>linkedin</a>
      </ul>

      <b>Altres</b>
      <ul>
        <li><a href="..">lluis.ovh (el meu servidor)</a>
      </ul>
    </div>

    <!--content-->
    <div style="padding-left:1em">
      <!--hola-->
      <div>
        <h3>Hola</h3>
        <article>
          <p>
            Benvingut a la meva pàgina personal.  Sóc programador
            i treballo a <a href="http://icra.cat/">ICRA</a>.
          </p>

          <p>
            Aquí hi trobaràs articles relacionats amb el món Linux (i el
            terminal), però també matemàtiques, tecnologia, software lliure,
            ordinadors, física, química i biologia.
          </p>

          <p>
            Vaig estudiar Biotecnologia (2012, UAB) i un màster en Tecnologies
            de la informació (UdG).
          </p>

          <p>
            Visc a Anglès (Girona).
          </p>

          <p>
            PS: de moment no tinc feed RSS, ja l'afegiré més endavant, primer he d'investigar com funciona.
          </p>
        </article>
      </div><hr>

      <!--blog recent-->
      <div>
        <h3><a href=blog>Blog</a> <small>(entrades recents)</small></h3>
        <ul>
          <?php
            include 'timeAgo.php'; //function
            //mostra 10 últimes entrades blog
            $dir = getcwd()."/blog";
            $files_in_dir=array_diff(scandir($dir),array('..', '.'));
            rsort($files_in_dir);
            $i=0;
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
              $nom = preg_replace('/això-és/i','això és',$nom);
              $nom = preg_replace('/uè-és/i','uè és',$nom);
              $nom = preg_replace('/([a-z])-([a-z])/i','$1 $2',$nom); //a vegades no desapareixen els guions (?)
              $nom = preg_replace('/perquè-thauria dimportar/i',"perquè t'hauria d'importar",$nom);
              $nom = ucfirst($nom);
              echo "<li><a href='blog/$file'>$nom</a> ($timeago)</li>";
              $i++;
              if($i>5)break;
            }
          ?>
        </ul>
      </div><hr>

      <!--setup-->
      <div>
        <h3>Setup - programes que faig servir</h3>
        <ul>
          <li>Sistem operatiu:         <a href="https://www.gnu.org/"              target=_blank>GNU Linux</a> /
                                       <a href=//debian.org                        target=_blank>debian   </a>
          <li>Gestor de finestres:     <a href="//i3wm.org"                        target=_blank>i3wm     </a> /
                                       <a href="//gnome.org"                       target=_blank>gnome    </a>
          <li>Editor de text:          <a href="//www.vim.org/"                    target=_blank>vim      </a> /
                                       <a href="//neovim.io/"                      target=_blank>neovim   </a>
          <li>Terminal:                <a href="//st.suckless.org"                 target=_blank>st       </a>
          <li>Terminal multiplexer:    <a href="//tmux.github.io"                  target=_blank>tmux     </a>
          <li>Control de versions:     <a href="//git-scm.org"                     target=_blank>git      </a>
          <li>Shell:                   <a href="//gnu.org/software/bash/bash.html" target=_blank>bash     </a> /
                                       <a href="//https://fishshell.com/"          target=_blank>fish     </a> /
                                       <a href="//zsh.sourceforge.net/"            target=_blank>zsh      </a>
          <li>Accés remot:             <a href="//ssh.com/ssh"                     target=_blank>ssh      </a>
          <li>Agenda:                  <a href="//calcurse.org"                    target=_blank>calcurse </a>
          <li>Explorador:              <a href="//ranger.github.io"                target=_blank>ranger   </a> /
                                       <a href="//vifm.info/"                      target=_blank>vifm     </a>
          <li>Email:                   <a href="//neomutt.org"                     target=_blank>neomutt  </a>
          <li>Fulla de càlcul:         <a href="//github.com/andmarti1424/sc-im"   target=_blank>scim     </a>
          <li>Elaboració de documents: <a href="//gnu.org/software/groff/"         target=_blank>groff    </a>
          <li>Visor documents pdf:     <a href="//pwmt.org/projects/zathura/"      target=_blank>zathura  </a>
          <li>Reproductor multimèdia:  <a href="//mpv.io"                          target=_blank>mpv      </a>
          <li>Visor imatges:           <a href="https://github.com/muennich/sxiv"  target=_blank>sxiv     </a>
        </ul>
      </div><hr>

      <!--random-->
      <div>
        <h3>Cites random trobades per internet i rescatades aquí</h3>
        <ul>
          <li>
            "Let's use the terminal more, because if you don't use it, your brain
            gets sloppy, and you don't want a sloppy brain."
          <li>
            "I am a programmer. I do not deal with digital painting, photo
            processing, video editing. I don’t really care for wide gamut or even
            proper color reproduction. I spend most of my days in a text browser,
            text editor and text terminal, looking at barely moving letters."
        </ul>
      </div>
    </div>
  </div>
</main>
