<?php
class UserModel extends BaseModel
{
    const TABLE = 'tbl_users';
    public function getAll(){
        return $this->all(self::TABLE);
    }
    public function findByIdUser($id)
    {
        return __METHOD__;
    } 
    public function findUser($username, $pwd){
        return $this->check($username, $pwd);
    }
    public function displayName($username){
        return $this-> nameOfUser($username);
    }
}