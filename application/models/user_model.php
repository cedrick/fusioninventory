<?php
class User_model extends CI_Model
{
	 	function user_model()
		{
			parent::__construct();
		}
		
		
	function register_user($username,$password,$name)
		{
			$key = "Codeigniter";
			$password = md5($password.$key);
			$query_str =  "INSERT INTO tbl_user (username,password,name) Values (?,?,?)";
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
			$query_str = "SELECT * FROM tbl_user WHERE username='$username' and password='$password'";
			$result = $this->db->query($query_str,array($username,$password));
			if($result->num_rows()==1){
				
			  $this->session->set_userdata('username',$username);
				return TRUE;
			}
			else
			{
				return FALSE;
			}
			
		}
		
		function check_exist_username($username)
		{
			$query_str = "SELECT username from tbl_user where username = ?";
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
		
			function select_invmain($id = NULL,$category_select = NULL,$action_select = NULL)
		{
							$this->db->select('*');
							$this->db->from('fusion_inv');
							$this->db->where('fusion_inv.all =','1');
							$this->db->order_by('fusion_inv.category');
							$return = $this->db->get();
							return $return;
		}
		
		
		function filter($params)
		{
			if (($params['category_option']) != ''){ 
						
						$this->db->where('fusion_inv.category', $params['category_option']); 
			 			}		
						
			if (($params['logs']) != '') { 
						
						$this->db->where('fusion_inv.status', $params['logs']); 
						}
						
							$this->db->select('*');
							$this->db->from('fusion_inv');
							$this->db->where('fusion_inv.all =','1');
							$this->db->order_by('fusion_inv.category asc ');
							$return = $this->db->get();
							return $return;
			
		}
		
			
		
			function in($id,$category_select = NULL,$action_select = NULL)
		{
				$data = $this->db->query("SELECT * FROM fusion_inv where id='$id' ");
				foreach ($data->result() as $row)
					{
	
							$item = $row->item;
							$category = $row->category;
						
					}
					
				$person = $this->session->userdata('username');
				$status="IN";
	return $this->db->query("INSERT INTO fusion_logs(item,category,status,fdate,person) VALUES('".$item."','".$category."','".$status."',NOW(),'".$person."')");
	
	
		}
		
			function out($id,$category_select = NULL,$action_select = NULL)
		{
				$data = $this->db->query("SELECT * FROM fusion_inv where id='$id' ");
				foreach ($data->result() as $row)
					{
	
							$item = $row->item;
							$category = $row->category;
						
					}
					
						
					$person = $this->session->userdata('username');
					$status="OUT";
	return $this->db->query("INSERT INTO fusion_logs(item,category,status,fdate,person) VALUES('".$item."','".$category."','".$status."',NOW(),'".$person."')");
		}
		
		function update_in($id,$category_select = NULL,$action_select = NULL)
		{
			$status="IN";
			return $this->db->query("UPDATE  fusion_inv SET status='$status' WHERE id='$id'");
		}
		
		function update_out($id,$category_select = NULL,$action_select = NULL)
		{
			 $status="OUT";
			return $this->db->query("UPDATE  fusion_inv SET status='$status' WHERE id='$id'");
		}
		
		function get_category()
		{
			return $this->db->query("SELECT * FROM fusion_category order by category asc ");
		}
		
}


?>