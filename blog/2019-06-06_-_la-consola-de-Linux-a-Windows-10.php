<?php include('css.php')?>

<h1>La consola de Linux a Windows 10</h1><hr>
<div><code>2019-06-06</code><div><hr><article>

<p>Linux a Windows és una realitat gràcies a la col·laboració entre
Canonical (l'empresa creadora d'Ubuntu) i Microsoft. El hashtag
#BashOnWindows va ser trending a les xarxes durant uns dies.</p>

<h3>Què és Bash a Windows?</h3>

<p>"Bash on Windows" és un subsistema de Windows dins del qual s'hi pot
executar Ubuntu (una distribució de Linux). No és una màquina virtual, ni un
emulador, com ara Cygwin (del qual vaig ser feliç usuari durant alguns anys).
És un sistema Linux sencer dins de Windows 10.</p>

<p>Bàsicament, utilitzem el mateix shell (Bash) que es troba per defecte a la
majoria de distribucions de Linux. D'aquesta manera, pots executar comandes de
Linux dins de Windows sense haver d'instal·lar màquines virtuals o tenir
particions al disc dur.  S'instal·la dins de Windows 10 com si fos un programa
normal. És una boníssima oportunitat per aprendre comandes Linux/Unix si ets
un principiant en aquest món.</p>

<h3>Pas 1: Activar el "Windows Subsystem"</h3>
<p>Vés al menú Inici i busca el programa <inline>Powershell</inline>. Executa'l
com a administrador.  Una vegada obert, fes servir la comanda
següent per activar Bash a Windows 10:</p>

<pre class=prettyprint>
  <code>
  Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux
  </code>
</pre>

<small>Nota: és important tenir el Windows 10 actualitzat a la última versió possible perquè la comanda anterior funcioni correctament.</small>

<p>Se't demanarà confirmar, apreta "Y" i Enter:</p>
<img src="adjunts/Powershell-Ubuntu-install-2.jpeg">

<p>Ara et demanarà reiniciar. Diga-li que sí, i no et preocupis que jo t'espero aquí.</p>

<h3>Pas 2: Descarrega Linux des del Windows Store</h3>
<p>Obre el programa Windows Store i busca "Linux".</p>
<img src="adjunts/install-ubuntu-windows-10-linux-subsystem-3-1.jpeg">

<p>Veuràs la opció d'instal·lar Ubuntu o SUSE. Jo vaig instal·lar Ubuntu perquè hi
estic més familiaritzat, però la diferència hauria de ser molt petita. L'únic
que canvia és la manera d'instal·lar-hi programes (per exemple, Ubuntu
utilitza la comanda <inline>apt</inline> per instal·lar nous programes, i SUSE, <inline>zypper</inline>).</p>

<img src="adjunts/install-ubuntu-windows-10-linux-subsystem-7.jpeg">

<p>La instal·lació ocupa 1 Gb aproximadament.</p>

<h3>Pas 3: Executa Linux</h3>

<p> Ja gairebé ho tens. Una vegada instal·lat, és hora d'accedir a Bash dins de
Windows 10.  Obre el menú Inici i busca l'aplicació instal·lada (Ubuntu o SUSE,
la que hagis instal·lat). Veuràs que s'executa com qualsevol programa normal de
Windows. El primer cop que l'obris tardarà una estona ja que s'instal·larà tot
el sistema operatiu des dels repositoris oficials. Llavors
et demanarà un nom d'usuari i una contrasenya d'administrador.</p>

<img src="adjunts/install-ubuntu-windows-10-linux-subsystem-10.jpeg">

<p> Només caldrà fer aquests passos la primera vegada.  A partir d'ara, Bash
estarà disponible de manera immediata.</p>

<p>Bàsicament, des d'aquesta pantalleta negra pots fer gairebé qualsevol cosa
que et puguis imaginar: invocar programes, crear nous programes (programar),
gestionar fitxers, connectar-te a servidors remots, sincronitzar fitxers entre
ordinadors, llegir el correu, escriure un blog, automatitzar tasques..., la
teva imaginació és el límit.</p>

<p>És molt senzill trobar tutorials per fer els teus primers passos a bash, com ara aquest:</p>
<iframe width="560" height="315" src="https://www.youtube.com/embed/QGvvJO5UIs4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<p>Gaudeix de Linux dins de Windows 10.</p>

<!--fi--><p>Salut!</p><p>Lluís</p>
