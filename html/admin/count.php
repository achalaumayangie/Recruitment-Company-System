<?php

	$sql = "SELECT cid FROM company";
	$C_count = $conn->query($sql)->num_rows;

	$sql = "SELECT eid FROM employee";
	$E_count = $conn->query($sql)->num_rows;

	
?>