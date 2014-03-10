<?php
/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;

use Rest\Entity\Produto as ProdutoEntity;

class Produto
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function insert(array $data)
    {
        $categoriaEntity = $this->em->getReference("Rest\Entity\Categoria", $data['categoriaId']);
        
        $produto = new ProdutoEntity();
        $produto->setNome('teste 1')
                ->setDescricao('descricao de teste 1')
                ->setCategoria($categoriaEntity);
        
        $this->em->persist($produto);
        $this->em->flush();
        
        return $produto;
    }
    
    public function update(array $data)
    {
        $categoriaEntity = $this->em->getReference("Rest\Entity\Categoria", $data['categoriaId']);
        
        $produto = $this->em->getReference("Rest\Entity\Produto", $data['id']);
        $produto->setNome($data['nome'])
                ->setDescricao($data['descricao'])
                ->setCategoria($categoriaEntity);
        
        $this->em->persist($produto);
        $this->em->flush();
        
        return $produto;
    }
    
    public function delete($id)
    {
        $produto = $this->em->getReference("Rest\Entity\Produto", $id);
        
        $this->em->remove($produto);
        $this->em->flush();
        
        return $id;
    }
}
