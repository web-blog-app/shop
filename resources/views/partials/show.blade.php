<ul style="display: block;">
  @foreach($categories as $category)
  <li>
    <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
    {{$category->name}}
    </a>
    @if($category->sub->count())
      @include('partials.show', ['categories' => $category->sub])
    @endif      
  </li>
    @endforeach
</ul>