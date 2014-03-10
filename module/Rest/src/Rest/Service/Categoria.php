<?php
/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace Rest\Service;

use Doctrine\ORM\EntityManager;

use Rest\Entity\Categoria as CategoriaEntity;

class Categoria
{
    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function insert($nome)
    {
        $categoria = new CategoriaEntity;
        $categoria->setNome($nome);
        
        $this->em->persist($categoria);
        $this->em->flush();
        
        return $categoria;
    }
    
    public function update(array $data)
    {
        $categoria = $this->em->getReference("Rest\Entity\Categoria", $data['id']);
        $categoria->setNome($data['nome']);
        
        $this->em->persist($categoria);
        $this->em->flush();
        
        return $categoria;
    }
    
    public function delete($id)
    {
        $categoria = $this->em->getReference("Rest\Entity\Categoria", $id);
        
        $this->em->remove($categoria);
        $this->em->flush();
        
        return $id;
    }
}
