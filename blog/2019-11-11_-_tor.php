<?php include('css.php')?>
<h1>tor</h1><hr>
<div><code>2019-11-11</code><div><hr><article>

La comanda <inline>tor</inline> permet fer networking de forma anònima.
<br><br>

No parlaré de <inline>Tor Browser</inline>, que és un explorador web amb
<inline>tor</inline> incorporat, i que molta gent ja coneix, sinó que explicaré
amb un exemple com fer servir la comanda <inline>tor</inline> per terminal, que
fa que qualsevol comanda que executem sigui anònima.
<br><br>

La xarxa <inline>tor</inline> funciona així: les peticions entrants a la xarxa
queden amagades enmig d'una sèrie de redireccions aleatòries distribuïdes entre
ordinadors de tot el món que fa pràcticament impossible rastrejar direccions
ip.
<br><br>

Veiem un exemple des de zero: imaginem que <b>no</b> fem servir
<inline>tor</inline>, i la nostra ip pública és <inline>1.1.1.1</inline>.
Aquesta ip és la que la nostra companyia telefònica li ha assignat al nostre
router.
<br><br>

Fem una consulta a la pàgina web <inline>'example.com'</inline>, amb la comanda
<inline>curl</inline>.

<pre class=prettyprint><code>
  $ curl 'example.com'
</code>
</pre>

El resultat serà que veurem directament el codi de la pàgina web '<a href='//example.com/index.html'>example.com/index.html</a>' al terminal:

<pre class=prettyprint><code>
  &lt;!doctype html&gt;
  &lt;html&gt;
  &lt;head&gt;
    &lt;title>Example Domain&lt;/title&gt;
    &lt;meta charset="utf-8" /&gt;
    &lt;meta http-equiv="Content-type" content="text/html; charset=utf-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
    [...]
</code>
</pre>

La petició que acabem de fer té aquesta representació esquemàtica:

<pre class=prettyprint><code>
  +------------------+     +----------------------------+
  | el teu ordinador | --> | servidor web 'example.com' |
  +------------------+     +----------------------------+
               1.1.1.1     registre:
                           "1.1.1.1 ha consultat 'index.html' a les 14:45"
</code>
</pre>

Algú que tingui accés al registre d'<inline>example.com</inline>, o que estigui
espiant la xarxa al moment de la consulta, si d'alguna manera averigua que
<inline>1.1.1.1</inline> som nosaltres, o pregunta a la nostra companyia
telefònica "<i>qui és la persona que tenia la direcció ip <inline>1.1.1.1</inline>
a les 14:45?</i>", llavors ja ens hauran identificat.
<br><br>

Ara bé, si fem servir <inline>tor</inline>, la nostra petició,
després de ser redireccionada unes quantes vegades, imaginem que va a parar a
la direcció aleatòria <inline>4.4.4.4</inline>, que pot ser un ordinador que
estigui a qualsevol lloc del món. El que passarà ara és:

<pre class=prettyprint><code>
+------------------+      +---------+      +---------------------------+
| el teu ordinador | ---> |   tor   | ---> | servidor web 'example.com'|
+------------------+      |         |      +---------------------------+
             1.1.1.1      | 1.1.1.1 |      registre:
                          |    ↓    |      "4.4.4.4 consulta 'index.html' a les 14:45"
                          | 2.2.2.2 |
                          |    ↓    |
                          | 3.3.3.3 |
                          |    ↓    |
                          | 4.4.4.4 |
                          +---------+
</code>
</pre>

El servidor web rep una petició de <inline>4.4.4.4</inline>. Llavors el
servidor contesta a <inline>4.4.4.4</inline> el codi html demanat: la resposta
del servidor viatja enrere fins a <inline>1.1.1.1</inline> pel mateix camí
d'anada.
<br><br>

La nostra companyia només sap que ens hem connectat a <inline>2.2.2.2</inline>.
Si el trànsit està xifrat amb SSL (https) la companyia no pot llegir el
contingut del codi html que està anant cap a <inline>1.1.1.1</inline>, per
tant, no pot veure què estem fent, només pot veure que hi ha trànsit encriptat
entre dues direccions ip.
<br><br>

Per tant, és pràcticament impossible d'associar que la persona responsable de
la consulta web feta per <inline>4.4.4.4</inline> és realment
<inline>1.1.1.1</inline>, ja que la persona que vol esbrinar la identitat de
<inline>4.4.4.4</inline> hauria d'anar ordinador per ordinador a veure el camí
que fan els paquets de dades <b>durant el moment de la transmissió</b>, ja que
una vegada es tanca el circuit, el camí de direccions IP s'oblida i no queda
guardat enlloc.
<br><br>

Per complicar-ho una mica més, sempre podem fer un reset a <inline>tor</inline>
(simplement parant i reexecutant la comanda), i obtenir un nou circuit aleatori
de direccions ip.  Ara consultem una altra pàgina web
<inline>'unaaltrapagina.html'</inline>, i ara tenim la nova ip de sortida
<inline>5.5.5.5</inline>:

<pre class=prettyprint><code>
+------------------+      +-----+      +---------------------------+
| el teu ordinador | ---> | tor | ---> | servidor web 'example.com'|
+------------------+      +-----+      +---------------------------+
ip:                                    registre:
"1.1.1.1"                              "4.4.4.4 consulta 'index.html' a les 14:45"
                                       "5.5.5.5 consulta 'unaaltrapagina.html' a les 14:46"
</code>
</pre>

Si algú sap la nostra ip real (<inline>1.1.1.1</inline>), i es dedica a espiar
la nostra xarxa per veure a quins servidors ens connectem, o busca la nostra ip
als registres d'un servidor web al qual hem accedit amb <inline>tor</inline>,
mai podrà saber que la ip <inline>5.5.5.5</inline> és realment la direcció
<inline>1.1.1.1</inline>, simplement veurà com tot el trànsit va a parar a
<inline>2.2.2.2,</inline>, no podrà espiar tota la xarxa <inline>tor</inline>,
ja que està descentralitzada per tot el món.
<br><br>

Cal remarcar que no serveix de res connectar-se a <inline>tor</inline> si
llavors ens identifiquem a pàgines com ara facebook o gmail, ja que llavors ja
hi haurà en algun servidor del món algú que podrà associar la ip provinent de
tor a la persona identificada.

<p>Per instal·lar la comanda <inline>tor</inline>, ho fem com sempre: </p>
<pre class=prettyprint>
  <code>
  $ sudo apt install tor # linux (debian, ubuntu)
  $ brew install tor     # mac os x
  </code>
</pre>

<p>Per executar <inline>tor</inline>, fem: </p>
<pre class=prettyprint>
  <code>
  $ tor
  </code>
</pre>

I tot seguit veurem com el programa es va connectant progressivament a la
xarxa, i estarà a punt quan marqui 100%.

<p>Alternativament també el podem executar al background (com un "servei"): </p>
<pre class=prettyprint>
  <code>
  $ service start tor       # linux (debian, ubuntu)
  $ brew services start tor # mac os x
  </code>
</pre>

Una vegada executat <inline>tor</inline>, el nostre ordinador es connectarà a
la xarxa i passarà a formar-ne part. Internament, la comanda crea un "socket" a
la nostra ip local, al port 9050, (tot i que podem fer servir el port que
vulguem, simplement el 9050 és el que es fa servir per defecte).
<br><br>

És a dir, el nostre punt d'entrada local a <inline>tor</inline> és:
<inline>127.0.0.1:9050</inline>, o bé, el que és el mateix,
<inline>localhost:9050</inline>.  Ara que ja tenim punt d'entrada, necessitem
redireccionar el trànsit que generem cap al port 9050.
<br><br>

Per fer això podem fer servir la comanda <inline>torify</inline>, que
s'instal·la juntament amb <inline>tor</inline>, i que ens estalvia haver-ho de
fer manualment amb eines com ara <inline>netcat</inline>.
<br><br>

Per exemple, executem la comanda <inline>curl icanhazip.com</inline> amb i
sense <inline>torify</inline>, per veure'n la diferència.  La pàgina <a
href=//icanhazip.com>icanhazip.com</a> és una pàgina molt senzilla que
simplement et diu quina direcció ip tens.
<br><br>

Seguint l'exemple anterior amb les mateixes direccions ip, si <b>no</b> fem
servir <inline>torify</inline>, veurem el següent resultat:
<pre class=prettyprint>
  <code>
  $ curl icanhazip.com
  </code>
  <code>
  1.1.1.1
  </code>
</pre>

Amb <inline>torify</inline>, veurem la ip del punt de sortida:
<pre class=prettyprint>
  <code>
  $ torify curl icanhazip.com
  </code>
  <code>
  4.4.4.4
  </code>
</pre>

En resum: si necessitem executar una comanda de terminal que fa algun tipus de
connexió a internet i no volem que se sàpiga que hem sigut nosaltres, fem
servir <inline>tor</inline> + <inline>torify</inline>.
<br><br>

L'exemple més típic pel que podem fer servir <inline>tor</inline> és accedir a
un xat IRC de forma anònima, fent servir algun client IRC per terminal, com ara
<inline>irssi</inline>.

<!--fi--><p>Salut!</p><p>Lluís</p></article><hr><a href=index.php>Blog</a>
