<html>
        <head>
            <style>
                @import "button.css";
            </style>
            <h1 class="title">FATTURA ONLINE </h1>
        </head>
        <body bgcolor="#f5f5dc">
        <table border="1" class="box" align="center" width="auto">
            <tr>
        <td><form method="get" action="invoice.php">
            <h4><b>Fattura n°:
                    <input type="number" name="fn" value=""><br><br>
            <h4><b>Nome/Azienda:
            <input type="text" name="nome" value="">
                    <br><br>
            Indirizzo:
            <input type="text" name="indirizzo" value="">
                    Città:
                    <input type="text" name="città" value="">
                    Provincia:
                    <select name="provincia">
                        <option value="ag">Agrigento</option>
                        <option value="al">Alessandria</option>
                        <option value="an">Ancona</option>
                        <option value="ao">Aosta</option>
                        <option value="ar">Arezzo</option>
                        <option value="ap">Ascoli Piceno</option>
                        <option value="at">Asti</option>
                        <option value="av">Avellino</option>
                        <option value="ba">Bari</option>
                        <option value="bt">Barletta-Andria-Trani</option>
                        <option value="bl">Belluno</option>
                        <option value="bn">Benevento</option>
                        <option value="bg">Bergamo</option>
                        <option value="bi">Biella</option>
                        <option value="bo">Bologna</option>
                        <option value="bz">Bolzano</option>
                        <option value="bs">Brescia</option>
                        <option value="br">Brindisi</option>
                        <option value="ca">Cagliari</option>
                        <option value="cl">Caltanissetta</option>
                        <option value="cb">Campobasso</option>
                        <option value="ci">Carbonia-iglesias</option>
                        <option value="ce">Caserta</option>
                        <option value="ct">Catania</option>
                        <option value="cz">Catanzaro</option>
                        <option value="ch">Chieti</option>
                        <option value="co">Como</option>
                        <option value="cs">Cosenza</option>
                        <option value="cr">Cremona</option>
                        <option value="kr">Crotone</option>
                        <option value="cn">Cuneo</option>
                        <option value="en">Enna</option>
                        <option value="fm">Fermo</option>
                        <option value="fe">Ferrara</option>
                        <option value="fi">Firenze</option>
                        <option value="fg">Foggia</option>
                        <option value="fc">Forl&igrave;-Cesena</option>
                        <option value="fr">Frosinone</option>
                        <option value="ge">Genova</option>
                        <option value="go">Gorizia</option>
                        <option value="gr">Grosseto</option>
                        <option value="im">Imperia</option>
                        <option value="is">Isernia</option>
                        <option value="sp">La spezia</option>
                        <option value="aq">L'aquila</option>
                        <option value="lt">Latina</option>
                        <option value="le">Lecce</option>
                        <option value="lc">Lecco</option>
                        <option value="li">Livorno</option>
                        <option value="lo">Lodi</option>
                        <option value="lu">Lucca</option>
                        <option value="mc">Macerata</option>
                        <option value="mn">Mantova</option>
                        <option value="ms">Massa-Carrara</option>
                        <option value="mt">Matera</option>
                        <option value="vs">Medio Campidano</option>
                        <option value="me">Messina</option>
                        <option value="mi">Milano</option>
                        <option value="mo">Modena</option>
                        <option value="mb">Monza e della Brianza</option>
                        <option value="na">Napoli</option>
                        <option value="no">Novara</option>
                        <option value="nu">Nuoro</option>
                        <option value="og">Ogliastra</option>
                        <option value="ot">Olbia-Tempio</option>
                        <option value="or">Oristano</option>
                        <option value="pd">Padova</option>
                        <option value="pa">Palermo</option>
                        <option value="pr">Parma</option>
                        <option value="pv">Pavia</option>
                        <option value="pg">Perugia</option>
                        <option value="pu">Pesaro e Urbino</option>
                        <option value="pe">Pescara</option>
                        <option value="pc">Piacenza</option>
                        <option value="pi">Pisa</option>
                        <option value="pt">Pistoia</option>
                        <option value="pn">Pordenone</option>
                        <option value="pz">Potenza</option>
                        <option value="po">Prato</option>
                        <option value="rg">Ragusa</option>
                        <option value="ra">Ravenna</option>
                        <option value="rc">Reggio di Calabria</option>
                        <option value="re">Reggio nell'Emilia</option>
                        <option value="ri">Rieti</option>
                        <option value="rn">Rimini</option>
                        <option value="rm">Roma</option>
                        <option value="ro">Rovigo</option>
                        <option value="sa">Salerno</option>
                        <option value="ss">Sassari</option>
                        <option value="sv">Savona</option>
                        <option value="si">Siena</option>
                        <option value="sr">Siracusa</option>
                        <option value="so">Sondrio</option>
                        <option value="ta">Taranto</option>
                        <option value="te">Teramo</option>
                        <option value="tr">Terni</option>
                        <option value="to">Torino</option>
                        <option value="tp">Trapani</option>
                        <option value="tn">Trento</option>
                        <option value="tv">Treviso</option>
                        <option value="ts">Trieste</option>
                        <option value="ud">Udine</option>
                        <option value="va">Varese</option>
                        <option value="ve">Venezia</option>
                        <option value="vb">Verbano-Cusio-Ossola</option>
                        <option value="vc">Vercelli</option>
                        <option value="vr">Verona</option>
                        <option value="vv">Vibo valentia</option>
                        <option value="vi">Vicenza</option>
                        <option value="vt">Viterbo</option>
                    </select>
                    <br><br>
                    CAP:
                    <input type="text" name="cap" value="">
                    P.IVA/C.F.:
                    <input type="text" name="piva" value="">
                    <br><br><br><br><br>
                    <br><br>
                    <input type="submit" class="button" name="vai" value="Invia">
        </form>
        <br>
                </td>
            </tr>
            <tr>
                <td>
                    <form method="get" action="<?php $_SERVER ['PHP_SELF']?>">
                        Quantità:
                        <input type="text" name="q1">
                        Descrizione:
                        <input type="text" name="d1">
                        Prezzo:
                        <input type="text" name="p1">
                        <br>
                        Quantità:
                        <input type="text" name="q2">
                        Descrizione:
                        <input type="text" name="d2">
                        Prezzo:
                        <input type="text" name="p2">
                        <br><br>
                        <input type="submit" name="calcolo" value="CALCOLO">
                        TOTALE:
                        <?php
                        if (isset($_GET['calcolo'])) {
                        $num1 = $_GET ['p1'];
                        $num2 = $_GET ['p2'];
                        $tot = $num1 + $num2;

                        echo "$tot";
                        }else{
                        echo "insierisci i prezzi";
                        }
                        ?>
                        <br><br>
                    </form>
                </td>
            </tr>
        </table>
        </body>
</html>
<?php
    /*  E' buona norma separare la "logica" (le operazioni php) dalla "vista" (le pagine che contengono html)
        quindi questo pezzo di codice starebbe meglio in un altro file
    */
?>
<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status == 0) {
        echo '<p style ="color:#ff0006;"> <center> Il nome è obbligatorio.</p>';
    }
    else if ($status == 1) {
        echo '<p style ="color:#ff0006;">Form eseguita correttamente.</p>';
    }
}

?>
