<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    function getTimeAgo($fecha_ago){
        $fecha_total = explode(" ", $fecha_ago);
        $fecha = $fecha_total[0];
        $hora = $fecha_total[1];
        $hora_total = explode(":", $hora);
        $h = $hora_total[0];
        $m = $hora_total[1];
        $s = $hora_total[2];
        
        $fecha_final = strtotime($fecha) + ((60*60*($h+7))+60*$m+$s);
        
        return $fecha_final;
    }
?>
