<?php include'css.php'?>
<h1>La comanda fzf(1)</h1><hr>
<div><code>2021-11-13</code><div><hr><article>

<p>
  La comanda <inline>fzf(1)</inline> és un "fuzzy finder" interactiu.  La
  utilitzo cada dia i m'estalvia molt de temps, per tant, m'és imprescindible.
</p>

<code><pre class=prettyprint>
  $ fzf
</pre></code>

<p>
  Si l'invoques directament (no és el més habitual), buscarà els noms dels
  arxius dins la carpeta actual (i també les subcarpetes).  S'obrirà un camp de
  text on es mostraran els resultats que s'ajustin més al que estàs escrivint a
  temps real.  Un cop filtrats els resultats, apretes la tecla Enter amb la
  opció seleccionada, i s'acaba el programa.  El resultat del procés és el nom
  que has seleccionat després de la cerca. Pot semblar extrany que no faci res
  més, però que sigui exactament així és precisament el que fa que sigui tan
  potent, ja que permet acoplar-hi qualsevol altra comanda. Per exemple, si
  vols editar un fitxer amb l'editor de text <inline>vim(1)</inline> però no
  recordes la ruta sencera i/o el nom de l'arxiu que estàs buscant, pots fer
  que <inline>fzf</inline> busqui l'arxiu al mateix moment que obres el
  <inline>vim</inline>, de la següent manera:
</p>

<code><pre class=prettyprint>
  $ vim `fzf`
</pre></code>

<p>
  D'aquesta manera pots obrir qualsevol fitxer dins la carpeta on estiguis en
  qüestió de milisegons. És tan útil que val la pena tenir-la mapejada a un
  alias, com per exemple:
</p>

<code><pre class=prettyprint>
  $ alias vimf='vim `fzf`'
</pre></code>

<small>nota: guarda la línia anterior dins el fitxer ~/.bashrc per tenir
l'alias disponible sempre.</small>

<p>
  Així, navegues fins l'arrel d'un projecte amb la comanda <inline>cd</inline>
  i simplement invoques l'alias <inline>vimf</inline> i escriu algunes lletres
  que recordis del nom del fitxer que busques, prems Enter i ja l'estàs editant:
</p>

<code><pre class=prettyprint>
  $ vimf
</pre></code>

<p>
  La comanda <inline>fzf</inline> també accepta entrada de text per pipes
  (stdin), és a dir, pots buscar dins de qualsevol llista que li subministris.
  Per exemple, imagina que vols buscar alguna llibreria de C (com ara
  <inline>stdio.h</inline>) dins la carpeta <inline>/usr/include</inline> però
  no recordes exactament el nom i vols poder filtrar dins la llista de noms que
  estan dins la carpeta. Invoques la següent comanda i escrius "std" per veure
  si trobes la ruta sencera de la llibreria <inline>stdio.h</inline>:
</p>

<code><pre class=prettyprint>
  $ less `find /usr/include | fzf`
</pre></code>

<p>
  Immediatament has trobat la ruta sencera a l'arxiu que buscaves i has mirat
  dins l'arxiu amb la comanda <inline>less</inline> per fer-hi un cop d'ull
  ràpid.
<p>

<p>
  Un altre exemple: imagina que tens un arxiu anomenat
  <inline>langs.txt</inline> amb una llista de llenguatges de programació que
  vols aprendre:
</p>

<code><pre class=prettyprint>
  $ cat langs.txt
</pre></code>

<code><pre class=prettyprint>
  javascript
  python
  C
  rust
  go
  matlab
  java
  ruby
  perl
</pre></code>

<p>
  La següent comanda permet seleccionar de forma interactiva un dels noms de la
  llista i buscar un manual dins la web <inline>cheat.sh</inline> sense haver
  de sortir del terminal:
</p>

<code><pre class=prettyprint>
  $ curl cheat.sh/`cat langs.txt | fzf`
</pre></code>

<p>
  La comanda <inline>fzf</inline> també porta inclosa una integració dins de
  <inline>vim</inline>, en forma de plugin: la funció <inline>:FZF</inline>
  permet obrir ràpidament un fitxer sense haver de sortir de
  <inline>vim</inline>, de manera que navegar ràpidament entre fitxers sembla
  màgia.
</p>

<p>
  Si fas servir <a href="https://github.com/junegunn/vim-plug">vim-plug</a>,
  afegeix aquestes línies al <inline>.vimrc</inline>:
</p>
<code><pre class=prettyprint>
  Plug 'junegunn/fzf',{'dir':'~/.fzf','do':'./install --all'}

  "exemple de mapping de la funció :FZF"
  nnoremap ,f :FZF<cr>
</pre></code>

<p>I així és com l'utilitzo en el meu dia a dia.</p>

<p>
  Instal·lació:
</p>
<code><pre class=prettyprint>
  # GNU Linux (Debian i derivats)
  $ sudo apt install fzf

  # Mac OS X
  $ brew install fzf
</pre></code>

<p>
  Manual:
</p>
<code><pre class=prettyprint>
  $ man fzf
</pre></code>

<p>
  Tota la info sobre <inline>fzf</inline> i més exemples útils:
  <a href="https://github.com/junegunn/fzf">https://github.com/junegunn/fzf</a>
</p>

<!--final--><p>Salut!</p><p>Lluís</p>
