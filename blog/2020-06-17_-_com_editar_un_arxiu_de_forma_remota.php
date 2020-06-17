<?php include('css.php')?>
<h1>com editar un arxiu de forma remota</h1><hr>
<div><code>2020-06-17</code><div><hr><article>

Vols editar un fitxer que tens a un servidor remot sense haver d'entrar per
<inline>ssh</inline>? Fàcil:

<pre class=prettyprint>
  <code>
  $ vim scp://usuari@host/ruta-completa-a-arxiu.txt
  </code>
</pre>

Per exemple, vols editar l'arxiu <inline>tasques.txt</inline>que està a la
carpeta home ("<inline>~/</inline>") de l'usuari <inline>root</inline>:

<pre class=prettyprint>
  <code>
  $ vim scp://root@lluis.ovh/~/tasques.txt
  </code>
</pre>

Vim permet editar de forma local arxius remots fent servir el protocol
<inline>scp://</inline>.  La diferència entre fer-ho així o entrar per
<inline>ssh</inline> al servidor i llavors executar la comanda <inline>vim
arxiu.txt</inline> és que l'editor de text s'executa al teu ordinador enlloc
d'executar-se al servidor.

Si tens arxius que edites de forma habitual, pots crear un
<inline>alias</inline> per editar-lo ràpidament.

<pre class=prettyprint>
  <code>
  $ alias tasques='vim scp://root@lluis.ovh/~/tasques.txt'
  </code>
</pre>

Aquest petit truc és útil per poder editar fitxers ràpidament si treballes des
de diferents ordinadors.

<p>Salut!</p><p>Lluís</p></article><hr><a href=index.php>Blog</a>
