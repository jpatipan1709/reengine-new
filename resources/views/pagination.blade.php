{{-- <ul class="page-pagination text-center mt-40">
    <li><span class="page-numbers current">1</span></li>
    <li><a class="page-numbers" href="#">2</a></li>
    <li><a class="page-numbers" href="#">3</a></li>
    <li><a class="next page-numbers" href="#">หน้าถัดไป<i class="icon-chevron-right"></i></a>
    </li>
</ul> --}}
@if ($paginator->hasPages())
    <ul class="page-pagination text-center mt-40">
       
        @if ($paginator->onFirstPage())
        <li > <a class="disabled next page-numbers"><i class="icon-chevron-left"></i> ก่อนหน้า</a></li>
        @else
            {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li> --}}
            <li><a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="icon-chevron-left"></i> ก่อนหน้า</a>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-numbers active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
        <li><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">หน้าถัดไป<i class="icon-chevron-right"></i></a>
            {{-- <li><a href="" rel="next">Next →</a></li> --}}
        @else 
            <li > <a class="disabled next page-numbers">หน้าถัดไป<i class="icon-chevron-right"></i></a></li>
            {{-- <li class="disabled"><span>Next →</span></li> --}}
        @endif
    </ul>
@endif 