<?php
/**
 * Created by PhpStorm.
 * User: alexandr
 * Date: 12.11.17
 * Time: 20:11
 */

namespace AppBundle\Controller;


use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{

    public function preUpdateEntity($entity)
    {

    }


    /*
     * действия перед добавлением
     * */
    protected function prePersistEntity($entity)
    {
        if (method_exists($entity, 'setUserId')) {
            $entity->setUserId($this->getUser()->getId());
        }

        if (method_exists($entity, 'setDate')) {
            $entity->setDate(new \DateTime());
        }

    }

    protected function listEventAction()
    {
        //TODO: найти способ по лучше !!!
        $this->entity['list']['dql_filter'] = 'entity.userId = ' . $this->getUser()->getId() ;

        return parent::listAction();

    }

    protected function showEventAction()
    {
        //TODO: найти способ по лучше !!!
        $this->entity['show']['dql_filter'] = 'entity.userId = ' . $this->getUser()->getId() ;

        return parent::showAction();

    }

    protected function searchEventAction()
    {
        //TODO: найти способ по лучше !!!
        $this->entity['search']['dql_filter'] = 'entity.userId = ' . $this->getUser()->getId() ;

        return parent::searchAction();

    }


}