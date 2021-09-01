<?php

if (!function_exists('original_date')) {
  function original_date($date){
    date_default_timezone_set('Asia/Jakarta');

    // pemisahan tahun, bulan, hari, dan waktu
    //$tahun = substr($date,0,4);
    $tahun = substr($date,7,2);
    $bulan = substr($date,3,3);
    
    if($bulan=='Jan'){
      $bulan = '01';
    }else if($bulan=='Feb'){
      $bulan = '02';
    }else if($bulan=='Mar'){
      $bulan = '03';
    }else if($bulan=='Apr'){
      $bulan = '04';
    }else if($bulan=='May'){
      $bulan = '05';
    }else if($bulan=='Jun'){
      $bulan = '06';
    }else if($bulan=='Jul'){
      $bulan = '07';
    }else if($bulan=='Aug'){
      $bulan = '08';
    }else if($bulan=='Sep'){
      $bulan = '09';
    }else if($bulan=='Oct'){
      $bulan = '10';
    }else if($bulan=='Nov'){
      $bulan = '11';
    }else if($bulan=='Dec'){
      $bulan = '12';
    }

    $tgl = substr($date,0,2);
    //$result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

    $result = "20".$tahun."-".$bulan."-".$tgl;

    return $result;
  }
}
