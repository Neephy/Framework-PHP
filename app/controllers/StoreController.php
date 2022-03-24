<?php
namespace controllers;
 /**
  * Controller StoreController
  */
class StoreController extends \controllers\ControllerBase{

    /**
     * @throws \Exception
     */
    #[Route('_default', name: 'home')]
    public function index(){
		$this->loadView(IndexController/index.html)
	}
}
