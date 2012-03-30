<?php


	$attributes = array('class' => 'filters', 'id' => 'filters','name' => 'filters');
	echo form_open(base_url() . 'admin_user/insert_entry',$attributes);
	
	$item = array(
										'name' => 'item',
										'id'	 => 'item',
										'value'	 => ''
									);
									
	
									
				$category_option = array('' => '- All -'); //initialize the array
				//assign the database result on the array
        foreach ($data['category']->result() as $category)
        {
        	 $array_temp = array($category->category => $category->category);
           $category_option = $category_option + $array_temp;
        }
				$category_js = 'onChange="document.forms[\'filters\'].submit();"'; //javascript to submit the form where 
				$category_select = isset($_POST['category_option']) ? $_POST['category_option'] : ''; //retain the value of the dropdown after submitting
?>

<ul style="list-style:none;">
	<li>
    	<div>	
      <label><b>Insert</b></label>&nbsp;&nbsp;<label>Item:</label>&nbsp;<?php echo form_input($item); ?>&nbsp;&nbsp;&nbsp;
      <label>Category:</label>
      	<?php echo form_dropdown('category_option',$category_option, $category_select,$category_js); ?>
      </div>
   </li>

   <li>
   		<?php echo validation_errors(); ?>
   </li>
   
    <li>
   	<div>
    <?php //echo form_submit(array('name' => 'submit_name', 'id' => 'submit_id', ), 'Insert'); ?>
    </div>
   </li>
   
</ul> 
<?php echo form_close(); ?>

<?php
   echo "<table width=800 border=0 align=center cellspacing=1 bgcolor=	#AFC7C7>";
	 echo"<td>"."<b>"."Item"."</b>"."</td>";
	 echo"<td>"."<b>"."Category"."</b>"."</td>";
	 echo"<td>"."<b>"."Status"."</b>"."</td>";
	 echo"<td>"."<b>"."Date/Time"."</b>"."</td>";
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
}
		echo '</tr>';
		echo '</table>';
?>
<br /><br />
