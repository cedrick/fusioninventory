<?php
	
	$attributes = array('class' => 'filters', 'id' => 'filters','name' => 'filters');
	echo form_open(base_url() . 'admin_user/manage_entry',$attributes);	
								
$category_option = array('' => '- All -'); //initialize the array
		//assign the database result on the array
        foreach ($data['category']->result() as $category)
        {
        	 $array_temp = array($category->category => $category->category);
           $category_option = $category_option + $array_temp;
        }
				$category_js = 'onChange="document.forms[\'filters\'].submit();"'; //javascript to submit the form where 
				$category_select = isset($_POST['category_option']) ? $_POST['category_option'] : ''; //retain the value of the dropdown after submitting
				
			$action= array(
										''  =>'-'. 'All'.'-',
										'in'  => 'IN',
										'out'    =>'OUT'
                		);
 $action_js = 'onChange="document.forms[\'filters\'].submit();"'; //javascript to submit the form where
 $action_select = isset($_POST['logs']) ? $_POST['logs'] : ''; //retain the value of the dropdown after submitting
 
	$fdate = array('' => '- All -'); //initialize the array
		//assign the database result on the array
        foreach ($data['rdate']->result() as $rdate)
        {
        	 $array_temp = array(substr($rdate->fdate,0,10) => substr($rdate->fdate,0,10));
           $fdate = $fdate + $array_temp;
        }
				$fdate_js = 'onChange="document.forms[\'filters\'].submit();"'; //javascript to submit the form where 
				$fdate_select = isset($_POST['rdate']) ? $_POST['rdate'] : ''; //retain the value of the dropdown after submitting





?>

<ul style="list-style:none;">
 
    	<div>
      	 <label><b>Filter Logs By:</b></label>	
         <label>Category:</label>
				 <?php echo form_dropdown('category_option',$category_option, $category_select,$category_js); ?>
         &nbsp;&nbsp;&nbsp;&nbsp;
         <label>Action:</label><?php echo form_dropdown('logs',$action,$action_select,$action_js); ?>
         &nbsp;&nbsp;&nbsp;
         <label>Date:</label>
				<?php echo form_dropdown('rdate',$fdate,$fdate_select,$fdate_js); ?>
      </div>
   </li>
   		<?php //echo form_dropdown('fdate',$fdate); ?>
   <li>
   		<?php echo validation_errors(); ?>
   </li>
</ul> 
<?php echo form_close(); ?>

<?php
   echo "<table width=800 border=0 align=center cellspacing=1 bgcolor=	#AFC7C7>";
	 echo"<td>"."<b>"."Item"."</b>"."</td>";
	 echo"<td>"."<b>"."Category"."</b>"."</td>";
	 echo"<td>"."<b>"."Status"."</b>"."</td>";
	 echo"<td>"."<b>"."Date"."</b>"."</td>";
	 echo"<td>"."<b>"."Comment"."</b>"."</td>";
	 echo"<td>"."<b>"."Delete"."</b>"."</td>";
foreach ($data['result']->result() as $row)
{
  
	 	if($row->id%2==0)
								{$color=" bgcolor = '#a19f9e' ";}
								else{$color=" bgcolor='#FFF5EE'";}
	 echo '<tr '.$color.' >';
	 echo '<td>'.$row->item.'</td>';
   echo '<td>'.$row->category.'</td>';
   echo '<td>'.$row->status.'</td>';
	 echo '<td>'.$row->fdate.'</td>';
	 echo '<td>'.$row->comment.'</td>';
	 echo '<td align="center"><a href="'.base_url().'admin_user/delete_entry/'.$row->id.'">Delete</td>';
}
		echo '</tr>';
		echo '</table>';
?>
<br /><br />
