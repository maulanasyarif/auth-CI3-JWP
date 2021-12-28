<?php class users extends CI_controller {
    
    public function index()
    {
        $data['title'] = 'Landing Page';
        $this->load->view('template/header', $data);
        $this->load->view('landing_page');
        $this->load->view('template/footer');
    }
    
    public function login()
    {
        $data['title'] = 'Login';
        $this->load->view('template/header', $data);
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function processLogin()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        
        $getData = $this->db->get_where('users', ['email' => $email])->row_array();
        if (count($getData) > 0){
            if(password_verify($password, $getData['password'])){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau password salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                  redirect(base_url('users/login'));

                } else {
                $this->session->set_userdata('name', $getData['name']);
                $this->session->set_userdata('email', $getData['email']);
               $this->session->set_userdata('foto', $getData['foto']);
             redirect(base_url('admin/index'));
                
            }
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('users/login'));
    }

    public function register()
    {
        $data['title'] = 'Register';
        $this->load->view('template/header', $data);
        $this->load->view('register');
        $this->load->view('template/footer');
    }

    public function processRegis()
    {
        $name   = $this->input->post('name');
        $email   = $this->input->post('email');
        $password   = md5($this->input->post('password'));
        $foto = $_FILES['foto'];
        
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpeg|gif|jpg|png';      
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto'))
        {
            $foto = $this->upload->data('file_name');
            
            $data = [
                'foto' => $foto,
                'name'     => $name,
                'email'        => $email,
                'password'       => $password,
            ];
            
            $this->User->insert($data, 'users');
            redirect ('users/login');
        }
        else
        {
            redirect('users/register');
        }
    }
    
    public function _sendEmail($email, $token)
    {
        $config = [
            'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'tugasbanyak80@gmail.com',
			'smtp_pass' => 'tugasmulu123',
			'smtp_port' => '587',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'smtp_crypto' => 'tls',
			'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
		$this->email->from('tugasbanyak', 'Auxeline');
		$this->email->to($email);
		$this->email->subject('Forgot Password');
		$this->email->message('Click this link to reset password :  <a href="'.base_url(). '/users/newPassword?email=' . $email. '&token=' . urlencode($token) .  '">Reset Password</a>');
        $send = $this->email->send();
        return $send;
    }

    public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->User->authentication($email);
		if($user){
			$user_token = $this->User->authToken($token);
			if($user_token){
				$this->session->set_userdata('email_reset', $email);
				$this->session->set_userdata('token_reset', $token);
				$this->forgotPassword();
			}else{
				$this->session->set_flashdata('message', 'Token not found');
			}
		} else {
			$this->session->set_flashdata('message', 'E-mail not found!');
			redirect(base_url('users/forgotPassword'));
		}

	}
    
    
    public function forgotPassword()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email is required!']);
		if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('template/header', $data);
            $this->load->view('forgot_password');
            $this->load->view('template/footer');
		} else {
            $email = $this->input->post('email', true);
			$user = $this->db->get_where('users', ['email' => $email])->row_array();
			if($user){
                $token = base64_encode(random_bytes(32));
				$tokens = [
					'token' => $token,
					'user_email' => $email,
					'created_at' => date('Y-m-d'),
				];
				$this->User->insertToken($tokens, 'tokens');
				$this->_sendEmail($email, $token);
				$this->session->set_flashdata('message', 'Please, check your E-mail!');
				redirect(base_url('users/forgotPassword'));
			} else {
                $this->session->set_flashdata('message', 'E-mail not found!');
				redirect(base_url('users/forgotPassword'));
			}
            
		}
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    }
    
    public function newPassword()
    {
        $data['title'] = 'New Password';
        $this->load->view('template/header', $data);
        $this->load->view('new_password');
        $this->load->view('template/footer');

        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$email = $this->session->userdata('email_reset');
		$token = $this->session->userdata('token_reset');
			$data = [
				'email' => $email,
				'password' => $password
			];
		$changes = $this->User->transferPass('users', $data);
    }
}
?>