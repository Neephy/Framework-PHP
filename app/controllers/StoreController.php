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
        $sections = DAO::getAll(Section::class);
        foreach ($sections as $section) {
            $name = $section->getName();
            $description = $section->getDescription();
            $id = $section->getId();
            $products = $section->getProducts();
            $count = count($products);
            $this->loadView('StoreController/section.html', ['name' => $name, 'desc' => $description, 'id' => $id, 'count' => $count]);
        }
	}

    /**
     * @throws \Exception
     */
    #[Get(path:"section/{id}", name:"section")]
    public function section($id){
        $section = DAO::getById(Section::class, $id);
        $produits = $section->getProducts();
        foreach ($produits as $produit) {
            $name = $produit->getName();
            $stock = $produit->getStock();
            $price = $produit->getPrice();
            $this->loadView('StoreController/produits.html', ['name'=>$name, 'stock'=>$stock, 'price'=>$price]);

        }

    }

    /**
     * @throws \Exception
     */
    #[Get(path:"allProducts/", name: "allProducts")]
    public function allProducts() {
        $produits = DAO::getAll(Product::class);
        foreach ($produits as $produit) {
            $name = $produit->getName();
            $stock = $produit->getStock();
            $price = $produit->getPrice();
            $this->loadView('StoreController/produits.html', ['name'=>$name, 'stock'=>$stock, 'price'=>$price]);
        }
    }

}
