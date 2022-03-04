<?php
    class BaseModel extends DataBase
{
    protected $connect;
    public function __construct(){
        $this->connect =$this->connect();
    }
  
    public function all($table){
        $sql = "SELECT * FROM ${table}";
        $querry = $this -> _query($sql);
        $data=[];
        while ($row = mysqli_fetch_assoc($querry)){
            array_push($data, $row);
        }
        return $data;
    }
    public function check($username, $password)
    {
        $sql = "SELECT * FROM tbl_users WHERE username = '${username}' AND password = '${password}'";
        $query = $this->_query($sql);
        $row=mysqli_fetch_assoc($query);
        if($row){
            return 1;
        }
        return 0;
    }
    public function findUserID($username){
        $sql = "SELECT user_id FROM tbl_users WHERE username = '${username}'";
        $query = $this->_query($sql);
        $row = mysqli_fetch_assoc($query);
        return $row["user_id"];
    }
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function addBill($id, $user_id, $name, $address, $phone,$bill_status){
        $sql = "INSERT INTO tbl_bills VALUES(${id},${user_id},$bill_status,'${name}','${address}','${phone}')";
        $this->_query($sql);
    }
    public function nameOfUser($username){
        $sql = "SELECT tenKh FROM tbl_users WHERE username = '${username}'";
        $query = $this->_query($sql);
        $row = mysqli_fetch_assoc($query);
        return $row["tenKh"];
    }
    public function getByID($id, $table){
        $col = substr($table,4)."_id";
        if($table=="tbl_carts"){
            $col = "bill_id";
        }
        $sql = "SELECT * FROM ${table} WHERE ${col}=${id}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }
    public function addToCart($bill_id, $product_id, $amount){
        $sql = "INSERT INTO tbl_carts VALUES(${bill_id},${amount},${product_id})";
        $this->_query($sql);
    }
    public function details($id){
        $sql = "SELECT tbl_carts.product_id, tbl_products.product_name, tbl_products.product_cost, tbl_carts.cart_amount, (tbl_carts.cart_amount*tbl_products.product_cost) as 'total', tbl_products.product_img FROM tbl_carts, tbl_bills, tbl_products WHERE tbl_bills.bill_id=tbl_carts.bill_id and tbl_products.product_id=tbl_carts.product_id and tbl_bills.bill_id=${id}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }
    public function updatestt($table, $id,$stt){
        $sql = "UPDATE $table set bill_status = $stt  WHERE $table.bill_id = $id";
        $this->_query($sql);
    }
    public function isAdmin($username){
        $sql = "SELECT user_level FROM tbl_users WHERE username = '${username}'";
        $query = $this->_query($sql);
        $row = mysqli_fetch_assoc($query);
        return $row["user_level"];
    }
    public function countStatic($static){
        $sql="SELECT count(bill_status) as 'count' FROM tbl_bills WHERE bill_status = ${static}";
        $query = $this->_query($sql);
        $data=[];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data[0]["count"];
    }
    public function updateQuantity($bill_id,$product_id,$newValue){
        $sql = "UPDATE tbl_carts set cart_amount = $newValue  WHERE bill_id = $bill_id AND product_id =$product_id ";
        $this->_query($sql);
    }
}