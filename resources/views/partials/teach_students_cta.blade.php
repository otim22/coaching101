<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="d-flex">
                <div class="mr-4">
                    <svg class="bi bi-collection-play" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 011 13V6a.5.5 0 01.5-.5h13a.5.5 0 01.5.5v7a.5.5 0 01-.5.5zm-13 1A1.5 1.5 0 010 13V6a1.5 1.5 0 011.5-1.5h13A1.5 1.5 0 0116 6v7a1.5 1.5 0 01-1.5 1.5h-13zM2 3a.5.5 0 00.5.5h11a.5.5 0 000-1h-11A.5.5 0 002 3zm2-2a.5.5 0 00.5.5h7a.5.5 0 000-1h-7A.5.5 0 004 1z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M6.258 6.563a.5.5 0 01.507.013l4 2.5a.5.5 0 010 .848l-4 2.5A.5.5 0 016 12V7a.5.5 0 01.258-.437z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h4 class="bold">Teach students online</h4>
                    <p>Top teachers from best schools teaching millions of students on Coaching101.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            @guest
                <a id="round-button-2" href="{{ url('login') }}" class="btn btn-primary" name="button">Start teaching</a>
            @endguest

            @auth
                @if(auth()->user()->role == 1)
                    <a id="round-button-2" href="{{ route('subjects.starter') }}" class="btn btn-primary" name="button">Start teaching</a>
                @elseif(auth()->user()->role == 2)
                    <a id="round-button-2" href="{{ route('manage.subjects') }}" class="btn btn-primary" name="button">My Subjects</a>
                @else(auth()->user()->role == 3)
                    <a id="round-button-2" href="{{ route('manage.subjects') }}" class="btn btn-primary" name="button">My Subjects</a>
                @endif
            @endauth
        </div>
    </div>
</div>
