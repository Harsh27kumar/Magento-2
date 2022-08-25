<?php

declare(strict_types=1);

namespace Evincemage\ReviewApi\Model;

use Evincemage\ReviewApi\Api\Data\ReviewInterface;
use Evincemage\ReviewApi\Validation\ValidationResult;

/**
 * Responsible for Review validation
 * Extension point for base validation
 *
 * @api
 */
interface ReviewValidatorInterface
{
    /**
     * Validate Review
     *
     * @param ReviewInterface $review
     *
     * @return ValidationResult
     */
    public function validate(ReviewInterface $review): ValidationResult;
}
