<?php

if (!function_exists('format_indo')) {
  function format_indo($date){
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    
    // pemisahan tahun, bulan, hari, dan waktu
    //$tahun = substr($date,0,4);
    $tahun = substr($date,2,2);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    //$result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

    $result = $tgl."-".$Bulan[(int)$bulan-1]."-".$tahun;

    return $result;
  }
}