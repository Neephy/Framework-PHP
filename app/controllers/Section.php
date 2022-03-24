<?php
namespace controllers;
 /**
  * Controller Section
  */
class Section extends \controllers\ControllerBase{

	public function index(){
		
	}

	
	public function get($id){
		
		$this->loadView('Section/get.html');

	}

}
