<?php

namespace App\EventListener;

use App\Entity\Category;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class CategorySelect2Add
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Category) {
            return;
        }

        $entity->setSlug(base64_encode($entity->getTitle()));
    }
}