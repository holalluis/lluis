<?php include('css.php')?>

<h1>Com actualitzar l'explorador automàticament mentre treballes</h1><hr>

<!--data--><div><code>[2019-04-12]</code><div><hr>

<article>

<p>Aquest petit truc fa que pugui treballar molt ràpidament.</p>

<p>Cada cop que modifico un arxiu web (html/php/js/css) (cosa que
faig moltes vegades durant el dia) vull que es refresqui automàticament el
Google Chrome per no haver de fer-ho manualment.<p>

<p>Primer de tot, necessitem un script que refresqui l'explorador.
Es pot fer a Mac OS X fent servir <inline>osascript</inline> o a Linux, amb
<inline>xdotool</inline>. Anomenem el nou arxiu
<inline>reload-chrome.sh</inline> fent servir el nostre editor preferit. Jo
faig servir l'editor <inline>vim</inline> directament al terminal:</p>

<pre class=prettyprint>
  <code>
  $ vim reload-chrome.sh
  </code>
</pre>

<pre class=prettyprint>
  <code>
  #!/bin/bash
  #reload-chrome.sh per Mac OS X
  osascript -e 'tell application "Google Chrome" to tell the active tab \
    of its first window to reload'
  </code>
</pre>

<pre class=prettyprint>
  <code>
  #!/bin/bash
  #reload-chrome.sh per Linux
  echo "$(date --rfc-3339=seconds) Refresh: $FILE"
  CUR_WID=$(xdotool getwindowfocus)
  #gets the first $BROWSER window, if you have more than one
  #$BROWSER window open, it might not refresh the right one,
  #as an alternative you can search by the window/html title
  WID=$(xdotool search --onlyvisible --class chromium|head -1)
  #TITLE="window/html file title"
  #WID=$(xdotool search --title "$TITLE"|head -1)
  xdotool windowactivate $WID
  xdotool key 'ctrl+r'
  xdotool windowactivate $CUR_WID
  </code>
</pre>

<small><p>Nota: si treballem en Firefox, podem fer-ho igualment canviant "Google
Chrome" per "Firefox".</p></small>

<p>Ara guardem el nou arxiu a la nostra carpeta personal, així hi podrem
accedir fàcilment fent <inline>~/reload-chrome.sh</inline>. Ara necessitem que
aquest script que acabem de crear sigui executable. En un terminal fem:</p>

<pre class=prettyprint>
  <code>
  $ chmod +x ~/reload-chrome.sh
  </code>
</pre>

<p>Ara executem l'script <inline>reload-chrome.sh</inline> per comprovar si
funciona:</p>

<pre class=prettyprint>
  <code>
  $ ~/reload-chrome.sh
  </code>
</pre>

<p>Fantàstic! Ja tenim mig camí fet. Ara que hem comprovat que Google Chrome es
refresca quan executem <inline>reload-chrome.sh</inline>, necessitem instal·lar
la comanda <inline>entr</inline>, que ens permetrà executar l'script
<inline>reload-chrome.sh</inline> cada cop que detecti que els fitxers de la
carpeta on estem treballant han canviat. Per instal·lar la comanda
<inline>entr</inline> des del terminal, fem:</p>

<pre class=prettyprint>
  <code>
  $ brew install entr     # mac os x
  $ sudo apt install entr # linux (debian, ubuntu...)
  </code>
</pre>

<p>Ara naveguem fins la carpeta on estem treballant i executem
<inline>entr</inline> de la següent manera:</p>

<pre class=prettyprint>
  <code>
  $ find . -name "*.php" -or -name "*.css" | entr ~/reload-chrome.sh
  </code>
</pre>

<p>Fet! La comanda <inline>find</inline> és una comanda molt potent que llista
recursivament els fitxers de la carpeta actual i també les subcarpetes. Li hem
posat un filtre <inline>-name "*.php -o -name "*.css""</inline> perquè només
volem vigilar els arxius .php i els .css. Com que l'hem connectat a la comanda
<inline>entr</inline>, aquesta executarà la comanda que se li ha especificat
com a paràmetre, en aquest cas, el fitxer que hem creat
<inline>reload-chrome.sh</inline>.</p>

<p>Ara ja podem modificar qualsevol arxiu dins la carpeta i veurem que
automàticament es refresca l'explorador.</p>

<p>Aquest petit truc demostra la potència de la comanda <inline>entr</inline>.
Imagina't ara totes les tasques que pots automatitzar, ja que pots cridar
qualsevol comanda enlloc de <inline>reload-chrome.sh<inline>.</p>

<p>Jo sempre executo la comanda anterior dins una sessió de
<inline>tmux</inline>, per tenir el procés al 'background', i no haver de tenir
una pestanya oberta amb la comanda <inline>entr</inline>.</p>

<p>Salut!</p>
<p>Lluís</p>

</article><hr>

<a href=index.php>Blog</a>
