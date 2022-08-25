<?php

declare(strict_types=1);

namespace Evincemage\ReviewApi\Model;


use Evincemage\ReviewApi\Model\Review\Command\SaveInterface;
use Evincemage\ReviewApi\Api\ReviewRepositoryInterface;
use Evincemage\ReviewApi\Api\Data\ReviewInterface;
use Magento\Framework\Api\SearchCriteria;

/**
 * @inheritdoc
 */
class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * @var SaveInterface
     */
    private $commandSave;

    /**
     * @var GetInterface
     */
    private $commandGet;

    /**
     * @var GetListInterface
     */
    private $commandGetList;

    /**
     * @var DeleteByIdInterface
     */
    private $commandDeleteById;

    /**
     * ReviewRepository constructor.
     *
     * @param GetInterface $commandGet
     * @param SaveInterface $commandSave
     * @param GetListInterface $commandGetList
     * @param DeleteByIdInterface $commandDeleteById
     */
    public function __construct( SaveInterface $commandSave
      ) {
       
        $this->commandSave = $commandSave;
       
 
    }

    /**
     * @inheritdoc
     *
     * @param ReviewInterface $review
     *
     * @return ReviewInterface
     */
    public function save(ReviewInterface $review): ReviewInterface
    {
        return $this->commandSave->execute($review);
    }


}
