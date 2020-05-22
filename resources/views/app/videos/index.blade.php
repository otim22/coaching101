@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="35%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <h5 class="card-title">Course title</h5>
                        <p class="card-text">Progress<br>
                        Class curriculum<br>
                        Author</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <h4>Class curriculum</h4>
                <div class="card mt-4">
                    <div class="card-header">
                        content
                    </div>
                    <div class="card-body">
                        <ul>
                            <li class="mb-2 ml-3"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"> With supporting text below as a natural lead-in to additional content. <button type="button" class="btn btn-primary btn-sm" name="button">Start</button></li>
                            <li class="mb-2 ml-3"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"> With supporting text below as a natural lead-in to additional content. <button type="button" class="btn btn-primary btn-sm" name="button">Start</button></li>
                            <li class="ml-3"><input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"> With supporting text below as a natural lead-in to additional content. <button type="button" class="btn btn-primary btn-sm" name="button">Start</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
