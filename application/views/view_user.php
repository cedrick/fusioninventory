<?php
//$data = $this->User_model->select_user();
foreach ($data->result() as $row)
{
   echo '<table>';
	 echo '<tr>';
	 echo '<td>'.$row->username.'</td>';
   echo '<td>'.$row->name.'</td>';
   echo '<td>'.$row->email.'</td>';
	 
	 echo '</tr>';
	 echo '</table>';
}
?>
