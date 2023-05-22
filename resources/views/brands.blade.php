@extends('master')
@section('title')
Shop by Brands - Industrial spares and products wholesaler in Noida
@endsection
@section('content')
<style>
    .card-body{
        background-color: #fbeaea;
    }
</style>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                @foreach ($brand_lists as $item)
                <div class="col-sm-3 mb-2">
                    <div class="card border shadow brand_card">
                        <a href="{{url('products/brand/').'/'.$item->brand_slug}}">
                            <img src="{{asset('uploads/brand').'/'.$item->brand_image}}" class="card-img-top" alt="{{$item->brand}}">
                        </a>
                        <div class="card-body text-center">
                            <a href="{{url('products/brand/').'/'.$item->brand_slug}}">
                                <h6 class="card-title m-0">{{$item->brand}}</h6>
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