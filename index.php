<!DOCTYPE html>
<html>
    <head>
        <title>Pengacakan Kelompok</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>

        <div id="Judul">
            <h1>Pengacakan Kelompok</h1>
        </div>

        <!-- Masukkan Nama Anggota -->
        <div id="input">    
        <form method="post" action="index.php" >
            Input daftar nama :<br> 
            <textarea name="input" rows="4" class="daftar" required></textarea><br>
            Input jumlah kelompok :<br> 
            <input type="number" name="a" class="daftar" autocomplete="off"  min="1" required><br>
            <input type="submit" name="Submit" value="Proses"class="tombol">
            <a href="./" style="text-decoration:none;"><input type="button" value="Hapus" class="tombol"/></a> 
        </form>
        </div>

        <!-- Membagi Kelompok -->
        <div id="hasil">
            <h3>Hasil</h3>
        <?php 
        if (isset($_POST['Submit'])) {
           
            $stri = $_POST['input'];
            $str = strtoupper($stri); //Membuat Kalimatnya Jadi Kapital Semua
            $arr = explode("\n", $str); //Memisahkan Perbarisnya

            shuffle($arr);
            $jml_arr=count($arr);
            
            // Bagi Kelompok
            $kel = $_POST['a'];
            $n=0;
            $sisa=$jml_arr%$kel;
            $bkn_sisa=$jml_arr-$sisa;
            $batas_sisa=0;
            $anggota=$bkn_sisa/$kel;

            If($jml_arr>=$kel){ //Jika jumlah kelompok tidak lebih banyak dari jumlah anggota
                for($i=1;$i<=$kel;$i++){ // kelompok ke i -> 1,2,3....
                    echo '<ul>';
                    echo "<p>Kelompok $i :</p><br>";
                    for($j=0;$j<$anggota;$j++){
                        echo'<li>'.$arr[$n].'</li>';
                        $n++;
                    }
                    if($batas_sisa<$sisa){ //memasukan anggota sisa
                        echo'<li>'.$arr[$n].'</li>';
                        $n++;
                        $batas_sisa++;
                    }
                    echo '</ul>';
                }
            }
            else{ //Jika jumlah kelompok lebih banyak dari pada anggota
                echo "<p><u>Jumlah kelompok melampaui banyak anggota</u><br></p>";
            }         
        }
        ?>
        </div>

        <div id="tanggal">
            <?php
            // Set default timezone
            date_default_timezone_set('Asia/Jakarta');

            // hari bulan tahun Jam.Menit.Detik
            $date = date("d M Y H.i.s");
            echo 'Pengacakan dilakukan pada ' . $date . ' WIB.';
            ?>
        </div>
 
    </body>
</html>