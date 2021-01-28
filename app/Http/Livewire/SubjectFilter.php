<?php

namespace App\Http\Livewire;

use App\Models\Year;
use App\Models\Term;
use Livewire\Component;
use App\Models\Subject;
use App\Models\Category;
use Livewire\WithPagination;

class SubjectFilter extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $objects;
    public $category;
    public $year;
    public $filter = [
        "category_id" => ""
    ];

    public function updatedCategory($category)
    {
        $this->loadList($category);
    }

    public function updatedYear($year)
    {
        $newArray = [];

        foreach ($this->objects as $object) {
            if($object->year_id == $year) {
                array_push($newArray, $object);
            }
        }

        dd($newArray);

        $this->objects = $newArray;
    }

    public function mount()
    {
        $this->loadList($category='1');
    }

    public function loadList($category)
    {
        $query = [];
        $this->filter["category_id"] = $category;

        if(!empty($this->filter["category_id"])) {
            $query["category_id"] = $this->filter["category_id"];
        }

        $this->objects = Subject::where($query)->get();
    }

    public function render()
    {
        return view('livewire.subject-filter', [
            'categories' => Category::get(),
            'years' => Year::get(),
            'terms' => Term::get()
        ]);
    }
}
