<?php

return array(
    'routes' => array(
        'registration' => new Zend_Controller_Router_Route(
                'registration/:type',
                array(
                    'module' => 'users',
                    'controller' => 'registration',
                    'action' => 'index',
                    'type' => 'member'
                )
        ),
        'logout' => new Zend_Controller_Router_Route(
                'logout',
                array(
                    'module' => 'users',
                    'controller' => 'index',
                    'action' => 'logout'
                )
        ),
        'login_result' => new Zend_Controller_Router_Route(
                'login',
                array(
                    'module' => 'users',
                    'controller' => 'index',
                    'action' => 'loginresult'
                )
        ),
        'profile_edit' => new Zend_Controller_Router_Route(
                '/profile/edit',
                array(
                    'module' => 'users',
                    'controller' => 'profile',
                    'action' => 'edit'
                )
        ),
        'profile_education' => new Zend_Controller_Router_Route(
                '/profile/education',
                array(
                    'module' => 'users',
                    'controller' => 'profile',
                    'action' => 'education'
                )
        ),
        'profile_contacts' => new Zend_Controller_Router_Route(
                '/profile/contacts',
                array(
                    'module' => 'users',
                    'controller' => 'profile',
                    'action' => 'contacts'
                )
        ),
        'content_add' => new Zend_Controller_Router_Route(
                '/add/:object',
                array(
                    'module' => 'users',
                    'controller' => 'objects',
                    'action' => 'add',
                    'object' => 'question'
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
            'label' => 'Пользователи',
            'uri' => '#',
            'order' => 3,
            'pages' => array(
                array(
                    'label' => 'Список пользователей',
                    'module' => 'users',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Список услуг пользовтелей',
                    'module' => 'users',
                    'controller' => 'cmsuserservices',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Добавить услугу для компании',
                    'module' => 'users',
                    'controller' => 'cmsuserservices',
                    'action' => 'add',
                )
            )
        ), array(
            'label' => 'Компании',
            'uri' => '#',
            'order' => 4,
            'pages' => array(
                array(
                    'label' => 'Список компаний',
                    'module' => 'users',
                    'controller' => 'cmscompany',
                    'action' => 'showlist',
                )
            )
        ), array(
            'label' => 'Юристы',
            'uri' => '#',
            'order' => 4,
            'pages' => array(
                array(
                    'label' => 'Список юристов',
                    'module' => 'users',
                    'controller' => 'cmsjurist',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Список профстатустов',
                    'module' => 'users',
                    'controller' => 'cmsjuristprofstatus',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Добавить профстатус',
                    'module' => 'users',
                    'controller' => 'cmsjuristprofstatus',
                    'action' => 'add',
                ),
                array(
                    'label' => 'Список специализаций',
                    'module' => 'users',
                    'controller' => 'cmsspecialization',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Добавить специализацию',
                    'module' => 'users',
                    'controller' => 'cmsspecialization',
                    'action' => 'add',
                )
            )
        ), array(
            'label' => 'Гражданины',
            'uri' => '#',
            'order' => 4,
            'pages' => array(
                array(
                    'label' => 'Список гражданинов',
                    'module' => 'users',
                    'controller' => 'cmsmember',
                    'action' => 'showlist',
                )
            )
        )
    ),
    //'model' => 'Content_Model_Content'
);
