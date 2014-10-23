<?php

$this->load->view('layouts/head');
$this->load->view('layouts/nav');
$this->load->view($section.'/'.$page);
$this->load->view('layouts/footer');