<ul  class="nested active">
    @foreach($childs as $child)
        <li  data-count=" {{ $child->id }}">
            {{-- <a href="#">  {{ $child->AccountName }} </a> --}}
            @if(count($child->childs))
            <span class="box" data-count="{{ $category->id }}"> {{ $child->AccountName }}</span>
            @else
            <span class="" data-count="{{ $category->id }}"> {{ $child->AccountName }}</span>
            @endif

            {{-- <span class="box" data-count="{{ $category->id }}"> {{ $child->AccountName }}</span> --}}
        @if(count($child->childs))
                @include('manageChild',['childs' => $child->childs])

        @else
        @endif


        
        </li>
    @endforeach
</ul>