@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@endif
    <div class="text-center place-content-center">
        @foreach ($posts as $item)
            <div class="card card-compact w-96 bg-base-100 shadow-xl m-2 inline-block">
                <div class="card-header">
                    <h2 class="card-title">{{ $item->title }}</h2>
                </div>
                <div class="card-body">
                    <p class="inline">Author : {{ $item->user->name }}</p>
                    <p class="text-left">{{ $item->content }}</p>
                    <div class="card-actions justify-end">
                        <a href="{{ url('posts/' . $item->id) }}" class="btn btn-sm btn-primary"><i
                                class="fa-solid fa-eye"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
