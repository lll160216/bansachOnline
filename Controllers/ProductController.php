<?php
class ProductController extends BaseController
{
    private $productModel;
    public function __construct(){
        $this -> loadModel("ProductModel");
        $this -> productModel = new ProductModel();
    }
    public function get(){
        echo json_encode($this -> productModel->getAll()) ;
    }
    public function index()
    {
        $products = $this->productModel->getAll();
        // echo "<script> alert(${products}) </script>";
        return $this->view('frontend.products.index',['products' => $products]);
    }
}