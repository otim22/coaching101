<?php

namespace App\Traits;

use App\Constants\GlobalConstants;

trait FilterTrait
{
    public static function getItemContents($category, $level, $year, $term, $item = null)
    {
        $items = ['is_approved' => 1];

        if ($category && $category !== GlobalConstants::ALL_SUBJECTS) {
            $items['category_id'] = $category;
        }
        if ($level && $level !== GlobalConstants::ALL_LEVELS) {
            $items['level_id'] = $level;
        }
        if ($year && $year !== GlobalConstants::ALL_YEARS) {
            $items['year_id'] = $year;
        }
        if ($term && $term !== GlobalConstants::ALL_TERMS) {
            $items['term_id'] = $term;
        }
        if ($item && $item !== GlobalConstants::SUBJECT) {
            $items['item_id'] = $item;
        } else if($item && $item !== GlobalConstants::BOOK) {
            $items['item_id'] = $item;
        } else if($item && $item !== GlobalConstants::NOTE) {
            $items['item_id'] = $item;
        } else if($item && $item !== GlobalConstants::PASTPAPER) {
            $items['item_id'] = $item;
        }

        return static::where($items)->paginate(12);
    }
}
