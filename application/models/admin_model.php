<?php
class Admin_model extends CI_Model
{
	 	function Admin_model()
		{
			parent::__construct();
		}
		
		function register_useradmin($username,$password,$name)
		{
			$key = "Codeigniter";
			$password = md5($password.$key);
			$query_str =  "INSERT INTO fusion_admin (username,password,name) Values (?,?,?)";
			if($this->db->query($query_str,array($username,$password,$name))){
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			 
		}
		
			function login_user($username,$password)
		{
			$key = "Codeigniter";
			$password = md5($password.$key);
			$query_str = "SELECT * FROM fusion_admin WHERE username='$username' and password='$password'";
			$result = $this->db->query($query_str,array($username,$password));
			if($result->num_rows()==1){
				
			  $this->session->set_userdata('username_admin',$username);
				return TRUE;
			}
			else
			{
				return FALSE;
			}
			
		}
		
		function check_exist_username($username)
		{
			$query_str = "SELECT username from fusion_admin where username = ?";
			$result = $this->db->query($query_str,$username);
			if($result->num_rows() > 0)
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
		}
		
		function select_inv()
		{
			return $this->db->query("SELECT * FROM fusion_inv order by fdate desc");
		}
		
		function insert_record($item,$category_option)
		{
				$status="IN";
	return $this->db->query("INSERT INTO fusion_inv (item,category,status,fdate) VALUES('".$item."','".$category_option."','".$status."',NOW())");
		}
		
		
		
			function filter($params)
		{
			if (($params['category_option']) != ''){ 
						
						$this->db->where('fusion_logs.category', $params['category_option']); 
			 			}		
						
			if (($params['logs']) != '') { 
						
						$this->db->where('fusion_logs.status', $params['logs']); 
						}
			if (($params['rdate']) != '') { 
						
						$this->db->like('fusion_logs.fdate', $params['rdate']); 
						}
						
						
							$this->db->select('*');
							$this->db->from('fusion_logs');
							$this->db->where('fusion_logs.all =','1');
							$this->db->order_by('fusion_logs.category');
							$return = $this->db->get();
							return $return;
			
		}
		
		
		function filter2($params)
		{
			if (($params['category_option']) != ''){ 
						
						$this->db->where('fusion_inv.category', $params['category_option']); 
			 			}		
						
			if (($params['logs']) != '') { 
						
						$this->db->where('fusion_inv.status', $params['logs']); 
						}
			if (($params['rdate']) != '') { 
						
						$this->db->like('fusion_inv.fdate', $params['rdate']); 
						}
						
						
							$this->db->select('*');
							$this->db->from('fusion_inv');
							$this->db->where('fusion_inv.all =','1');
							$this->db->order_by('fusion_inv.category');
							$return = $this->db->get();
							return $return;
			
		}

	function in($item,$category_option)
		{
				
							$item = $item;
							$category =  $category_option;
						
					$person = $this->session->userdata('username_admin');
				$status="IN";
	return $this->db->query("INSERT INTO fusion_logs(item,category,status,fdate,person) VALUES('".$item."','".$category."','".$status."',NOW(),'".$person."')");
		}
		
		function get_category()
		{
			return $this->db->query("SELECT * FROM fusion_category order by category asc ");
		}
		
			function get_date()
		{
			return $this->db->query("SELECT * FROM fusion_logs order by fdate asc ");
		}
		
			function get_date2()
		{
			return $this->db->query("SELECT * FROM fusion_inv order by fdate asc ");
		}
		
		
			function delete($id)
		{
				
				
	return $this->db->query("DELETE FROM fusion_inv WHERE id = '$id' ");
		}
		
}
		



?>