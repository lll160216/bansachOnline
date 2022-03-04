<?php
class CartController extends BaseController 
{
    private $productModel;
    public function __construct()
	{
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel;
		$this->loadModel('BillModel');
		$this->billModel = new BillModel;
		$this->loadModel('CartModel');
		$this->cartModel = new CartModel;
	}
    public function index()
    {
        return $this->view('frontend.carts.index');
    }
    public function checkout()
	{			
		$this->cart= json_decode($_POST['json'], true);
		$bill_id = $this->billModel->createBill($_POST['name'],$_POST['address'],$_POST['phone'],$_SESSION['user']);
		$this->cartModel->createCart($bill_id, $this->cart);	
	}
	public function update(){
		$bill_id = $_POST['bill_id'];
		$product_id = $_POST['product_id'];
		$newValue = $_POST['newValue'];
		$this->cartModel->updateQuantity($bill_id,$product_id,$newValue);
	}
}