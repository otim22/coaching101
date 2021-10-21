<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class RateTeacher extends Component
{
    use WithPagination;
    
    public $subject;
    public $user;
    public $rating;
    public $user_id;
    public $subject_id;

    protected $rules = [
        'rating' => 'required|integer'
    ];

    protected $listeners = [
        'refreshPage' => 'updateRatings'
    ];

    public function mount($subject)
    {
        $this->subject = $subject;
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.rate-teacher');
    }

    public function updateRatings()
    {
        $this->rating = '';
    }

    public function submit()
    {
        $this->subject->rateOnce($this->rating);

        session()->flash('message', 'Thanks for rating us.');

        $this->emit('refreshPage');
    }
}
