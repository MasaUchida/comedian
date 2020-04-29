<ul>
    @if(is_front_page())
        @if(is_active_sidebar('main-sidebar'))
            @php dynamic_sidebar('main-sidebar') @endphp
        @else
            <p>ウィジットがありません</p>
        @endif
    @elseif(is_singular('comedian')||is_singular('criticism'))
        @if(is_active_sidebar('single-sidebar'))
            @php dynamic_sidebar('single-sidebar') @endphp
        @else
            <p>ウィジットがありません</p>
        @endif
    @endif
</ul> 

