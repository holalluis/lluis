<?php include('css.php')?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<h1>Com comptar fins a 31 amb una sola mà</h1><hr>
<div><code>2020-11-15</code><div><hr><article>
<p>
  Una mà humana té 5 dits, els quals es poden fer servir com a representació
  visual de 5 bits. Un bit només pot valer 0 ò 1, (dit baixat=<span style=background:gold>0</span>, dit aixecat=<span style=background:orange>1</span>).
</p>

<p>
  Amb "n" bits es poden representar "2<sup>n</sup>" números.
</p>

<p>
  Per tant, amb 5 bits podem comptar fins a 31, ja que 2<sup>5</sup>=32. Com
  que el zero també és un número, ("0" és "00000" i "31" és "11111" en binari),
  per això n'hem de restar un.

  A la següent taula hi ha la representació gràfica de les posicions
  dels dits per poder representar tots els números del 0 al 31:
</p>

<div id=app>
  <table border=1>
    <tr>
      <th rowspan=2>Números<br>de 0 a 31<th colspan=5>Dit
      <th rowspan=2>Esquema/dibuix mà
    </tr>
    <tr> <th>Petit<th>Anular<th>Mig<th>Index<th>Polze
    <tr v-for="n in 32">
      <th>{{n-1}}</th>
      <td v-for="c in converteix_n_a_binari(n-1)"
        :style="{background:c=='1'?'orange':'gold'}"
      >
        {{c}}
      </td>
      <td>
        <div class=ma>
          <div class=dits>
            <div class="dit petit"  :plegat="converteix_n_a_binari(n-1)[0]=='0'"></div>
            <div class="dit anular" :plegat="converteix_n_a_binari(n-1)[1]=='0'"></div>
            <div class="dit mig"    :plegat="converteix_n_a_binari(n-1)[2]=='0'"></div>
            <div class="dit index"  :plegat="converteix_n_a_binari(n-1)[3]=='0'"></div>
          </div>
          <div class=palmell>
            <div class="dins"></div>
            <div class="dit polze" :plegat="converteix_n_a_binari(n-1)[4]=='0'"></div>
          </div>
        </div>
      </td>
    </tr>
  </table>
</div>

<p>Salut!</p><p>Lluís</p>

<script>
  let app = new Vue({
    el:"#app",
    data:{
    },
    methods:{
      converteix_n_a_binari(n){
        let str = n.toString(2);
        while(str.length<5){
          str = "0"+str;
        }
        return str.split("");
      },
    },
  });
</script>

<style>
  table {
    border-collapse:collapse;
    text-align:center;
  }
  th {
    background:#eee;
  }

  div.ma{
    margin:auto;
    width:70px;
    padding:10px 0;
  }
  div.ma div.dits{
    display:flex;
    align-items:flex-end;
  }
  div.ma div.dits div.dit{
    border:1px solid #aaa;
    background:orange;
    align-items:bottom;
    border-radius:5px 5px 0 0;
    width:10px;
  }
  div.ma div.dits div.dit.petit{
    height:30px;
    transform:rotate(-5deg); 
  }
  div.ma div.dits div.dit.anular{
    height:35px;
    transform:rotate(-4deg); 
  }
  div.ma div.dits div.dit.mig{
    height:40px;
  }
  div.ma div.dits div.dit.index{
    height:35px;
    transform:rotate(5deg); 
  }

  div.ma div.dits div.dit[plegat]{
    height:10px;
    background:gold;
  }
  div.ma div.palmell{
    display:flex;
    align-items:flex-start;
  }
  div.ma div.palmell div.dins{
    border-radius:0 0 5px 5px;
    width:46px;
    height:35px;
    border:1px solid #aaa;
    background:gold;
  }

  div.dit.polze{
    border-radius:5px 5px 0 0;
    background:orange;
    border:1px solid #aaa;
    height:25px;
    width:10px;
    transform:rotate(40deg); 
    margin-left:-3px;
  }
  div.dit.polze[plegat]{
    background:gold;
    margin-left:-20px;
    transform:rotate(-40deg); 
  }
</style>

