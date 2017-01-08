<?php

// src/AppBundle/Repository/ProductRepository.php
namespace TravelBundle\Repository;

use Doctrine\ORM\EntityRepository;
use TravelBundle\Entity\Room;
use TravelBundle\Entity\Hotel;

class RoomRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Product p ORDER BY p.name ASC'
            )
            ->getResult();
    }
}