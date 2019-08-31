<ul>
	<li>Связь с нами:</li>
    @foreach($items as $menu_item)        
        <li><a href="{{ $menu_item->link() }}"><i class="{{ $menu_item->title }}"></i></a></li>
    @endforeach
</ul>
