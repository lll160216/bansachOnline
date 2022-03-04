<?php
class BillController extends BaseController
{
    public function __construct()
    {
        $this->loadModel('BillModel');
		$this->billModel = new BillModel;
		$this->loadModel('CartModel');
		$this->cartModel = new CartModel;
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel;
		$this->loadModel('UserModel');
		$this->userModel = new UserModel;
    }
    public function index()
    {
        if(isset($_SESSION["admin"]))
        { 
            $bill = $this->billModel->getAll(); 
            $product = $this->productModel->getAll();
            $user = $this->userModel ->getAll();
            $this->view("backend.admin.index",
            [          
                'bills'=>$bill,
                'products' => $product       
            ]
            );
        }
        else
        {
            header("location: index.php") ;
        }
    }
    public function update(){
        $id =$_POST['id'];
        $stt=$_POST['stt'];
        $this->billModel->upDateStatus($id,$stt);
    }
    
}