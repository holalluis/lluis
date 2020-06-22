<?php include('css.php')?>
<link rel="stylesheet" type="text/css" href="asciinema-player/asciinema-player.css">
<h1>espai lliure</h1><hr>
<div><code>2020-01-14</code><div><hr><article>

La comanda <inline>df</inline> mostra estadístiques sobre l'espai lliure de les
particions del disc dur:

<pre class=prettyprint><code>
  $ df
</code>
</pre>
<pre><code>
Filesystem    512-blocks      Used Available Capacity iused               ifree %iused  Mounted on
/dev/disk1s1   236568496 215075880  12809696    95% 1119430 9223372036853656377    0%   /
/dev/disk1s4   236568496   6292176  12809696    33%       3 9223372036854775804    0%   /private/var/vm
/dev/disk1s3   236568496   2023320  12809696    14%      38 9223372036854775769    0%   /Volumes/Recovery
</code>
</pre>

Per defecte, <inline>df</inline> mostra el nombre de blocs de 512 bytes (és a
dir, blocs de 0.5 kB) disponibles. Per veure un format més llegible fem servir
la opció <inline>-H</inline> (la lletra 'H' vol dir 'human readable'):

<pre class=prettyprint><code>
  $ df -H
</code>
</pre>
<pre><code>
Filesystem      Size   Used  Avail Capacity iused               ifree %iused  Mounted on
/dev/disk1s1    121G   110G   6.6G    95% 1119561 9223372036853656246    0%   /
/dev/disk1s4    121G   3.2G   6.6G    33%       3 9223372036854775804    0%   /private/var/vm
/dev/disk1s3    121G   1.0G   6.6G    14%      38 9223372036854775769    0%   /Volumes/Recovery
</code>
</pre>

Si només volem veure la partició principal, fem servir <inline>grep</inline>
per filtrar el resultat amb la paraula 'disk1s1', que en aquest cas és el nom
de la meva partició principal:

<pre class=prettyprint><code>
  $ df -H | grep disk1s1
</code>
</pre>
<pre><code>
/dev/disk1s1    121G   110G   6.6G    95% 1119561 9223372036853656246    0%   /
</code>
</pre>

Encara podem fitrar més el resultat amb la comanda <inline>awk</inline>. En
aquest cas, la dada que volem està a la quarta columna:

<pre class=prettyprint><code>
  $ df -H | grep disk1s1 | awk '{print $4}'
</code>
</pre>
<pre><code>
6.6G
</code>
</pre>

Perfecte! Amb aquesta línia de codi tenim just el resultat que volem.  Per
cridar-la ràpidament, podem crear un alias:

<pre class=prettyprint><code>
  $ alias espai="df -H | grep disk1s1 | awk '{print \$4}'"
</code>
</pre>

<small>Nota: cal posar una contra-barra ('\') davant del símbol '$' perquè funcioni.</small>

<br><br>
Ara, simplement cridem el nou alias:

<pre class=prettyprint><code>
  $ espai
</code>
</pre>

<pre><code>
6.6G
</code>
</pre>

Si vols tenir aquest alias disponible sempre, has d'afegir la línia d'alias
anterior a l'arxiu <inline>~/.bashrc</inline>. Sinó, deixarà d'estar disponible
quan tanquis la sessió.

<br><br>

Aquí pots veure un vídeo molt breu de tot el procés:

<br><br>
<asciinema-player src="asciinema-player/df.cast"></asciinema-player>
<script src="asciinema-player/asciinema-player.js"></script>

<br><br>

<!--fi--><p>Salut!</p><p>Lluís</p>
