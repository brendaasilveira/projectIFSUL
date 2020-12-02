<?php 	
	$this->load->view('includes/header');
	if($view!='') $this->load->view($view);
    $this->load->view('includes/footer');