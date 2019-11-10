  
    @foreach($items as $menu_item)
        <li>  

            <a href="{{ asset($menu_item->url) }}">                
                {{$menu_item->title}}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach

