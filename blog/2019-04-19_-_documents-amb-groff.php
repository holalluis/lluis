<?php include('css.php')?>

<h1>Documents amb groff</h1><hr>

<!--data--><div><code>[2019-04-19]</code><div><hr>

<article><p>

Si estàs llegint això és perquè vols oblidar-te del Word i vols trobar una
manera més eficient de treballar.
</p><p>

Potser estàs fent un doctorat, o un treball de final de carrera, o potser vols
escriure un llibre, o potser a la feina escrius documentació tècnica, i
necessites un millor sistema per escriure documents. O potser simplement vols
sentir-te deslligat de Microsoft.
</p><p>

Estàs considerant trobar un sistema per formatejar text: vols produir articles
o llibres, visualment bonics, de forma consistent i amb alta qualitat.
Potser també et preocupa poder escriure equacions matemàtiques de forma bonica
i senzilla.  Potser fins i tot vols evitar el <inline>LaTeX</inline> perquè has trobat
tanta informació que no saps per on començar.
</p><p>

Evidentment, vols que sigui gratis i de codi obert, perquè vius al 2019, i vols
un sistema que transcendeixi el temps i les empreses.
</p><p>

Més endavant, potser voldràs integrar-ho amb <inline>git</inline> perquè és el
millor sistema de control de versions. Potser també voldràs tenir l'opció
d'allotjar els documents a una plataforma com ara <inline>github</inline>, i
evitar així l'infern de les versions per mail. A més, t'agradaria tenir la
possibilitat de poder treballar de forma col·laborativa amb altres companys de
feina.
</p><p>

En definitiva, vols treballar de forma còmoda i augmentar la complexitat quan
faci falta, de forma incremental.
</p><p>

Doncs estàs de sort perquè
<a href="https://es.wikipedia.org/wiki/Groff">groff</a>
és la peça perfecta: <inline>groff</inline> és una comanda que permet produir
documents PDF (entre d'altres formats) formatejats a partir de documents de
text. Moltes distribucions Linux i Mac OS X ja el porten instal·lat (el sistema
de manuals d'Unix, <inline>man</inline>, està fet amb <inline>groff</inline>).
</p><p>

Si no tens <inline>groff</inline> instal·lat, obre un terminal i escriu:

<pre class=prettyprint>
  <code>
  sudo apt install groff # linux (debian, ubuntu, etc)
  brew install groff     # mac os x
  </code>
</pre>

Ara farem el nostre primer document amb <inline>groff</inline>.
</p><p>

Crea un nou fitxer anomenat <inline>document.ms</inline> fent servir el teu editor de text
preferit (<inline>vim</inline>, <inline>emacs</inline>, <inline>nano</inline>, <inline>atom</inline>...):

<pre class=groff id=document_groff>
  <style>
    pre.groff {
      border-color:#eee;
      background:#eee;
      border-radius:3px;
    }
    .groff span.comanda {
      color:blue;
    }
  </style>
  <code>
  <span class=comanda>.TL</span>
  El meu primer document utilitzant groff

  <span class=comanda>.AU</span>
  Lluís Bosch

  <span class=comanda>.AI</span>
  Universitat de Girona

  <span class=comanda>.AB</span>
  Això és un abstract, una introducció al teu document, freqüent als articles
  científico-tècnics.

  <span class=comanda>.NH</span>
  Títol del capítol 1

  <span class=comanda>.PP</span>
  Això és un paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf
  paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf
  paràgraf paràgraf paràgraf paràgraf.

  <span class=comanda>.NH</span>
  Títol del segon capítol

  <span class=comanda>.PP</span>
  Això és el segon paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf
  paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf paràgraf
  paràgraf paràgraf paràgraf paràgraf.

  <span class=comanda>.PP</span>
  Ara veurem unes equacions:

  <span class=comanda>.EQ</span>
    y = 3 sup x
  <span class=comanda>.EN</span>

  <span class=comanda>.EQ</span>
    y = sqrt x over z + 4 over x
  <span class=comanda>.EN</span>

  <span class=comanda>.EQ</span>
    y = sum from 1 to N x sup {y - y bar over alpha}
  <span class=comanda>.EN</span>
  </code>
</pre>

Compila el <inline>document.ms</inline> amb la següent comanda:
<pre class=prettyprint>
  <code>
  groff -e -t -ms document.ms -K utf-8 -T pdf &gt; document.ms.pdf
  # la opció -e activa les equacions (paquet 'eqn')
  # la opció -t activa les taules (paquet 'tbl')
  # la opció -ms activa el format 'ms' (hi ha diferents formats dins de groff)
  # la opció -K utf-8 ens permet poder escriure accents i símbols extranys
  # la opció -T pdf especifica que volem un .pdf (també es podria generar un .ps)
  </code>
</pre>

Enhorabona! Així es veu el teu primer document PDF fet amb <inline>groff</inline>:
</p><p>

<div>
  <embed src="adjunts/document.ms.pdf" width="100%" height="500px">
</div>

</p><p>

Fantàstic. Fins aquí ha sigut molt fàcil, però ara ho sofisticarem una mica.
Ara volem automatitzar la compilació del PDF (comanda anterior) perquè es
compili automàticament cada cop que guardem el fitxer.  Hem de crear un fitxer
anomenat <inline>Makefile</inline> per poder utilitzar la comanda
<inline>make</inline>:

<pre class=prettyprint>
  <code>
  #fitxer 'Makefile'
  #compilar "document.ms" a "document.ms.pdf"

  document.ms.pdf: document.ms
    groff -t -e -ms document.ms -T pdf -K utf-8 &gt; document.ms.pdf
  </code>
</pre>

<small>Nota: la tabulació al Makefile és important. Si hi ha espais enlloc d'un
tabulador, donarà error.</small>
</p><p>

Ara, comprovem que el PDF es compila quan fem la comanda:
<pre class=prettyprint>
  <code>
  make
  </code>
</pre>

La comanda <inline>make</inline> és intel·ligent i només compilarà si el
<inline>document.ms</inline> conté canvis.
</p><p>

Ara, farem servir la comanda <inline>entr</inline> per automatizar <inline>make</inline>.

Si no tens <inline>entr</inline> instal·lat, obre un terminal i fes:
<pre class=prettyprint>
  <code>
  sudo apt install entr # a linux (debian, ubuntu, etc)
  brew install entr     # a mac os x
  </code>
</pre>

Ara, executem <inline>entr</inline> de la forma següent:

<pre class=prettyprint>
  <code>
  echo document.ms | entr make
  </code>
</pre>

Voilà! Ara cada cop que fem un canvi i guardem el <inline>document.ms</inline>,
s'autocompilarà i podrem anar veient els canvis que anem fent. Una vegada ens
haguem acostumat a aquest sistema, no tornarem mai més enrere.
</p><p>

El paquet <inline>groff</inline> conté moltes més comandes que no hem vist en
aquest exemple. Per exemple, hem
vist que <inline>.TL</inline> serveix per especificar el títol.

Qualsevol cosa que ens poguem imaginar es pot fer amb <inline>groff</inline>:
taules de contingut, bibliografies, tipus de lletra, taules...
</p><p>

El següent document és una bona introducció (en anglès) per realitzar tot tipus de
coses amb <inline>groff</inline>:

<a href="../biblioteca/TheGroffFriendsHowto.pdf">The Groff and Friends HOWTO</a>
(evidentment, està fet amb <inline>groff</inline>).

</p><!--fi-->
<p>Salut!</p>
<p>Lluís</p>

</article><hr>

<a href=index.php>Blog</a>
