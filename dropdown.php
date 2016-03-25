

<?php 
	
	$data = array('vic','steve','george');

 ?>

<select>
	<?php 
		foreach ($data as $key => $value) {
			?>
				<option><?php echo $value ?></option>

			<?php
		}
	 ?>
	
</select>