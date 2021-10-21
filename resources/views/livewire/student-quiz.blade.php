<div>
    <div class="card p-2">
        <div class="card-body">
            <div>
                <h5 class="bold">{{ $quiz->title }}</h5>
            </div>
            <hr>
            <div>
                @foreach($paginatedQuiz as $quizQuestion)
                    @php $iterationKey = 1; @endphp
                    @foreach($quiz->quizQuestions as $quizQtn)
                        <button type="button" id="round-button-3"
                                    class="btn mt-2 @if($quizQtn < $quizQuestion) btn-primary
                                                @elseif($quizQtn == $quizQuestion) btn-outline-primary @elseif($quizQtn < $quizQuestion && empty($answers)) btn-secondary @else btn-light @endif">
                            {{ $iterationKey }}
                        </button>
                        @php $iterationKey++; @endphp
                    @endforeach
                    <div><br /></div>
                    <div class="form-group mb-4">
                        <label class="mb-3 bold" for="option">{{ $quizQuestion->quiz_question }}</label>
                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                        @foreach($quizQuestion->options as $quizOptions)
                            <div class="mb-2 form-check custom-check options">
                                <input type="checkbox"  name="answers[]" value="{{ $quizOptions->id }}"
                                            class="form-check-input mt-2" id="{{ $quizOptions->id }}">
                                <label class="form-check-label" for="{{ $quizOptions->id }}">{{ $quizOptions->option }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @if($paginatedQuiz->currentPage() !== $paginatedQuiz->total())
                    <div class="d-flex justify-content-between">
                        <a id="round-button-2" href="{{ $paginatedQuiz->previousPageUrl() }}" type="button" class="btn btn-secondary next-question mt-3 @if ($paginatedQuiz->onFirstPage()) disabled ?? '' @endif">
                            Previous
                        </a>
                        <a id="round-button-2" href="{{ $paginatedQuiz->nextPageUrl() }}" type="button" wire:click="handleQuiz({{ $quiz->id }}, {{$quizQuestion->id}})"
                            class="btn btn-primary next-question mt-3">
                            Next
                        </a>
                    </div>
                @else
                    <div class="d-flex justify-content-between">
                        <a id="round-button-2" href="{{ $paginatedQuiz->previousPageUrl() }}" type="button" class="btn btn-secondary next-question mt-3">
                            Previous
                        </a>
                        <button id="round-button-2" wire:click="handleQuiz({{ $quiz->id }}, {{$quizQuestion->id}})" class="btn submit-questions btn-primary mt-3">
                            Submit
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            const optionsClicked = [];

            /** handle checkbox **/
            $(".options input:checkbox").on('click', function() {
                // in the handler, 'this' refers to the box clicked on
                let $box = $(this);
                if ($box.is(":checked")) {
                    // the name of the box is retrieved using the .attr() method
                    // as it is assumed and expected to be immutable
                    let group = "input:checkbox[name='" + $box.attr("name") + "']";
                    // the checked state of the group/box on the other hand will change
                    // and the current value is retrieved using .prop() method
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                    @this.quizAnswer = optionsClicked;
                    hiddenCorrectAnswer = $(this).attr("data-correct");
                } else {
                    $box.prop("checked", false);
                }
                if (optionsClicked.includes($box.val()) === false) optionsClicked.push($box.val());
            });
            /** handle checkbox **/
        })
    </script>
@endpush
