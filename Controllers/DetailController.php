<?php
class DetailController extends BaseController
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
        $id = $_REQUEST["id"];
        $bill = $this->billModel->getAll(); 
        $details = $this->billModel->getDetailBill($id);
        $user = $this->userModel ->getAll();
        $this->view("backend.admin.detail",[
            'id'=> $id,
            'bill'=> $bill,
            'details' => $details,         
        ]);  
    }
    public function chart(){
        $static0=$this->billModel->countStatic(0);
		$static1=$this->billModel->countStatic(1);
		$static2=$this->billModel->countStatic(2);
		$static3=$this->billModel->countStatic(3);
		return $this->view('backend.admin.chart', [
            "static0"=>$static0,
			"static1"=>$static1,
			"static2"=>$static2,
			"static3"=>$static3
			
		]);
	}
    
}