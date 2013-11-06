<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script'); 

class Funciones
{
    public function time_passed($timestamp){
        $timestamp      = (int) $timestamp;
        $current_time   = time();
        $diff           = $current_time - $timestamp;

        $intervals      = array (
            'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
        );
        if ($diff == 0)
        {
            return 'JUSTO AHORA';
        }    

        if ($diff < 60)
        {
            return $diff == 1 ? 'HACE '.$diff . ' SEGUNDO' : 'HACE '.$diff . ' SEGUNDOS';
        }        

        if ($diff >= 60 && $diff < $intervals['hour'])
        {
            $diff = floor($diff/$intervals['minute']);
            return $diff == 1 ? 'HACE '. $diff . ' MINUTO APROXIMADAMENTE' : 'HACE '.$diff . ' MINUTOS';
        }        

        if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
        {
            $diff = floor($diff/$intervals['hour']);
            return $diff == 1 ? 'HACE '. $diff . ' HORA APROXIMADAMENTE' : 'HACE '.$diff . ' HORAS';
        }    

        if ($diff >= $intervals['day'] && $diff < $intervals['week'])
        {
            $diff = floor($diff/$intervals['day']);
            return $diff == 1 ? ' AYER' : 'HACE '. $diff . ' DÍAS';
        }    

        if ($diff >= $intervals['week'] && $diff < $intervals['month'])
        {
            $diff = floor($diff/$intervals['week']);
            return $diff == 1 ? 'HACE '. $diff . ' SEMANA' : 'HACE '.$diff . ' SEMANAS';
        }    

        if ($diff >= $intervals['month'] && $diff < $intervals['year'])
        {
            $diff = floor($diff/$intervals['month']);
            return $diff == 1 ? 'HACE '. $diff . ' MES' : 'HACE '.$diff . ' MESES';
        }    

        if ($diff >= $intervals['year'])
        {
            $diff = floor($diff/$intervals['year']);
            return $diff == 1 ? 'HACE '. $diff . ' AÑO' : 'HACE '.$diff . ' AÑOS';
        }
    }
    
    public function zerofill($entero, $largo){
        $entero = (int)$entero;
        $largo = (int)$largo;

        $relleno = '';
        if (strlen($entero) < $largo) {
            $relleno = str_repeat('0', $largo - strlen($entero));
        }
        return $relleno . $entero;
    }
}
?>