<?php

namespace Rhino\Mvc\Controller;

use Zend\Mvc\Controller\AbstractActionController as AbstractAction;
use Zend\Stdlib\RequestInterface;
use Zend\Stdlib\ResponseInterface;
use Zend\Mvc\MvcEvent;

/**
 * Base Abstract Action Controller
 */
abstract class AbstractActionController extends AbstractAction
{
	/**
     * @var EntityManager
     */
    protected $em;

    /**
     * Sets the EntityManager
     *
     * @param EntityManager $em
     * @access protected
     * @return AbstractActionController
     */
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Returns the EntityManager
     *
     * Fetches the EntityManager from ServiceLocator if it has not been initiated
     * and then returns it
     *
     * @access protected
     * @return EntityManager
     */
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
}