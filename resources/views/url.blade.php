@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="card shadow-lg rounded">
            <div class="card-title fw-bold text-white bg-dark">
               <h4 class="ml-3">
                Your Image
               </h4>
            </div>
            <div class="card-body p-5 m-1 text-center">
                <img src="{{asset($img->file->path)}}" alt="" width="400" height="400">
            </div>
        </div>
    </div>

@endsection
