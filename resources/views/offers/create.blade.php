@extends('layouts.app')
@section('content')
@include('offers.nav')
    <div class="container">
        <h1 class="align-middle"> {{__('offers.Add your offer')}}</h1>
        @if(Session::has('success'))
            <div class='alert alert-success'>
                {{Session::get('success')}}
            </div>
        @endif
        <form method="post" action="{{route('store')}}">
            @csrf
            <div class="form-group">
                <label for="name_ar">{{__('offers.offer name ar')}}</label>
                <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="Enter name">
                @error('name_ar')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="name_en">{{__('offers.offer name en')}}</label>
                <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter name">
                @error('name_en')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="price"> {{__('offers.offer price')}}</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="details_ar">{{__('offers.offer details ar')}}</label>
                <input type="text" class="form-control" name="details_ar" id="details_ar"  placeholder="Enter details">
                @error('details_ar')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="details_en">{{__('offers.offer details en')}}</label>
                <input type="text" class="form-control" name="details_en" id="details_en"  placeholder="Enter details">
                @error('details_en')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{__('offers.save offer')}}</button>
        </form>
    </div>
    @stop
