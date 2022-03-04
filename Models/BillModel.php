<?php 
class BillModel extends BaseModel{
    const TABLE = 'tbl_bills';
    public function getAll()
    {
       return $this->all(self::TABLE);
    }
    public function findLastBill()
    {   
        $bills = $this->getAll();
        if($bills == null){
            return 0;
        }
        return $bills[sizeof($bills)-1]["bill_id"]+1;
    } 
    //Tạo 1 hóa đơn mới 
    public function createBill($name, $address, $phone, $username)
    {
        $bill_status = 0;
        $bill_id = $this->findLastBill();
        $user_id = $this->findUserID($username);
        $this->addBill($bill_id, $user_id, $name, $address, $phone,$bill_status);
        return $bill_id;
    }
    public function getBill($id){
        return $this->getByID($id, self::TABLE);
    }

    public function updateBill($id, $cart, $name, $address, $phone){
        $this->updateBillInfor($id, $name, $address, $phone);
        $this->delete("tbl_cart", "bill_id", $id);
        foreach($cart as $item){
            $this->addToCart($id, $item["product_id"], $item["amount"]);
        }
    }
    public function deleteBill($id){
        $this->delete('tbl_log', 'bill_id', $id);
        $this->delete('tbl_cart', 'bill_id', $id);
        $this->delete('tbl_bill', 'bill_id', $id);
    }

    public function getBillByUser($user_id){
        return $this->getByValue(self::TABLE, 'user_id', $user_id);
    }
    public function billCheck($user,$id){
        return $this->checkTwoValue(self::TABLE, "user_id", "bill_id", $user , $id);
    }
    public function getDetailBill($id){
        return $this->details($id);
    }
    public function upDateStatus($id,$stt){
        return $this ->updatestt(self::TABLE, $id,$stt);
    }
}