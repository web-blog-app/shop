@extends('layouts.layout')

@section('title', 'Search Results')


@section('content')

 <span class="go-back-button">Назад</span>
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="search-results-container container">
        <h1>Результаты поиска</h1>
        <p class="search-results-count">{{ $products->total() }} результат(ы) для '{{ request()->input('query') }}'</p>

        @if ($products->total() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Назвавние</th>
                    <th>Подробности</th>                    
                    <th class="search-price">Цена</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>  <td>{{ $product->image
                     }}             </td>  
                        <th><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></th>
                        <td>{{ $product->details }}</td>                        
                        <td class="search-price">{{ $product->presentPrice() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->appends(request()->input())->links() }}
        @endif
    </div> <!-- end search-results-container -->

@endsection

