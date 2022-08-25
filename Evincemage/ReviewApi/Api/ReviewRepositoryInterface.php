<?php

declare(strict_types=1);

namespace Evincemage\ReviewApi\Api;

use Evincemage\ReviewApi\Api\Data\ReviewInterface;


interface ReviewRepositoryInterface
{
     /**
     * Save review.
     *
     * @param \Evincemage\ReviewApi\Api\Data\ReviewInterface $review
     *
     * @return \Evincemage\ReviewApi\Api\Data\ReviewInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
   
    public function save(ReviewInterface $review): \Evincemage\ReviewApi\Api\Data\ReviewInterface;

 

   
    
}