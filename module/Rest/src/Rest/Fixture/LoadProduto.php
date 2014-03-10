<?php
/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace Rest\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Rest\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$categoriaLivros = $this->getReference('categoria-livros');
		$categoriaComputadores = $this->getReference('categoria-computadores');

		$produto = new Produto();
		$produto->setNome("Orientação a objeto")
				->setCategoria($categoriaLivros)
				->setDescricao("Descrição do livro");

		$manager->persist($produto);

		$produto = new Produto();
		$produto->setNome("MacBook Pro")
				->setCategoria($categoriaComputadores)
				->setDescricao("Descrição do computador");

		$manager->persist($produto);

		$manager->flush();
	}

	public function getOrder()
	{
		return 2;
	}
}