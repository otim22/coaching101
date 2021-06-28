@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Survey questions</h4></div>
                            <div>
                              <a type="button" href="{{ route('admin.surveyQuestions.create') }}" class="btn btn-primary pt-1" name="button">Create question</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Question</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($surveyQuestions as $key => $surveyQuestion)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ route('admin.surveyQuestions.show', $surveyQuestion) }}" style="text-decoration: none;">{{ $surveyQuestion->question }}</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No available questions</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
