@extends('layouts.app')
@section('content')
@include('offers.nav')
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">offer name</th>
        <th scope="col">offer price</th>
        <th scope="col">details</th>
    </tr>
    </thead>
    <tbody>
    @foreach($offers as $offer)
    <tr>
        <th scope="row">{{$offer->id}}</th>
        <td>{{$offer->name}}</td>
        <td>{{$offer->price}}</td>
        <td>{{$offer->details}}</td>
        @endforeach
    </tr>
    </tbody>
</table>
@stop
