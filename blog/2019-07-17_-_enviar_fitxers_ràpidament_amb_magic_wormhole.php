<?php include('css.php')?>

<h1>enviar fitxers ràpidament amb magic wormhole</h1><hr>
<div><code>2019-07-17</code><div><hr><article>

<p>
Volem enviar el fitxer <inline>README.txt</inline> d'un ordinador a un altre, de forma
ultra-ràpida i segura. Executem la comanda:
</p>

<pre class=prettyprint>
  <code>
  $ wormhole send README.txt
  </code>
</pre>

Resultat:
<pre class=prettyprint>
  <code>
  Sending 6.6 kB file named 'README.txt'
  Wormhole code is: 22-leprosy-scenic
  On the other computer, please run:
  wormhole receive 22-leprosy-scenic
  </code>
</pre>

<p>
A l'altre ordinador (remot), executem la comanda 'receive' amb el codi d'un
sol ús, generat al primer ordinador: en aquest cas, '22-leprosy-scenic':
</p>

<pre class=prettyprint>
  <code>
  $ wormhole receive 22-leprosy-scenic
  </code>
</pre>

Resultat a l'ordinador remot:
<pre class=prettyprint>
  <code>
  Receiving file (6.6 kB) into: README.txt
  ok? (y/N): y
  Receiving (-&gt;tcp:192.168.1.140:58561)..
  100% | 6.62k/6.62k [00:00&lt;00:00, 52.7kB/s]
  Received file written to README.txt
  </code>
</pre>

<p>Fet! Ràpid i senzill.</p>

<p>
  Per tasques senzilles, <inline>wormhole</inline> és molt més apropiat que
  <inline>rsync</inline>, <inline>scp</inline>, i similars, que estan més
  pensats per servidors, o ordinadors que prèviament hem configurat amb
  accés <inline>ssh</inline>, i dels quals necessitem saber la direcció ip.
  En aquest cas, és un gran avantatge no haver de saber la ip, i només haver
  de saber el codi generat d'un sol ús.  També pot ser útil durant converses
  per missatgeria instantània, videotrucada, o per telèfon, ja que els codis
  generats es poden dir fàcilment per telèfon.
</p>

<h3>Instal·lació</h3>
<pre class=prettyprint>
  <code>
  $ sudo apt install magic-wormhole # debian, ubuntu
  $ brew install magic-wormhole     # OS X
  $ pip install magic-wormhole      # windows
  </code>
</pre>

<p>
  Documentació oficial:
  <a href="https://magic-wormhole.readthedocs.io/en/latest/welcome.html">https://magic-wormhole.readthedocs.io/en/latest/welcome.html</a>
</p>

<!--fi--><p>Salut!</p><p>Lluís</p>
