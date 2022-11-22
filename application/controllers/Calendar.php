<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->table 		= 'calendar';
		$this->tmesa = 'mesas';//seleciona a tabela mesas
		$this->load->model('Globalmodel', 'modeldb'); 
	}

	public function index() {
		$data_calendar = $this->modeldb->get_list($this->table);
		$calendar = array();
	
		foreach ($data_calendar as $key => $val) 
			{
				$calendar[] = array(
					'id' 	=> intval($val->id), 
					//'title' => $val->title,
					'nome' => $val->nome,
					'email' => $val->email,
					'mesa'=> $val->mesa,
					'hora'=> $val->hora,
					'start' => date_format( date_create($val->start_date) ,"Y-m-d H:i:s"),
					'end' 	=> date_format( date_create($val->end_date) ,"Y-m-d H:i:s"),
					'color' => $val->color,
					);
			}

		$data = array();
		$data['get_data']	= json_encode($calendar);

		$this->data['modulo_menu'] = $this->load->view('/menu.php');
		$this->load->view('calendar', $data);
		$this->data['modulo_sobre'] = $this->load->view('/sobre.php');
		$this->data['modulo_menu'] = $this->load->view('/footer.php');
	}

	public function save()	{
		$d = $this->input->post('start_date');
		$h = $this->input->post('hora');
		$m = $this->input->post('mesa');
		$dt     = date_format(date_create($d), "Y-m-d");
		$hoje = date('Y-m-d');
		$color = $this->seleciona_cor($m);

		$response = array();
		
		$this->form_validation->set_rules('nome', 'Nome é obrigatório ', 'required');
		$this->form_validation->set_rules('email', 'Email é obrigatório ', 'required');
		$this->form_validation->set_rules('mesa', 'Espaço é obrigatório ', 'required');
		$this->form_validation->set_rules('hora', 'Horário é obrigatório ', 'required');
			
		$data_calendar = $this->modeldb->get_list($this->table);//tabela calendar
		$calendar = array();
		
		//--for puxa dados da tabela(calendar)
		foreach ($data_calendar as $key => $val) 
			{ 
				$calendar[] = array(
					'nome' => $val->nome,
					'mesa'=> $val->mesa,
					'hora'=> $val->hora,
					'start' => date_format( date_create($val->start_date) ,"Y-m-d"),
				);
				
				$datac = date_format(date_create($val->start_date), "Y-m-d");
				
				if(($datac == $dt) && ($val->hora == $h) && ($val->mesa == $m)) {
					$ret=null;
					$this->form_validation->set_rules('reservado', 'Reservado', 'callback_reserved');
					break;//--break impede que grave uma linha no banco igual
				}
				else{
					$ret=1;
				}	
			}
		//fim teste
			
		if ($this->form_validation->run() == TRUE)
      	{	
			if($d >= $hoje){
				if($ret ==1){
						$param = $this->input->post();
						//$paran['color'] =$color;
						$calendar_id = $param['calendar_id'];
						unset($param['calendar_id']);
						if($calendar_id == 0) {
							$param['color']   	= $color;
							$param['create_at']   	= date('Y-m-d H:i:s');
							$insert = $this->modeldb->insert($this->table, $param);
							if ($insert > 0) {
								$response['status'] = TRUE;
								$response['notif']	= 'Success add calendar';
								$response['id']		= $insert;
							}else {
								$response['status'] = FALSE;
								$response['notif']	= 'Servidor errado, salve novamente1';
							}
						}else{	
							$where 		= [ 'id'  => $calendar_id];
							$param['modified_at']   	= date('Y-m-d H:i:s');
							$update = $this->modeldb->update($this->table, $param, $where);

							if ($update > 0) {
								$response['status'] = TRUE;
								$response['notif']	= 'Success add calendar';
								$response['id']		= $calendar_id;
							}else {
								$response['status'] = FALSE;
								$response['notif']	= 'Servidor errado, tente novamente';
							}
						}
				}else{}	
			}else{
				//$response['status'] = FALSE;
				//$response['notif']	= validation_errors();
				$this->form_validation->set_rules('datamenor', 'Data', 'callback_datamenor');
				exit;
			}	
		}else {
			$response['status'] = FALSE;
			$response['notif']	= validation_errors();
		}

		echo json_encode($response);
	}

	public function delete(){
		$response 		= array();
		$calendar_id 	= $this->input->post('id');
		if(!empty($calendar_id))
		{
			$where = ['id' => $calendar_id];
	        $delete = $this->modeldb->delete($this->table, $where);

	        if ($delete > 0) 
	        {
	        	$response['status'] = TRUE;
	    		$response['notif']	= 'Success delete calendar';
	        }
	        else
	        {
	        	$response['status'] = FALSE;
	    		$response['notif']	= 'Server wrong, please save again';
	        }
		}
		else
		{
			$response['status'] = FALSE;
	    	$response['notif']	= 'Data not found';
		}

		echo json_encode($response);
	}
	
	function seleciona_cor($m){
		switch ($m) {
			case 'Mesa 01': $cor = '#ffff2fff'; break;
			case 'Mesa 02': $cor = '#2dff2fff'; break;
			case 'Mesa 03': $cor = '#0e76eaff'; break;
			case 'Mesa 04': $cor = '#e076eaff'; break;
			case 'Mesa 05': $cor = '#e07615ff'; break;
			case 'Mesa 06': $cor = '#e02535ff'; break;
			case 'Mesa 07': $cor = '#488791ff'; break;
			case 'Mesa 08': $cor = '#008000ff'; break;
			case 'Mesa 09': $cor = '#00ffffff'; break;
			case 'Mesa 10': $cor = '#9a84c8ff'; break;
			case 'Mesa 11': $cor = '#ff8080ff'; break;
			case 'Mesa 12': $cor = '#86605fff'; break;
			case 'Mesa 13': $cor = '#3f5f74cc'; break;
			case 'Mesa 14': $cor = '#ffccaaff'; break;
			case 'Mesa 15': $cor = '#619200ff'; break;
			case 'Mesa 16': $cor = '#af148bff'; break;
		default : $cor = '#fff'; 
		}
		return $cor;
	} 
	
	
}
