<?php

declare(strict_types=1);

namespace App\Api\V1\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class PaginatorDto
{
    public const CURRENT_PAGE = 1;
    public const PAGE_SIZE = 5;

    public function __construct(
        #[Assert\Type('integer')]
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(10_000)]
        public readonly int $currentPage = self::CURRENT_PAGE,

        #[Assert\Type('integer')]
        #[Assert\GreaterThanOrEqual(5)]
        #[Assert\LessThanOrEqual(100)]
        public readonly int $pageSize = self::PAGE_SIZE,
    ) {
    }
}
