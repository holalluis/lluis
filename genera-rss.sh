echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0"><channel>
<title>Lluís Mª Bosch</title>
<description>Lluís Mª Bosch</description>
<language>ca</language>
<link>https://lluis.ovh/lluis/rss.xml</link>
';

cd blog;

for article in $(ls --sort time| grep '_-_');
do
  titol=$(echo ${article:13:-4}|sed "s/[_-]/ /g")
  data=${article:0:10}

  echo "<item>";
  echo "<title>$titol</title>";
  echo "<pubDate>$data</pubDate>";
  echo "<link>https://lluis.ovh/lluis/blog/$article</link>";
  echo "<description><![CDATA[nou article al blog!]]></description>";
  echo "</item>";
done

echo '</channel></rss>';
