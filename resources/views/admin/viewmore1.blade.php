@extends('layouts.admin')

@section('content')
      

       <style>
        .images img{
            height: 20%;
            width: 20%;
        }
       </style>


       <h2>{{  $locationImage->title }}</h2>
       <p>{{   $locationImage->description }}</p>

       <div class="images">
       <p> <img src="{{asset( 'storage/assets/images/'.$locationImage->places)}}" /> </p>

       <p> <img src="{{asset( 'storage/assets/images/'.$locationImage->activities)}}" /> </p>

       <p> <img src="{{asset( 'storage/assets/images/'.$locationImage->hotels)}}" /> </p>

       <p> <img src="{{asset( 'storage/assets/images/'.$locationImage->restaurants)}}" /> </p>
       </div>
      

@endsection