<?php
/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace Rest\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Entity\CategoriaRepository")
 * @ORM\Table(name="categorias")
 */
class Categoria 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     */
    private $nome;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }


}
