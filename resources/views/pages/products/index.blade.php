@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            محصولات
        </div>
        <div class="card-body">
            @if(!$products['success'])
                <div class="alert alert-warning">
                    {{ $products['message'] }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>عکس</th>
                        <th>عنوان</th>
                        <th>تنوع</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($products['success'])
                        @foreach($products['data'] as $product)
                            <tr>
                                <td>{{ $product['id'] }}</td>
                                <td>
                                    <img src="{{ $product['thumbnail_url'] }}" width="70" alt="">
                                </td>
                                <td>
                                    {{ $product['name'] }}
                                </td>
                                <td>
                                    <ul>
                                    @foreach($product['prices'] as $price)
                                        <li>{{ number_format($price['price']) }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
