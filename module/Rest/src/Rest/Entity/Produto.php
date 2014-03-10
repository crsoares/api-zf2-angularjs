<?php
/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace Rest\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="produtos")
 */
class Produto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    protected $categoria;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $descricao;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id) {
        $this->id = $id;
        
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        
        return $this;
    }

    
    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
        
        return $this;
    }


}
