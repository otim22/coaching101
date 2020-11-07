@extends('admin.layouts.master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 mt-5 pt-5">
                <div class="card admin-shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Nav Items</h4>
                            </div>
                            <div>
                                <a type="button" href="{{ route('admin.menus.create') }}" class="btn btn-primary pt-1" name="button">Create Menu</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($menus as $menu)
                           <li class="mb-3">
                               <h4 class="mb-2"> <a href="{{ route('admin.menus.show', $menu) }}"> {{ $menu->title }}</a></h4>
                               @if(count($menu->allChildren))
                                   @include('admin.menus.manageChild', ['childs' => $menu->allChildren])
                               @endif
                           </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
