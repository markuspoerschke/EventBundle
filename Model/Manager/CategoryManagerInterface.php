<?php

namespace Eluceo\EventBundle\Model\Manager;

interface CategoryManagerInterface
{
    public function findAll();

    public function findOneBy(array $criteria);
}
