<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin_model extends CI_Model {
        function __construct() {
            parent::__construct();
        }
        
        function getEntorno(){
            $query = $this->db->get('entorno')->result();
            return $query;
        }
        function getTendencia(){
            $query = $this->db->get('tendencia')->result();
            return $query;
        }
        function insertEntorno($data){
            $query = $this->db->insert('entorno',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function insertTendencia($data){
            $query = $this->db->insert('tendencia',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function deleteEntorno($data){            
            $this->deleteEntornoOnDetail($data['identorno']);
            
            $query = $this->db->delete('entorno',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function deleteEntornoOnDetail($entorno){
            $this->db->delete('detalle_vision',array('identorno'=>$entorno));
        }
        function deleteTendencia($data){
            $this->deleteTendenciaOnDetail($data['idtendencia']);
            $query = $this->db->delete('tendencia',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function deleteTendenciaOnDetail($tendencia){
            $this->db->delete('detalle_vision',array('idtendencia'=>$tendencia));
        }
        function getEntornoById($id){
            $this->db->where('identorno',$id);
            $query = $this->db->get('entorno')->result();
            return $query;
        }
        function getTendenciaById($id){
            $this->db->where('idtendencia',$id);
            $query = $this->db->get('tendencia')->result();
            return $query;
        }
        function editEntorno($id,$data){
            $this->db->where('identorno',$id);
            $query = $this->db->update('entorno',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function editTendencia($id,$data){
            $this->db->where('idtendencia',$id);
            $query = $this->db->update('tendencia',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function addDetail($data){
            $query = $this->db->insert('detalle_vision',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function getDetail(){
            $this->db->order_by('identorno asc, idtendencia asc');
            $query = $this->db->get('detalle_vision')->result();
            return $query;
        }
        function getDetailsById($entorno,$tendencia){
            $this->db->where('identorno',$entorno);
            $this->db->where('idtendencia',$tendencia);
            $query = $this->db->get('detalle_vision')->result();
            
            return $query;
        }
        function getDetailById($detalle){
            $this->db->where('iddetallevision',$detalle);
            $query = $this->db->get('detalle_vision')->result();
            
            return $query;
        }
        function editDetail($detalle,$data){
            $this->db->where('iddetallevision',$detalle);
            $query = $this->db->update('detalle_vision',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        function deleteDetail($data){
            $query = $this->db->delete('detalle_vision',$data);
            
            if($query){
                return true;
            }else{
                return false;
            }
        }
        
        function getMision(){
            $this->db->where("estado",1);
            $result = $this->db->get("mision")->result();
            
            return $result;
        }
        
        function getVision(){
            $this->db->where("estado",1);
            $result = $this->db->get("vision")->result();
            
            return $result;
        }
        
        function getValores(){
            $this->db->where("estado",1);
            $result = $this->db->get("valores")->result();
            
            return $result;
        }
        
        function insertValor($data){
            $result = $this->db->insert("valores",$data);
            
            return $result;
        }
        
        function getValorById($valor){
            $this->db->where("IdValor",$valor);
            $result = $this->db->get("valores")->result();
            
            return $result;
        }
        
        function editarValor($data,$valor){
            $this->db->where("IdValor",$valor);
            $result = $this->db->update("valores",$data);
            
            return $result;
        }
        
        function deleteValor($valor){
            $this->db->where("IdValor",$valor);
            $result = $this->db->delete("valores");
            
            return $result;
        }
        
        function getPreguntasVision(){
            $this->db->where("estado",1);
            $result = $this->db->get("preguntasvision")->result();
            
            return $result;
        }
        
        function getRespuestasVision($vision){
            $this->db->where(array("IdPreguntaVision" => $vision, "estado" => 1));
            $result = $this->db->get("respuestavision")->result();
            
            return $result;
        }
        
        function getOportunidadesFuturas(){
            $this->db->where("a.Idaniovision = b.Idaniovision and a.estado = 1");
            $result = $this->db->get("oportunidadfutura a, aniovision b")->result();
            
            return $result;
        }
        
        function getAmenazasFuturas(){
            $this->db->where("a.Idaniovision = b.Idaniovision and a.estado = 1");
            $result = $this->db->get("amenazafutura a, aniovision b")->result();
            
            return $result;
        }
        
        function insertRespuesta($data){
            $result = $this->db->insert("respuestavision",$data);
            
            return $result;
        }
        
        function getRespuestaById($valor){
            $this->db->where("IdRespuestaVision",$valor);
            $result = $this->db->get("respuestavision")->result();
            
            return $result;
        }
        
        function editarRespuesta($data,$valor){
            $this->db->where("IdRespuestaVision",$valor);
            $result = $this->db->update("respuestavision",$data);
            
            return $result;
        }
        
        function deleteRespuesta($valor){
            $this->db->where("IdRespuestaVision",$valor);
            $result = $this->db->delete("respuestavision");
            
            return $result;
        }
        
        function getVisionById($valor){
            $this->db->where("IdVision",$valor);
            $result = $this->db->get("vision")->result();
            
            return $result;
        }
        
        function editarVision($data,$valor){
            $this->db->where("IdVision",$valor);
            $result = $this->db->update("vision",$data);
            
            return $result;
        }
        
        function insertOFutura($data){
            $result = $this->db->insert("oportunidadfutura",$data);
            
            return $result;
        }
        
        function insertAFutura($data){
            $result = $this->db->insert("amenazafutura",$data);
            
            return $result;
        }
        
        function getOFuturaById($valor){
            $this->db->where("Idoportunidadfutura",$valor);
            $result = $this->db->get("oportunidadfutura")->result();
            
            return $result;
        }
        
        function editarOFutura($data,$valor){
            $this->db->where("Idoportunidadfutura",$valor);
            $result = $this->db->update("oportunidadfutura",$data);
            
            return $result;
        }
        
        function getAFuturaById($valor){
            $this->db->where("Idamenazafutura",$valor);
            $result = $this->db->get("amenazafutura")->result();
            
            return $result;
        }
        
        function editarAFutura($data,$valor){
            $this->db->where("Idamenazafutura",$valor);
            $result = $this->db->update("amenazafutura",$data);
            
            return $result;
        }
        
        function deleteOFutura($valor){
            $this->db->where("Idoportunidadfutura",$valor);
            $result = $this->db->delete("oportunidadfutura");
            
            return $result;
        }
        
        function deleteAFutura($valor){
            $this->db->where("Idamenazafutura",$valor);
            $result = $this->db->delete("amenazafutura");
            
            return $result;
        }
        
        function getPreguntasMision(){
            $this->db->where("estado",1);
            $result = $this->db->get("preguntasmision")->result();
            
            return $result;
        }
        
        function getRespuestasMision($vision){
            $this->db->where(array("IdPreguntaMision" => $vision, "estado" => 1));
            $result = $this->db->get("respuestamision")->result();
            
            return $result;
        }
        
        function insertRespuestaMision($data){
            $result = $this->db->insert("respuestamision",$data);
            
            return $result;
        }
        
        function getRespuestaMisionById($valor){
            $this->db->where("IdRespuestaMision",$valor);
            $result = $this->db->get("respuestamision")->result();
            
            return $result;
        }
        
        function editarRespuestaMision($data,$valor){
            $this->db->where("IdRespuestaMision",$valor);
            $result = $this->db->update("respuestamision",$data);
            
            return $result;
        }
        
        function deleteRespuestaMision($valor){
            $this->db->where("IdRespuestaMision",$valor);
            $result = $this->db->delete("respuestamision");
            
            return $result;
        }
        
        function getMisionById($valor){
            $this->db->where("IdMision",$valor);
            $result = $this->db->get("mision")->result();
            
            return $result;
        }
        
        function editarMision($data,$valor){
            $this->db->where("IdMision",$valor);
            $result = $this->db->update("mision",$data);
            
            return $result;
        }
    }
?>
