<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Rating;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RateTeacher extends Component
{
    use WithPagination;

    public $subject;
    public $user;
    public $rating;
    public $comment;
    public $user_id;
    public $subject_id;

    protected $rules = [
        'rating' => 'required|integer',
        'comment' => 'required|string'
    ];

    protected $listeners = [
        'refreshPage' => 'updateRatings',
        'loadMore' => 'moreRatings'
    ];

    public function mount($subject)
    {
        $this->subject = $subject;
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.rate-teacher', [
            // 'studentRatings' => Rating::orderBy('id', 'desc')->where('subject_id', $this->subject->id)->paginate(6)
        ]);
    }

    public function updateRatings()
    {
        $this->studentRatings = Rating::orderBy('id', 'desc')->where('subject_id', $this->subject->id)->paginate(6);
    }

    public function submit()
    {
        $this->subject->rateOnce($this->rating);
        // dd($this->subject->ratings);
        dd($this->subject->timesRated());

        // $this->validate();

        // $ratedSubject = Rating::where('subject_id', $this->subject->id)
                                                        // ->where('user_id', Auth::id())->first();
        // if (isset($ratedSubject->subject_id)) {
        //     $this->rating = "";
        //     $this->comment = "";
        //
        //     return redirect()->back()->with('message', 'You have already rated!');
        // } else {
        //     Rating::create([
        //         'rating' => $this->rating,
        //         'comment' => $this->comment,
        //         'user_id' => $this->user->id,
        //         'subject_id' => $this->subject->id
        //     ]);
        //
        //     $this->rating = "";
        //     $this->comment = "";
        //
        //     session()->flash('message', 'Thanks for rating us.');
        // }

        // $this->emit('refreshPage');
    }
}
