@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><h4>Survey</h4></div>
                            <div>
                              <a type="button" href="{{ route('admin.surveys.create') }}" class="btn btn-primary pt-1" name="button">Create survey</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($surveys as $key => $survey)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>
                                        <a href="{{ route('admin.surveys.show', $survey) }}" style="text-decoration: none;">{{ $survey->title }}</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No available surveys</td>
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
