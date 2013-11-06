<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script'); 
/*
by -> @PhiRequiem (BlackSpiral)
url -> http://blackspiral.eu
twitter -> @PhiRequiem
Desarrolloweb -> http://desarrolloweb.com/usuarios/BlackSpiral.html
*/
class Youtube_video
{
    /*** Obtener Yotube ID ***/
    public function youtube_id ($youtube_url) {
        parse_str( parse_url( $youtube_url, PHP_URL_QUERY ), $my_array_of_vars);
        if (isset($my_array_of_vars['v'])) {
            $youtube_id = $my_array_of_vars['v'];
        } elseif (strpos($youtube_url, "youtu.be") !== FALSE) 
        {
            if (strpos($youtube_url, "http://") !== FALSE)
            { 
                $youtube_id = str_replace("http://", "", $youtube_url);
            } 
            if (strpos($youtube_id, "/") !== FALSE) { 
                $youtube_id = explode("/", $youtube_id); 
                $youtube_id = $youtube_id[1]; 
            } 
            if (strpos($youtube_id, "?") !== FALSE) { 
                $youtube_id = explode("?", $youtube_id); 
                $youtube_id = $youtube_id[0]; 
            } 
        } else {
            $youtube_id = null;
        }
        return $youtube_id;
    }

    /*** Obtener datos del video Youtube ***/
    public function youtube_data ($youtube_url) {
        $youtube_id = $this->youtube_id($youtube_url);
        if (isset($youtube_id)) 
        {
            $data_url = 'http://gdata.youtube.com/feeds/api/videos/'.$youtube_id;
            if($conex= @fopen($data_url,"rt")) {
            $youtube_xml = simplexml_load_file('https://gdata.youtube.com/feeds/api/videos/'.$youtube_id); 

        /*** Obtengo Media RSS ***/
            $media = $youtube_xml->children('http://search.yahoo.com/mrss/');         
        /*** Obtengo Esquema XML de YouTube ***/
            $yt = $media->children('http://gdata.youtube.com/schemas/2007');
            $yt2 = $youtube_xml->children('http://gdata.youtube.com/schemas/2007');
        /*** Obtengo Esquema de Google Data ***/
            $gd = $youtube_xml->children('http://schemas.google.com/g/2005');
        /*** Arreglo datos de retorno ***/
            $youtube_data['youtube_id'] = $youtube_id;
            $youtube_data['title'] = htmlentities($media->group->title); //equivalentes HTML convertidos a esas entidades
            $youtube_data['author'] = $youtube_xml->author;
            $youtube_data['category'] = $media->group->category;
            $youtube_data['published'] = (string)$youtube_xml->published;
            $youtube_data['updated'] =  $youtube_xml->updated;
            $youtube_data['keywords'] = $media->group->keywords;
            if($yt2->statistics) {
                $youtube_data['statistics'] = $yt2->statistics->attributes(); 
            } else {
                $youtube_data['statistics'] = null;
            }
            
        /*** Asigno duracion y doy formato ***/
            $attrs = $yt->duration->attributes();
            $youtube_data['duration'] = (string)$attrs['seconds'];
            $youtube_data['duration_format'] = gmdate("H:i:s",intval($attrs['seconds']));
        /*** valido existencia de descripcion ***/
            if ($media->group->description && $media->group->description != '') {
                $youtube_data['description'] = (string)$media->group->description;
            } else {
                $youtube_data['description'] = null; 
            }
        /*** Obtengo imagenes ***/
            foreach($media->group->thumbnail[0]->attributes() as $k => $v) {
                $youtube_data['0_thumbnail'][$k] = (string)$v;
            }
            foreach($media->group->thumbnail[1]->attributes() as $k => $v) {
                $youtube_data['1_thumbnail'][$k] = (string)$v;
            }
            foreach($media->group->thumbnail[2]->attributes() as $k => $v) {
                $youtube_data['2_thumbnail'][$k] = (string)$v;
            }
            foreach($media->group->thumbnail[3]->attributes() as $k => $v) {
                $youtube_data['3_thumbnail'][$k] = (string)$v;
            }

            if ($gd->rating) {
                $youtube_data['rating'] = $gd->rating->attributes(); 
            } else {
                $youtube_data['rating'] = null; 
            }

            } else {
               $youtube_data = null; 
            }
        } else {
            $youtube_data = null;
        }
        return $youtube_data;
    }
}