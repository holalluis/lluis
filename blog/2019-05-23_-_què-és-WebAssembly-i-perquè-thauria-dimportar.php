<!doctype html><html><head>
  <meta charset=utf-8>
  <link rel="stylesheet" href="../css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/favicon.png" type="image/x-icon">
  <title>Què és WebAssembly i perquè t'hauria d'importar</title>
</head><body><main>

<!--prettify code lib-->
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<style>
  pre.prettyprint {
    border-color:#eee;
    background:#eee;
    border-radius:3px;
  }
  inline {
    background:#eee;
    border-radius:3px;
    font-family:monospace;
  }
</style>
<h1>Què és WebAssembly i perquè t'hauria d'importar</h1><hr>
<!--data--><div><code>[2019-04-27]</code><div><hr>
<article><p>

<p>
El compilador emscripten (<inline>emcc</inline>) compila codi C i genera codi
Javascript. Imagina que tens un fitxer anomenat <inline>hola.c</inline> que
simplement mostra la paraula "hola" al terminal:
</p>

<pre class=prettyprint>
  <code>
  /* arxiu hola.c */
  #include&lt;stdio.h&gt;
  int main(){
    printf("hola\n");
    return 0;
  }
  </code>
</pre>

Compilem l'arxiu <inline>hola.c</inline> fent servir <inline>emcc</inline>:

<pre class=prettyprint>
  <code>
  $ emcc hola.c
  </code>
</pre>

<p>Hauries de veure dos arxius generats per aquesta comanda:
<inline>a.out.js</inline> i <inline>a.out.wasm</inline>.  El segon és un fitxer
WebAssembly que conté el codi compilat, i el primer és un fitxer Javascript que
conté el suport pel runtime per carregar-lo i executar-lo.  El pots executar
amb <inline>node.js</inline>:</p>

<pre class=prettyprint>
  <code>
  $ node a.out.js
  </code>
</pre>

Això mostra "hola" a la consola, tal i com s'espera.

<p>Emscripten també pot generar arxius HTML per testejar Javascript insertat
(embedded). Per generar HTML, fes servir la opció <inline>-o</inline> i especifica
un fitxer .html com a paràmetre:</p>

<pre class=prettyprint>
  <code>
  $ emcc hola.c -o hola.html
  </code>
</pre>

<p>Ara pots obrir el fitxer <inline>hola.html</inline> en un explorador web.</p>

<p><small>Nota:<br>

Per raons de seguretat molts exploradors no permeten peticions "file:// XHR", i no poden carregar fitxers extra requerits per l'HTML
(com per exemple el fitxer .wasm). Per aquests exploradors, necessites servir els fitxers fent servir un web server. La manera més senzilla
de fer això és amb <inline>python</inline>:

<pre class=prettyprint>
  <code>
  $ python -m SimpleHTTPServer 8080
  </code>
</pre>

Ara obre la direcció <inline>http://localhost:8080/hola.html</p>
</small></p>

<h3>Com instal·lar emcc</h3>

Si has arribat fins aquí deus estar al·lucinant. Per tant, vols instal·lar
<inline>emcc</inline> ja mateix, i començar a portar tots els programes fets en
C a Javascript. Aquí tens la guia per instal·lar <inline>emcc</inline>:

<pre class=prettyprint>
  <code>
  # obtenir repositori
  $ git clone https://github.com/emscripten-core/emsdk.git

  # entrar al repositori
  $ cd emsdk

  # descarrega i instal·la l'últim SDK
  $ ./emsdk install latest

  # fes l'últim SDK actiu per l'usuari actual. (escriu l'arxiu ~/.emscripten)
  $ ./emsdk activate latest

  # activa el PATH i altres variables d'entorn al terminal actual
  $ source ./emsdk_env.sh
  </code>
</pre>

<h3>Verifica la instal·lació</h3>
<pre class=prettyprint>
  <code>
  $ emcc -v
  </code>
</pre>

<p>Si alguna cosa ha sortit malament, mira la guia oficial a la <a
href="https://emscripten.org/docs/getting_started/downloads.html">web
oficial</a>.</p>

<p> Aviat veurem coses espectaculars als exploradors web gràcies a WebAssembly.  </p>

</p><!--fi-->
<p>Salut!</p>
<p>Lluís</p>

</article><hr>

<a href=index.php>Blog</a>
