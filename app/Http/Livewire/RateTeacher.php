<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RateTeacher extends Component
{
    public $subject;
    public $teacher;

    public function mount($subject)
    {
        $this->subject = $subject;
        // $this->teacher = $teacher;
    }

    public function render()
    {
        return view('livewire.rate-teacher');
    }

    public function rateTeacher()
    {
        $validatedData = $this->validate(['rate' => 'required']);
        $teacher = $this->subject->creator;

        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = 4;
        $rating->user_id = Auth::id();

        $teacher->ratings()->save($rating);

        // return redirect()->route("students.show");

        dd($this->subject->creator->id);
        $this->teacher = $this->subject->creator;
        $this->teacher->rate(5);

    }
}
