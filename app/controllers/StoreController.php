<?php
namespace controllers;
 /**
  * Controller StoreController
  */

 use models\Product;
 use models\Section;
 use Ubiquity\orm\DAO;

class StoreController extends \controllers\ControllerBase{

    /**
     * @throws \Exception
     */
    #[Route('_default', name: 'home')]
    public function index(){

        $count=DAO::count(Product::class);
        $this->loadView("StoreController/index.html", ['count' => $count]);
        //$name1 = $sections->getName();
        $sections = DAO::getAll(Section::class);
        foreach ($sections as $section) {
            $name = $section->getName();
            $description = $section->getDescription();
            $id = $section->getId();
            $this->loadView('StoreController/section.html', ['name' => $name, 'desc' => $description, 'id' => $id]);
        }
	}

    public function section($id) {

    }

}
