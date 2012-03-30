<?php
class Admin_User extends CI_Controller
{
	 function Admin_User()  
	 	{
     	parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('Admin_model');
    }
		
		function index()  
	 	{
				redirect('/admin_user/login/', 'refresh');
    }
		
		function register_admin()  
	 	{
			if($this->session->userdata('username_admin') != '')
			{
				$this->load->library('form_validation');
				$this->form_validation->set_rules('reg_username','Username','trim|required|alpaha_numeric|xss_clean|strtolower|callback_username_not_exist');
				$this->form_validation->set_rules('name','Name','trim|required|alpaha_numeric|xss_clean');
				$this->form_validation->set_rules('password','Password','trim|required|alpaha_numeric|xss_clean');
				$this->form_validation->set_rules('password_conf','Password Confrimation',       'trim|required|alpaha_numeric|matches[password]');
				if($this->form_validation->run() == FALSE)
						{
							$this->load->view('admin_view', array('page' => 'admin_reg', 'data' => NULL));
						}else
						{	
							$username = $this->input->post('reg_username');
							$name = $this->input->post('name');
							$password = $this->input->post('password');
							
							if($this->Admin_model->register_useradmin($username,$name,$password))
							{
								$this->session->set_flashdata('insertdata', 'The data was inserted');
								$this->load->view('admin_view', array('page' => 'admin_reg', 'data' => NULL));
							}else
							{
								return FALSE;
							}				
					}
			}else
			{
					redirect('/admin_user/login/', 'refresh');
			}
    }
		
		
		function username_not_exist($username)
		{
			$this->form_validation->set_message('username_not_exist','That username already exist choose another username');
			if($this->Admin_model->check_exist_username($username))
			{
				return FALSE;
			}else
			{
				return TRUE;
			}
		}
		
			function login()
		{
				

			if($this->session->userdata('username_admin') == '')
				{
					$this->load->library('form_validation');
				 	$this->form_validation->set_rules('username','Username','trim|required|alpaha_numeric|xss_clean');
					$this->form_validation->set_rules('password','Password','trim|required|alpaha_numeric|xss_clean');
							
							if($this->form_validation->run() == FALSE) {
								$this->load->view('admin_view', array('page' => 'admin_login', 'data' => NULL));
							}else
							{
									
									$username = $this->input->post('username');
									$password = $this->input->post('password');
									if($this->Admin_model->login_user($username,$password)){
											
												redirect('/admin_user/insert_entry/', 'refresh');
											
									}
									else
									{
										echo "<font color=#AA0000 face=Arial>Login Error!</font>";
										redirect('/admin_user/login/', 'refresh');
									}
							}
				
				}else
				{
					redirect('/admin_user/insert_entry/', 'refresh');
				}
				
			
		}
		
		function insert_entry()
			{
				
				if($this->session->userdata('username_admin') != '')
				{
					$this->load->library('form_validation');
					$this->form_validation->set_rules('item','Item','trim|required|alpaha_numeric|xss_clean');
					$this->form_validation->set_rules('category_option','Category','trim|required|alpaha_numeric|xss_clean');
					 if($this->form_validation->run() == FALSE)
						{
								$data = array(
															'result' => $this->Admin_model->select_inv(),
															'category' => $this->Admin_model->get_category()
															);
								$this->load->view('admin_view', array('page' => 'insert_view', 'data' => $data));
						}else
						{	
							$item = $this->input->post('item');
							 $category_option = $this->input->post('category_option');
							if($this->Admin_model->insert_record($item,$category_option)){
								
															$data['result'] = $this->Admin_model->select_inv();
															$data['category'] = $this->Admin_model->get_category();
															$this->Admin_model->in($item,$category_option);
								$this->load->view('admin_view', array('page' => 'insert_view', 'data' => $data));
							}
							else
							{
								echo "Insert Failed";
							}
						
						}
				}else
				{
					redirect('/admin_user/login/', 'refresh');
				}
				
			
			}
			

		function log_out()
		{
			$this->session->sess_destroy('username');
				redirect('/admin_user/login/', 'refresh');
		}
		
		function view_order($params = NULL)
			{
				if($this->session->userdata('username_admin') != '')
					{
						if (!is_null($this->input->post('action')) || !is_null($this->input->post('category'))) {
								
								$params = array(
																	'action' => $this->input->post('action'),
																	'category' => $this->input->post('category'),											
																);
											$data = $this->Admin_model->filter($params);
											$this->load->view('admin_view', array('page' => 'view_main', 'data' => $data));
						
							}
					}else
				{
					redirect('/admin_user/login/', 'refresh');
				}
						
			}
			
			
				function view_logs($params = NULL)
			{
					if($this->session->userdata('username_admin') != '')
					{
						if (!is_null($this->input->post('rdate'))  || !is_null($this->input->post('logs')) || !is_null($this->input->post('category_option'))) {
								
								$params = array(
																	'logs' => $this->input->post('logs'),
																	'category_option' => $this->input->post('category_option'),		
																	'rdate' => $this->input->post('rdate'),											
																);
											$data = array(
												'result' => $this->Admin_model->filter($params),
												'category' => $this->Admin_model->get_category(),
												'rdate' => $this->Admin_model->get_date()
											);
											$this->load->view('admin_view', array('page' => 'view_logs', 'data' => $data));
						
							}
					}else
				{
					redirect('/admin_user/login/', 'refresh');
				}
						
			}
			
			function manage_entry()
			{
					if($this->session->userdata('username_admin') != '')
					{
						if (!is_null($this->input->post('rdate'))  || !is_null($this->input->post('logs')) || !is_null($this->input->post('category_option'))) {
								
								$params = array(
																	'logs' => $this->input->post('logs'),
																	'category_option' => $this->input->post('category_option'),		
																	'rdate' => $this->input->post('rdate'),											
																);
											$data = array(
												'result' => $this->Admin_model->filter2($params),
												'category' => $this->Admin_model->get_category(),
												'rdate' => $this->Admin_model->get_date2()
											);
											$this->load->view('admin_view', array('page' => 'manage_view', 'data' => $data));
						
				}
				}else
				{
					redirect('/admin_user/login/', 'refresh');
				}
		  }
			
			function delete_entry($id)
			{
				if($this->session->userdata('username_admin') != '')
					{
							if($this->Admin_model->delete($id))
								{
												$data['result'] = $this->Admin_model->select_inv();
												$data['category'] = $this->Admin_model->get_category();
												$data['rdate'] = $this->Admin_model->get_date2();
									$this->load->view('admin_view', array('page' => 'manage_view', 'data' => $data));
								}else
								{
									
								}
							
						
						
					}else
					{
						redirect('/admin_user/login/', 'refresh');
					}
					
					
			
			}
	
}

	

?>