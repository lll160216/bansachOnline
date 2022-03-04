
<?php 
class ProductModel extends BaseModel{
    const TABLE = 'tbl_products';
    
    public function getAll(){
        return $this->all(self::TABLE);
    }
    public function delete(){
        echo __METHOD__;
    }
    public function add(){
        echo __METHOD__;
    }
}