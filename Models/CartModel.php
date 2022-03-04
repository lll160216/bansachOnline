
<?php 
class CartModel extends BaseModel{
    const TABLE = 'tbl_carts';
    public function getAll(){
        return $this->all(self::TABLE);
    }
    public function createCart($bill_id, $cart)
    {
        foreach($cart as $item){
            $this->addToCart($bill_id, $item["id"], $item["amount"]);
        }
    }
    
}