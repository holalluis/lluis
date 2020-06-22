<?php include('css.php')?>

<h1>curl wttr.in</h1><hr>
<div><code>2019-06-21</code><div><hr><article>
<p>Vols saber quina és la previsió meteorològica sense haver de sortir del terminal? Fàcil, escriu la comanda:</p>

<pre class=prettyprint>
  <code>
  $ curl wttr.in
  </code>
</pre>

Resultat:
<pre style=background:none>
Informe del temps per a: Anglès, Spain

    \  /       Parcialment ennuvolat
  _ /"".-.     25..26 °C
    \_(   ).   ↑ 15 km/h
    /(___(__)  10 km
               0.2 mm
                                                       ┌─────────────┐
┌──────────────────────────────┬───────────────────────┤  dv 21 jun  ├───────────────────────┬──────────────────────────────┐
│             Matí             │             Dia       └──────┬──────┘      Tarda            │              Nit             │
├──────────────────────────────┼──────────────────────────────┼──────────────────────────────┼──────────────────────────────┤
│    \  /       Parcialment en…│    \  /       Parcialment en…│  _`/"".-.     Intervals de p…│  _`/"".-.     Ruixats de plu…│
│  _ /"".-.     25 °C          │  _ /"".-.     28 °C          │   ,\_(   ).   24..26 °C      │   ,\_(   ).   20 °C          │
│    \_(   ).   ↖ 7-9 km/h     │    \_(   ).   ← 9-10 km/h    │    /(___(__)  ↙ 6-7 km/h     │    /(___(__)  ↗ 3-5 km/h     │
│    /(___(__)  10 km          │    /(___(__)  9 km           │     ⚡‘‘⚡‘‘  10 km          │      ‘ ‘ ‘ ‘  10 km          │
│               0.0 mm | 0%    │               0.2 mm | 49%   │     ‘ ‘ ‘ ‘   0.7 mm | 62%   │     ‘ ‘ ‘ ‘   0.4 mm | 63%   │
└──────────────────────────────┴──────────────────────────────┴──────────────────────────────┴──────────────────────────────┘
                                                       ┌─────────────┐
┌──────────────────────────────┬───────────────────────┤  ds 22 jun  ├───────────────────────┬──────────────────────────────┐
│             Matí             │             Dia       └──────┬──────┘      Tarda            │              Nit             │
├──────────────────────────────┼──────────────────────────────┼──────────────────────────────┼──────────────────────────────┤
│    \  /       Parcialment en…│    \  /       Parcialment en…│    \  /       Parcialment en…│    \  /       Parcialment en…│
│  _ /"".-.     23..24 °C      │  _ /"".-.     26..27 °C      │  _ /"".-.     23..25 °C      │  _ /"".-.     20 °C          │
│    \_(   ).   ← 5-6 km/h     │    \_(   ).   ↖ 11-12 km/h   │    \_(   ).   ↑ 12-13 km/h   │    \_(   ).   ↗ 6-10 km/h    │
│    /(___(__)  10 km          │    /(___(__)  10 km          │    /(___(__)  10 km          │    /(___(__)  10 km          │
│               0.0 mm | 0%    │               0.0 mm | 0%    │               0.0 mm | 0%    │               0.0 mm | 0%    │
└──────────────────────────────┴──────────────────────────────┴──────────────────────────────┴──────────────────────────────┘
                                                       ┌─────────────┐
┌──────────────────────────────┬───────────────────────┤  dg 23 jun  ├───────────────────────┬──────────────────────────────┐
│             Matí             │             Dia       └──────┬──────┘      Tarda            │              Nit             │
├──────────────────────────────┼──────────────────────────────┼──────────────────────────────┼──────────────────────────────┤
│    \  /       Parcialment en…│     \   /     Assolellat     │     \   /     Assolellat     │     \   /     Assolellat     │
│  _ /"".-.     27 °C          │      .-.      31 °C          │      .-.      28..29 °C      │      .-.      24..26 °C      │
│    \_(   ).   ↑ 6 km/h       │   ― (   ) ―   ↑ 13-15 km/h   │   ― (   ) ―   ↖ 10-12 km/h   │   ― (   ) ―   ↗ 4-6 km/h     │
│    /(___(__)  10 km          │      `-’      10 km          │      `-’      10 km          │      `-’      10 km          │
│               0.0 mm | 0%    │     /   \     0.0 mm | 0%    │     /   \     0.0 mm | 0%    │     /   \     0.0 mm | 0%    │
└──────────────────────────────┴──────────────────────────────┴──────────────────────────────┴──────────────────────────────┘
</pre>

<p>A més, hi ha diverses opcions (traduït de <a href="https://wttr.in/:help">https://wttr.in/:help</a>):

<pre>Instruccions:

    $ curl wttr.in          # el clima a la ubicació actual
    $ curl wttr.in/muc      # el clima a l'aeroport de Munich

Tipus d'ubicacions soportades:

    /paris                  # el nom d'una ciutat
    /~Eiffel+tower          # el nom de qualsevol lloc famós
    /Москва                  # el nom Unicode de qualsevol lloc en qualsevol idioma
    /muc                    # el codi d'un aeroport (3 lletres)
    /@stackoverflow.com     # el nom d'un domini web
    /94107                  # un codi d'àrea
    /-78.46,106.79          # coordenades GPS

Llocs especials:

    /moon                   # la fase de la lluna (afegeix ,+US o ,+France per aquests països)
    /moon@2016-10-25        # la fase de la lluna a una data concreta (@2016-10-25)

Unitats:

    ?m                      # mètriques (SI) (estàndard a tots els llocs excepte EEUU)
    ?u                      # Sistema Unificat de Classificació del Sòl o USCS (estàndard EEUU)
    ?M                      # velocidat del vent en m/s

Opcions de visualizació:

    ?0                      # només el clima actual
    ?1                      # el clima actual + la previsió d'1 dia
    ?2                      # el clima actual + la previsió de 2 dies
    ?n                      # versió curta (només dia i nit)
    ?q                      # versió silenciosa (sense el text "El temps a")
    ?Q                      # versió supersilenciosa (ni "El temps a" ni el nom de la ciutat)
    ?T                      # desactiva les seqüències del terminal (sense colors)

Opcions de PNG:

    /paris.png              # genera una imatge PNG
    ?p                      # afegeix un marc al voltant de la imatge
    ?t                      # transparència 150
    transparency=...        # transparència de 0 a 255 (255 = sense transparència)

Les opcions es poden utilitzar conjuntament:

    /Paris?0pq
    /Paris?0pq&amp;lang=fr
    /Paris_0pq.png          # en PNG les opcions s'especifiquen després del caràcter "_"
    /Rome_0pq_lang=it.png   # una llarga seqüència d'opcions es pot separar amb el caràcter "_"

Ubicació:

    $ curl fr.wttr.in/Paris
    $ curl wttr.in/paris?lang=fr
    $ curl -H "Accept-Language: fr" wttr.in/paris

Idiomes soportats:

    af da de fr fa et id it nb nl pl pt-br ro ru uk

Idiomes en progrés:
    az be bg bs ca cy cs el eo es fi ga hi hr hu hy
    is ja jv ka kk ko ky lt lv mk ml nl fy nn pt pt-br
    sk sl sr sr-lat sv sw th tr te uz vi zh zu he

URLs especials:

    /:help                  # aquesta pàgina
    /:bash.function         # suggereix una funció wttr() a bash
    /:translation           # mostra informació sobre els traductors
</pre>

<p>Wttr.in ha estat creat per <a href="https://twitter.com/igor_chubin">Igor Chubin</a>.</p>

<!--fi--><p>Salut!</p><p>Lluís</p>
