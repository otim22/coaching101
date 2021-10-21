<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class StudentQuiz extends Component
{
    use WithPagination;

    public $quiz;
    public $answers = [];
    public $quizAnswer = [];

    public function mount($quiz)
    {
        $this->quiz = $quiz;
    }

    public function render()
    {
        return view('livewire.student-quiz', $this->renderData());
    }

    protected function renderData()
    {
        return [
            'paginatedQuiz' => $this->quiz->quizQuestions->paginate(1)
        ];
    }

    public function QuizOptionClicked()
    {
        if(!empty($this->answers) && count($this->answers) < 2) {
            array_push($this->quizAnswer, $this->answers[0]);
        } else {
            if (empty($this->answers)) {
                return session()->flash('message', 'Please, remember to choose an answer.');
            }
            $newArr = array_splice($this->answers, 0, 1);
            array_push($this->quizAnswer, $newArr[0]);
        }
    }

    public function handleQuiz($quiz, $quizQuestion)
    {
        dd($this->quizAnswer);
        if (empty($this->answers)) {
            return session()->flash('message', 'Please, remember to choose an answer.');
        }
        $this->QuizOptionClicked();
        array_push($this->quizAnswer, strval($quiz));
        array_push($this->quizAnswer, strval($quizQuestion));
        dd($this->quizAnswer);
    }

    public function next()
    {
        $previous = Quiz::where('id', '<', $quizId)->max('id');
        dd('Next');
        $next = Quiz::where('id', '>', $quizId)->first();
        $paginatedQuiz->previousPageUrl();
    }

    public function previous($quizId)
    {
        $previous = Quiz::where('id', '<', $quizId)->max('id');
        dd(Quiz::all());
        $next = Quiz::where('id', '>', $quizId)->min('id');
    }
}
