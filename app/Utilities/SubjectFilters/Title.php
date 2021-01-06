<?php

namespace App\Utilities\SubjectFilters;

use App\Utilities\FilterContract;

class Title implements FilterContract
{
    public function handle($value): void
    {
        $this->query->where('title', $value);
    }
}
