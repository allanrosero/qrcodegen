
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main');
	}

	public function index()
	{
			$qr_query  = array(
			'select'           => "*",
			'table'            => 'qrdata',
			'condition'        => array(),
			'type'             => '',
			'limit' =>   '',
			'offset' =>  '',
		);      

		
		$data['qr'] =  $this->main->select($qr_query);
		$this->load->view('index',$data);
	}

	public function generate(){
		$this->load->library('ciqrcode');
		$data=  $this->input->post('data');
		$name=  $this->input->post('name');
		$filename = uniqid();
		$params['data'] = $data;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'qcode/images/'.$filename.'.png';
		$this->ciqrcode->generate($params);
		$insert_data = array(
			'data' => $data,
			'path' => $filename,
			'name' =>$name );
		$this->main->insert('qrdata', $insert_data ); 	
		redirect(base_url());
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */