<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function getAllProductsWithDeps()
    {
        return $this->createQueryBuilder('p')
            ->select('p, u, c, t')
            ->join('p.user', 'u')
            ->join('p.categories', 'c')
            ->join('p.tags', 't')
            ->getQuery()
            ->getResult();
    }
}
