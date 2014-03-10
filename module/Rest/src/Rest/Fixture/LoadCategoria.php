<?php
/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace Rest\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Application\Entity\Categoria;

class LoadCategoria extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$categoria = new Categoria();
		$categoria->setNome("Livros");
		$this->addReference('categoria-livros', $categoria);

		$manager->persist($categoria);

		$categoria = new Categoria();
		$categoria->setNome("Computadores");
		$this->addReference('categoria-computadores', $categoria);

		$manager->persist($categoria);

		$manager->flush();
	}

	public function getOrder()
	{
		return 1;
	}
}