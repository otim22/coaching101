<ul>
    @foreach($childs as $child)
       <li>
           <p class="mb-2"> <a href="{{ route('admin.menus.edit', $child) }}"> {{ $child->title }}</a></p>
           @if(count($child->allChildren))
                @include('admin.menus.manageChild', ['childs' => $child->allChildren])
            @endif
       </li>
    @endforeach
</ul>
