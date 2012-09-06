<?php

class Questions_Model_DbTable_Question extends Rastor_Model_DbTable_Abstract {

    protected $_name = 'question';
    protected $_primary = 'id';
    protected $_sequence = true;

    protected function _getRastorTableSelect($requestParams) {
        return $this->select()
                        ->from(array('q' => $this->_name))
                        ->setIntegrityCheck(false)
                        ->joinLeft(array('m' => 'member'), 'q.member_id = m.id')
                        ->joinLeft(array('u' => 'users'), 'm.user_id = u.id', array('user_name' => 'u.name'))
                        ->group('q.id');
    }

    /**
     * Get select query for pagination.
     * 
     * @param array $options
     * @return Zend_Db_Table_Select
     */
    protected function _getPaginatorSelect($options) {
        if (isset($options['tag'])) {
            $select = $this->select()
                    ->setIntegrityCheck(false)
                    ->from(array('qta' => 'question_tags_assoc'), null)
                    ->joinLeft(array('q' => $this->_name), 'q.id = qta.question_id')
                    ->joinLeft(array('u' => 'users'), 'q.user_id = u.id', array('user_name' => 'u.name', 'user_id' => 'u.id'))
                    ->joinLeft(array('с' => 'city'), 'с.id = u.city_id', array('user_city' => 'name'))
                    ->where('enable = 1')
                    ->where('qta.tag_id = ?', $options['tag'])
                    ->order('q.date')
                    ->group('q.id');
        } else {
            $select = $this->select()
                    ->setIntegrityCheck(false)
                    ->from(array('q' => $this->_name))
                    ->joinLeft(array('u' => 'users'), 'q.user_id = u.id', array('user_name' => 'u.name', 'user_id' => 'u.id'))
                    ->joinLeft(array('с' => 'city'), 'с.id = u.city_id', array('user_city' => 'name'))
                    ->where('enable = 1')
                    ->order('q.date');
        }

        return $select;
    }

    public function getEnableRecord($id) {
        $select = $this->select()
                ->setIntegrityCheck(false)
                ->from(array('q' => $this->_name))
                ->joinLeft(array('m' => 'member'), 'q.member_id = m.id')
                ->joinLeft(array('u' => 'users'), 'm.user_id = u.id', array('user_name' => 'u.name', 'user_id' => 'u.id'))
                ->joinLeft(array('с' => 'city'), 'с.id = u.city_id', array('user_city' => 'name'))
                ->where('q.id = ?', $id)
                ->where('enable = 1');

        return $this->getAdapter()->fetchRow($select);
    }

    public function incViews() {
        $this->getAdapter()->query("update $this->_name set views = views + 1");
    }

}