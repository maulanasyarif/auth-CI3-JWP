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

        $where = [
            'email'     => $email,
            'password'  => md5($password),
        ];

        $cek = $this->User->cek_login('users', $where);
        
        if($cek->num_rows())	{

            foreach ($cek->result() as $ck) {
                $sess_data['name'] = $ck->name;
                $sess_data['email'] = $ck->email;
                $this->session->set_userdata($sess_data);
                
            }
            redirect('admin/index');
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Username atau password salah!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
						redirect('user/login');
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
        $token = base64_encode(random_bytes(32));
        
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
                'token'       => $token,
            ];
            
            $this->User->insert($data, 'users');
            redirect ('users/login');
        }
        else
        {
            redirect('users/register');
        }
    }
    
    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Fogot Password';
            $this->load->view('template/header', $data);
            $this->load->view('forgot_password');
            $this->load->view('template/footer');
        }
    }
}
?>