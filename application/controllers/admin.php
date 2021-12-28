<?php class admin extends CI_controller {
    
    function __construct() {
		parent::__construct();

		if (!isset($this->session->userdata['name'])) {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Anda Belum Login!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('users/login');
		}
	}

    public function index()
    {
        $data = $this->User->getData($this->session->userdata['name']);
		$data = array (
			'name' => $data->name,
		);
        $data['title'] = 'Dashboard';
        $this->load->view('aa', $data);
    }
    
}