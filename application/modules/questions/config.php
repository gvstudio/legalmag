<?php

return array(
    'routes' => array(
        'question_view' => new Zend_Controller_Router_Route(
                'question/:id',
                array(
                    'module' => 'questions',
                    'controller' => 'index',
                    'action' => 'view'
                )
        ),
        'question_tag' => new Zend_Controller_Router_Route(
                'questionstag/:tag/:page',
                array(
                    'module' => 'questions',
                    'controller' => 'index',
                    'action' => 'questiontag',
                    'page' => 1
                )
        ),
        'question_add' => new Zend_Controller_Router_Route(
                'questions/add',
                array(
                    'module' => 'questions',
                    'controller' => 'index',
                    'action' => 'add'
                )
        ),
        'question_preview' => new Zend_Controller_Router_Route(
                'question/preview',
                array(
                    'module' => 'questions',
                    'controller' => 'index',
                    'action' => 'preview'
                )
        )
    ),
    'acl' => array(
        'resources' => array(
        //new Zend_Acl_Resource('content_index'),
        //new Zend_Acl_Resource('content_cms')
        ),
        'allow' => array(
            //array('moderator', 'content_cms', null),
            //array(null, 'content_index', null)
        ),
        'deny' => array()
    ),
    'cmsMenu' => array(
        array(
            'label' => 'Вопросы',
            'uri' => '#',
            'order' => 7,
            'pages' => array(
                array(
                    'label' => 'Список вопросов',
                    'module' => 'questions',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Список тегов вопросов',
                    'module' => 'questions',
                    'controller' => 'cmsquestiontags',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Добавить услугу для компании',
                    'module' => 'users',
                    'controller' => 'cmsuserservices',
                    'action' => 'add',
                )
            )
        )
    ),
    'model' => 'Content_Model_Content'
);
