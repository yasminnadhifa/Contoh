<?php
class tugas
{
    function rumus($jari, $tinggi)
    {
        $volume = 3.14 * $jari * $jari * $tinggi;
        echo "volume Tabung adalah = " . $volume;
        echo "<hr>";
        $luasP = 2 * 3.14 * $jari * ($jari + $tinggi);
        echo "luas permukaan tabung adalah : " . $luasP;
        echo "<hr>";
        $LS = 2 * 3.14 * $jari * $tinggi;
        echo "luas selimut tabung adalah : " . $LS;
        echo "<hr>";
    }
}
