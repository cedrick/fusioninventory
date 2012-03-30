<?php
class User extends CI_Controller
{
	 function User()  
	 	{
     	parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('User_model');
    }
		
		function index()  
	 	{
				redirect('/user/login/', 'refresh');
    }
		
		function register()  
	 	{
      $this->load->library('form_validation');
			$this->form_validation->set_rules('reg_username','Username','trim|required|alpaha_numeric|xss_clean|strtolower|callback_username_not_exist');
			$this->form_validation->set_rules('name','Name','trim|required|alpaha_numeric|xss_clean');
			$this->form_validation->set_rules('password','Password','trim|required|alpaha_numeric|xss_clean');
			$this->form_validation->set_rules('password_conf','Password Confrimation',       'trim|required|alpaha_numeric|matches[password]');
			if($this->form_validation->run() == FALSE)
					{
						$this->load->view('master_view', array('page' => 'view_register', 'data' => NULL));
					}else
					{	
						$username = $this->input->post('reg_username');
						$name = $this->input->post('name');
						$password = $this->input->post('password');
						
						
						if($this->User_model->register_user($username,$password,$name))
						{
							$this->session->set_flashdata('insertdata', 'The data was inserted');
							$this->load->view('master_view', array('page' => 'view_register', 'data' => NULL));
						}else
						{
							return FALSE;
						}
									
				}
			
			
    }
		
		function username_not_exist($username)
		{
			$this->form_validation->set_message('username_not_exist','That username already exist choose another username');
			if($this->User_model->check_exist_username($username))
			{
				return FALSE;
			}else
			{
				return TRUE;
			}
		}
		
			function login()
		{
			 if($this->session->userdata('username') == '')
				{
					$this->load->library('form_validation');
					$this->form_validation->set_rules('username','Username','trim|required|alpaha_numeric|xss_clean');
					$this->form_validation->set_rules('password','Password','trim|required|alpaha_numeric|xss_clean');
					
					if($this->form_validation->run() == FALSE) {
						$this->load->view('master_view', array('page' => 'view_login', 'data' => NULL));
					}else
					{	
						$username = $this->input->post('username');
						$password = $this->input->post('password');
						if($this->User_model->login_user($username,$password)){
							$category = $this->User_model->get_category();
							$data = array(
															'category' => $category
														);
							redirect('/user/view_main/', 'refresh');
						}
						else
						{
							echo "<font color=#AA0000 face=Arial>Login Error!</font>";
							redirect('/user/login/', 'refresh');
						}
					}
				}else
				{
					redirect('/user/view_main/', 'refresh');
				}
		}
		
			
				function insert_in($id,$category_select = NULL,$action_select = NULL)
			{
				if($this->session->userdata('username') != '')
					{
							if($this->User_model->in($id,$category_select,$action_select)){
								$this->User_model->update_in($id);
								$data['category'] = $this->User_model->get_category();
								$data['result'] = $this->User_model->select_invmain($id,$category_select,$action_select);
								$this->load->view('master_view', array('page' => 'view_main', 'data' => $data));
							}
							else
							{
								echo "Insert Failed";
							}
					}else
					{
						redirect('/user/login/', 'refresh');
					}
	
				
			
			}
			
				function insert_out($id,$category_select = NULL,$action_select = NULL)
			{
			
				if($this->session->userdata('username') != '')
					{
						if($this->User_model->out($id,$category_select,$action_select)){
							$this->User_model->update_out($id);
							$data['category'] = $this->User_model->get_category();
							$data['result'] = $this->User_model->select_invmain($id,$category_select,$action_select);
							$this->load->view('master_view', array('page' => 'view_main', 'data' => $data));
						}
						else
						{
							echo "Insert Failed";
						}
					}else
					{
						redirect('/user/login/', 'refresh');
					}
	
	
				
			
			}
			
		function view_main()
		{
			if($this->session->userdata('username') != '')
				{
					$data['result'] = $this->User_model->select_invmain();
					$data['category'] = $this->User_model->get_category();
					$this->load->view('master_view', array('page' => 'view_main', 'data' => $data));
				}else
				{
					redirect('/user/login/', 'refresh');
				}
				
		}
		
		function log_out()
		{
			$this->session->sess_destroy('username');
				redirect('/user/login/', 'refresh');
		}
		
		function view_order($params = NULL)
			{
					if($this->session->userdata('username') != '')
					{
						if (!is_null($this->input->post('logs')) || !is_null($this->input->post('category_option'))) {
								
								$params = array(
																	'logs' => $this->input->post('logs'),
																	'category_option' => $this->input->post('category_option'),											
																);
											$data = array(
												'result' => $this->User_model->filter($params),
												'category' => $this->User_model->get_category()
											);
											$this->load->view('master_view', array('page' => 'view_main', 'data' => $data));
						
				}
				}else
				{
					redirect('/user/login/', 'refresh');
				}
						
			}
	
}

	

?>