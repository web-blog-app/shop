
<form action="{{ route('search') }}" method="GET" class="search">
    <i class="fa fa-search search-icon"></i>
    <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Искать товар" required>
</form>
