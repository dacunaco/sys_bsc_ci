<?php
    if(!defined('BASEPATH'))    exit('No direct script access allowed');
    class Admin extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->library(array('pagination','encrypt'));
            $this->load->model('Admin_model');
        }
        function index(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_main');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }            
        }
        
        function pe(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_pe');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function vfi($data = NULL){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
				
                $data['entorno'] = $this->Admin_model->getEntorno();
                $data['tendencia'] = $this->Admin_model->getTendencia();
				
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_vfi');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
		
	function entorno(){
            $this->form_validation->set_rules('entorno','Entorno','required|xss_clean');
            $this ->form_validation-> set_error_delimiters('', '');

            if($this->form_validation->run() == FALSE){
                $this->vfi();
            }else{
                $data_insert = array(
                    'entorno' => $this->input->post('entorno')
                );
                
                $result = $this->Admin_model->insertEntorno($data_insert);
                
                if($result){
                    $data['mensaje'] = "Entorno agregado correctamente";
                    $data['opcion'] = 1;
                    $this->vfi($data);
                }else{
                    $data['mensaje'] = "No se pudo agregar el entorno correctamente";
                    $data['opcion'] = 0;
                    $this->vfi($data);
                }
            }
        }
        function tendencia(){
            $this->form_validation->set_rules('tendencia','tendencia','required|xss_clean');
            $this ->form_validation-> set_error_delimiters('', '');

            if($this->form_validation->run() == FALSE){
                $this->vfi();
            }else{
                $data_insert = array(
                    'tendencia' => $this->input->post('tendencia')
                );
                
                $result = $this->Admin_model->insertTendencia($data_insert);
                
                if($result){
                    $data['mensaje'] = "Tendencia agregada correctamente";
                    $data['opcion'] = 1;
                    $this->vfi($data);
                }else{
                    $data['mensaje'] = "No se pudo agregar la tendencia correctamente";
                    $data['opcion'] = 0;
                    $this->vfi($data);
                }
            }
        }
		
		
        function delete_entorno(){
            $data_delete = array(
                'identorno' => $this->input->get('eid')
            );

            $result = $this->Admin_model->deleteEntorno($data_delete);

            if($result){
                $data['mensaje'] = "Entorno eliminado correctamente";
                $data['opcion'] = 1;
                $this->vfi($data);
            }else{
                $data['mensaje'] = "No se pudo eliminar el entorno correctamente";
                $data['opcion'] = 0;
                $this->vfi($data);
            }
        }
        function delete_tendencia(){
            $data_delete = array(
                'idtendencia' => $this->input->get('tid')
            );

            $result = $this->Admin_model->deleteTendencia($data_delete);

            if($result){
                $data['mensaje'] = "Tendencia eliminada correctamente";
                $data['opcion'] = 1;
                $this->vfi($data);
            }else{
                $data['mensaje'] = "No se pudo eliminar la Tendencia correctamente";
                $data['opcion'] = 0;
                $this->vfi($data);
            }
        }
        function edit_entorno(){
            $eid = $this->input->get('eid');
            
            $data = array(
                'foto' => $this->session->userdata['user_data']['user_foto'],
                'sexo' => $this->session->userdata['user_data']['user_sex'],
                'nombres' => $this->session->userdata['user_data']['user_name'],
                'dni' => $this->session->userdata['user_data']['user_dni']
            );
            
            $data['opcion'] = "entorno";
            $data['source'] = "admin/editEntorno";
            $data['valor'] = "Entorno : ";
            $data['valor_data'] = $this->Admin_model->getEntornoById($eid);
            $data['id'] = $eid;
            
            $this->load->view('admin/header',$data);
            $this->load->view('admin/view_edit');
            $this->load->view('admin/footer');
        }
        function edit_tendencia(){
            $tid = $this->input->get('tid');
            
            $data = array(
                'foto' => $this->session->userdata['user_data']['user_foto'],
                'sexo' => $this->session->userdata['user_data']['user_sex'],
                'nombres' => $this->session->userdata['user_data']['user_name'],
                'dni' => $this->session->userdata['user_data']['user_dni']
            );
            
            $data['opcion'] = "tendencia";
            $data['source'] = "admin/editTendencia";
            $data['valor'] = "Tendencia : ";
            $data['valor_data'] = $this->Admin_model->getTendenciaById($tid);
            $data['id'] = $tid;
            
            $this->load->view('admin/header',$data);
            $this->load->view('admin/view_edit');
            $this->load->view('admin/footer');
        }
        function editEntorno(){
            $this->form_validation->set_rules('entorno','Entorno','required|xss_clean');
            $this ->form_validation-> set_error_delimiters('', '');

            if($this->form_validation->run() == FALSE){
                $data['opcion'] = "entorno";
                $data['source'] = "admin/editEntorno";
                $data['valor'] = "Entorno : ";
                $data['valor_data'] = $this->Admin_model->getEntornoById($this->input->post('id'));
                $data['id'] = $this->input->post('id');
                $this->load->view('admin/view_edit',$data);
            }else{
                $data_insert = array(
                    'entorno' => $this->input->post('entorno')
                );
                
                $result = $this->Admin_model->editEntorno($this->input->post('id'),$data_insert);
                
                if($result){
                    $data['mensaje'] = "Entorno modificado correctamente";
                    $data['opcion'] = 1;
                    $this->vfi($data);
                }else{
                    $data['mensaje'] = "No se pudo modificar el entorno correctamente";
                    $data['opcion'] = 0;
                    $this->vfi($data);
                }
            }
        }
        function editTendencia(){
            $this->form_validation->set_rules('tendencia','Tendencia','required|xss_clean');
            $this ->form_validation-> set_error_delimiters('', '');

            if($this->form_validation->run() == FALSE){
                $data['opcion'] = "tendencia";
                $data['source'] = "admin/editTendencia";
                $data['valor'] = "Tendencia : ";
                $data['valor_data'] = $this->Admin_model->getTendenciaById($this->input->post('id'));
                $data['id'] = $this->input->post('id');
                $this->load->view('admin/view_edit',$data);
            }else{
                $data_insert = array(
                    'tendencia' => $this->input->post('tendencia')
                );
                
                $result = $this->Admin_model->editTendencia($this->input->post('id'),$data_insert);
                
                if($result){
                    $data['mensaje'] = "Tendencia modificada correctamente";
                    $data['opcion'] = 1;
                    $this->vfi($data);
                }else{
                    $data['mensaje'] = "No se pudo modificar la tendencia correctamente";
                    $data['opcion'] = 0;
                    $this->vfi($data);
                }
            }
        }
        function proceso($data = NULL){
            
             $data = array(
                'foto' => $this->session->userdata['user_data']['user_foto'],
                'sexo' => $this->session->userdata['user_data']['user_sex'],
                'nombres' => $this->session->userdata['user_data']['user_name'],
                'dni' => $this->session->userdata['user_data']['user_dni']
            );
             
            $data['detalle'] = $this->Admin_model->getDetail();
            $data['entorno'] = $this->Admin_model->getEntorno();
            $data['tendencia'] = $this->Admin_model->getTendencia();
            
           
            
            $this->load->view("admin/header",$data);
            $this->load->view('admin/view_proccess');
            $this->load->view("admin/footer");
        }
        function addDetailMatriz(){
            $this->form_validation->set_rules('detalle','Detalle','required|xss_clean');
            $this->form_validation->set_rules('entornos','Entorno','required|xss_clean');
            $this->form_validation->set_rules('tendencias','Tendecia','required|xss_clean');
            
            $this ->form_validation-> set_error_delimiters('<ul><li>', '</li></ul>');
            
            if($this->form_validation->run() == FALSE){
                $this->proceso();
            }else{
                $data_insert = array(
                    'detallevision' => $this->input->post('detalle'),
                    'identorno' => $this->input->post('entornos'),
                    'idtendencia' => $this->input->post('tendencias')
                );
                
                $result = $this->Admin_model->addDetail($data_insert);
                
                if($result){
                    $data['mensaje'] = "Se agregó detalle correctamente";
                    $data['opcion'] = 1;
                    $this->proceso($data);
                }else{
                    $data['mensaje'] = "No se pudo agregar detalle correctamente";
                    $data['opcion'] = 0;
                    $this->proceso($data);
                }
            }
        }
        function showDetails(){
            $entorno = $this->input->get('eid');
            $tendencia = $this->input->get('tid');
            
            $data['entorno'] = $this->Admin_model->getEntornoById($entorno);
            $data['tendencia'] = $this->Admin_model->getTendenciaById($tendencia);
            $data['detalles'] = $this->Admin_model->getDetailsById($entorno,$tendencia);
            
            $this->load->view('admin/view_details',$data);
        }
        function editDetailById(){
            $data = array(
                'foto' => $this->session->userdata['user_data']['user_foto'],
                'sexo' => $this->session->userdata['user_data']['user_sex'],
                'nombres' => $this->session->userdata['user_data']['user_name'],
                'dni' => $this->session->userdata['user_data']['user_dni']
            );
            
            $detalle = $this->input->get('did');
            $entorno = $this->input->get('eid');
            $tendencia = $this->input->get('tid');
            
            $data['entorno'] = $entorno;
            $data['tendencia'] = $tendencia;
            $data['id'] = $detalle;
            $data['detalle'] = $this->Admin_model->getDetailById($detalle);
            
            $this->load->view("admin/header",$data);
            $this->load->view('admin/view_editDetail');
            $this->load->view("admin/footer");
        }
        function editDetail(){
            $this->form_validation->set_rules('detalle','Detalle','required|xss_clean');
            $this ->form_validation-> set_error_delimiters('', '');

            if($this->form_validation->run() == FALSE){
                $data['detalle'] = $this->Admin_model->getDetailById($this->input->post('id'));
                $data['id'] = $this->input->post('id');
                $data['entorno'] = $this->input->post('entorno');
                $data['tendencia'] = $this->input->post('tendencia');
                $this->load->view('admin/view_editDetail',$data);
            }else{
                $data_insert = array(
                    'detallevision' => $this->input->post('detalle')
                );
                
                $result = $this->Admin_model->editDetail($this->input->post('id'),$data_insert);
                
                if($result){
                    $data = array(
                        'foto' => $this->session->userdata['user_data']['user_foto'],
                        'sexo' => $this->session->userdata['user_data']['user_sex'],
                        'nombres' => $this->session->userdata['user_data']['user_name'],
                        'dni' => $this->session->userdata['user_data']['user_dni']
                    );
                    
                    $data['mensaje'] = "Detalle modificado correctamente";
                    $data['opcion'] = 1;
                    
                    $entorno = $this->input->post('entorno');
                    $tendencia = $this->input->post('tendencia');
            
                    $data['entorno'] = $this->Admin_model->getEntornoById($entorno);
                    $data['tendencia'] = $this->Admin_model->getTendenciaById($tendencia);
                    $data['detalles'] = $this->Admin_model->getDetailsById($entorno,$tendencia);
                    
                    $this->load->view("admin/header",$data);
                    $this->load->view('admin/view_details');
                    $this->load->view("admin/footer");
                }else{
                    $data = array(
                        'foto' => $this->session->userdata['user_data']['user_foto'],
                        'sexo' => $this->session->userdata['user_data']['user_sex'],
                        'nombres' => $this->session->userdata['user_data']['user_name'],
                        'dni' => $this->session->userdata['user_data']['user_dni']
                    );
                    
                    $data['mensaje'] = "No se pudo modificar el detalle correctamente";
                    $data['opcion'] = 0;
                    
                    $entorno = $this->input->post('entorno');
                    $tendencia = $this->input->post('tendencia');
            
                    $data['entorno'] = $this->Admin_model->getEntornoById($entorno);
                    $data['tendencia'] = $this->Admin_model->getTendenciaById($tendencia);
                    $data['detalles'] = $this->Admin_model->getDetailsById($entorno,$tendencia);
                    
                    $this->load->view("admin/header",$data);
                    $this->load->view('admin/view_details');
                    $this->load->view("admin/footer");
                }
            }
        }
        function deleteDetailById(){
            $data_delete = array(
                'iddetallevision' => $this->input->get('did')
            );

            $result = $this->Admin_model->deleteDetail($data_delete);

            if($result){
                $data['mensaje'] = "Detalle eliminado correctamente";
                $data['opcion'] = 1;
                $this->proceso($data);
            }else{
                $data['mensaje'] = "No se pudo eliminar el detalle correctamente";
                $data['opcion'] = 0;
                $this->proceso($data);
            }
        }
        
        function valores(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'mision' => $this->Admin_model->getMision(),
                    'vision' => $this->Admin_model->getVision(),
                    'valores' => $this->Admin_model->getValores()
                );
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_valores');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }     
        }
        
        function newValor(){
            $data_insert = array(
                'Valor' => $this->input->post("valor"),
                'Significado' => $this->input->post("significado"),
                'estado' => 1
            );
            
            $result = $this->Admin_model->insertValor($data_insert);
            
            if($result){
                redirect("admin/valores");
            }
        }
        
        function editValor(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'valor' => $this->Admin_model->getValorById($this->input->get("vid"))
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editValor');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function editarValor(){
            $data_insert = array(
                'Valor' => $this->input->post("valor"),
                'Significado' => $this->input->post("significado"),
                'estado' => 1
            );
            
            $result = $this->Admin_model->editarValor($data_insert,$this->input->post("id"));
            
            if($result){
                redirect("admin/valores");
            }
        }
        
        function deleteValor(){
            $result = $this->Admin_model->deleteValor($this->input->get("vid"));
            
            if($result){
                redirect("admin/valores");
            }
        }
        
        function vision(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'preguntas' => $this->Admin_model->getPreguntasVision(),
                    'vision' => $this->Admin_model->getVision(),
                    'ofuturas' => $this->Admin_model->getOportunidadesFuturas(),
                    'afuturas' => $this->Admin_model->getAmenazasFuturas()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_vision');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function newRespuesta(){
            $data_insert = array(
                'RespuestaVision' => $this->input->post("respuesta"),
                'IdPreguntaVision' => $this->input->post("pregunta"),
                'estado' => 1
            );
            
            $result = $this->Admin_model->insertRespuesta($data_insert);
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function editRespuesta(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'respuesta' => $this->Admin_model->getRespuestaById($this->input->get("rid"))
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editRespuesta');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function editarRespuesta(){
            $data_insert = array(
                'RespuestaVision' => $this->input->post("respuesta")
            );
            
            $result = $this->Admin_model->editarRespuesta($data_insert,$this->input->post("id"));
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function deleteRespuesta(){
            $result = $this->Admin_model->deleteRespuesta($this->input->get("rid"));
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function editarVision(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'vision' => $this->Admin_model->getVisionById($this->input->get("v"))
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editVision');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function editVision(){
            $data_insert = array(
                'Vision' => $this->input->post("respuesta")
            );
            
            $result = $this->Admin_model->editarVision($data_insert,$this->input->post("id"));
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function newOFuturas(){
            $data_insert = array(
                'oportunidadfutura' => $this->input->post("ofutura"),
                'Idaniovision' => 1,
                'estado' => 1
            );
            
            $result = $this->Admin_model->insertOFutura($data_insert);
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function newAFuturas(){
            $data_insert = array(
                'amenazafutura' => $this->input->post("afutura"),
                'Idaniovision' => 1,
                'estado' => 1
            );
            
            $result = $this->Admin_model->insertAFutura($data_insert);
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function editOportunidadFutura(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'ofutura' => $this->Admin_model->getOFuturaById($this->input->get("ofid"))
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editOFutura');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function editarOportunidadFutura(){
            $data_insert = array(
                'oportunidadfutura' => $this->input->post("ofutura")
            );
            
            $result = $this->Admin_model->editarOFutura($data_insert,$this->input->post("id"));
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function editAmenazaFutura(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'afutura' => $this->Admin_model->getAFuturaById($this->input->get("afid"))
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editAFutura');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function editarAmenazaFutura(){
            $data_insert = array(
                'amenazafutura' => $this->input->post("afutura")
            );
            
            $result = $this->Admin_model->editarAFutura($data_insert,$this->input->post("id"));
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function deleteOportunidadFutura(){
            $result = $this->Admin_model->deleteOFutura($this->input->get("ofid"));
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function deleteAmenazaFutura(){
            $result = $this->Admin_model->deleteAFutura($this->input->get("afid"));
            
            if($result){
                redirect("admin/vision");
            }
        }
        
        function mision(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'preguntas' => $this->Admin_model->getPreguntasMision(),
                    'mision' => $this->Admin_model->getMision()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_mision');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function newRespuestaMision(){
            $data_insert = array(
                'RespuestaMision' => $this->input->post("respuesta"),
                'IdPreguntaMision' => $this->input->post("pregunta"),
                'estado' => 1
            );
            
            $result = $this->Admin_model->insertRespuestaMision($data_insert);
            
            if($result){
                redirect("admin/mision");
            }
        }
        
        function editRespuestaMision(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'respuesta' => $this->Admin_model->getRespuestaMisionById($this->input->get("rid"))
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editRespuestaMision');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function editarRespuestaMision(){
            $data_insert = array(
                'RespuestaMision' => $this->input->post("respuesta")
            );
            
            $result = $this->Admin_model->editarRespuestaMision($data_insert,$this->input->post("id"));
            
            if($result){
                redirect("admin/mision");
            }
        }
        
        function deleteRespuestaMision(){
            $result = $this->Admin_model->deleteRespuestaMision($this->input->get("rid"));
            
            if($result){
                redirect("admin/mision");
            }
        }
        
        function editarMision(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'mision' => $this->Admin_model->getMisionById($this->input->get("m"))
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editMision');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            } 
        }
        
        function editMision(){
            $data_insert = array(
                'Mision' => $this->input->post("respuesta")
            );
            
            $result = $this->Admin_model->editarMision($data_insert,$this->input->post("id"));
            
            if($result){
                redirect("admin/mision");
            }
        }
    }
?>
