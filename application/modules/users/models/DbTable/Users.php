<?php

class Users_Model_DbTable_Users extends Rastor_Model_DbTable_Abstract {

    protected $_name = 'users';
    protected $_primary = 'id';
    protected $_sequence = true;

    public function getSelectList() {
        $records = $this->getRecords();
        
        $result = array();
        foreach ($records as $value) {
            $result[$value->id] = $value->login;
        }
        
        return $result;
    }
    
}