<?php

namespace App\Utilities\SubjectFilters;

use App\Utilities\QueryFilter;
use App\Utilities\FilterContract;

class Category extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->whereHas('categories', function ($q) use ($value) {
            return $q->where('name', $value);
        });
    }

    // to get App\Post::with('categories')->filterBy(request()->all())->get();
    // url http://some.url/search?category=some-tag
}
