<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $repo = $em->getRepository("Rest\Entity\Categoria");
        
        $categorias = $repo->findAll();
        
        $produtoService = $this->getServiceLocator()->get("Rest\Service\Produto");
        $produtoService->insert(array('categoriaId' => 6));
        
        return new ViewModel(array("categorias"=>$categorias));
    }
}
