@extends('master')
@section('title')
    Categories List - Veer & Co
@endsection
@section('content')
<style>
    .card-body{
        background-color: #fde5e5;
    }
    .card-img-top{
        height: 220px;
    }
</style>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                @foreach ($category_lists as $item)
                <div class="col-sm-3 mb-2">
                    <div class="card border shadow">
                        <a href="{{url('products/category/').'/'.$item->category_slug}}">
                            <img src="{{asset('uploads/category').'/'.$item->category_image}}" title="{{$item->category}}" class="card-img-top" alt="{{$item->category}}">
                        </a>
                        <div class="card-body text-center">
                            <a href="{{url('products/category/').'/'.$item->category_slug}}">
                                <h6 class="card-title m-0" title="{{$item->category}}">{{$item->category}}</h6>
                            </a>
                        </div>
                    </div>   
                </div>             
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection