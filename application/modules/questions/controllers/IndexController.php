<?php

class Questions_IndexController extends Rastor_Controller_Action {

    public function indexAction() {
        $questionsModel = new Questions_Model_Question();
        $questionTagsModel = new Questions_Model_QuestionTags();

        $page = $this->_getParam('page');
        $paginator = $questionsModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage());

        $tags = array();
        foreach ($paginator as $record) {
            $tags[$record->id] = $questionTagsModel->getQuestionTagsLinksList($record->id);
        }

        $this->view->paginator = $paginator;
        $this->view->tags = $tags;

        //$this->view->headTitle($this->_getTranslator()->_('Статьи'));
    }

    public function questiontagAction() {
        $questionsModel = new Questions_Model_Question();
        $questionTagsModel = new Questions_Model_QuestionTags();

        $tag = $this->_getParam('tag');

        $tagRecord = $questionTagsModel->getDbTable()->getRecord($tag);

        if ($tagRecord) {
            $page = $this->_getParam('page');
            $paginator = $questionsModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage(), array('tag' => $tag));

            $tags = array();
            foreach ($paginator as $record) {
                $tags[$record->id] = $questionTagsModel->getQuestionTagsLinksList($record->id);
            }

            $this->view->tag = $tagRecord;
            $this->view->paginator = $paginator;
            $this->view->tags = $tags;
        } else {
            throw new Exception('Tag not found');
        }

        //$this->view->headTitle($this->_getTranslator()->_('Статьи'));
    }

    private function getPostList($array, $pname) {
        $list = array();
        foreach ($array as $key => $value) {
            if (substr($key, 0, strlen($pname)) == $pname) {
                $list[] = substr($key, strlen($pname));
            }
        }

        return $list;
    }

    public function addAction() {
        $questionTagsModel = new Questions_Model_DbTable_QuestionTags();

        $form = new Questions_Form_Question();

        $this->view->tags1 = $questionTagsModel->getTags(0);
        $this->view->tags2 = $questionTagsModel->getTags(1);

        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();
                $usersModel = new Users_Model_DbTable_Users();

                if ($this->_getAuth()->hasIdentity()) {
                    $formData['user_id'] = $this->_getAuth()->getIdentity()->id;
                }
                
                $formData['tags'] = $this->getPostList($_POST, 'tag_');
                $_SESSION['newQuestion'] = $formData;
                
                $questionModel = new Questions_Model_DbTable_Question();
                
                $this->_redirect(Rastor_Url::get('question_preview'));
            }
        }
    }
    
    public function previewAction(){
        Zend_Debug::dump($_SESSION['newQuestion']);
        $this->view->record = $_SESSION['newQuestion'];
        
    }

    public function addpersonalAction() {
        
    }

    public function viewAction() {
        $questionsModel = new Questions_Model_Question();
        $questionTagsModel = new Questions_Model_QuestionTags();

        $id = $this->_getParam('id');
        $record = $questionsModel->getDbTable()->getEnableRecord($id);
        if ($record) {
            $this->view->record = $questionsModel->getDbTable()->getEnableRecord($id);
            $this->view->tags = $questionTagsModel->getQuestionTagsLinksList($id);
            $questionsModel->getDbTable()->incViews();
        } else {
            throw new Exception('Question not found');
        }
    }

}

