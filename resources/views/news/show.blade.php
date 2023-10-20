@extends('layouts.app')

@section('content')
    <div class="card card-compact w-96 bg-base-100 shadow-xl m-auto">
        <div class="card-header">
            <h2 class="card-title">{{ $data->title }}</h2>
        </div>
        <div class="card-body">
            <p>Slug : {{ $data->slug }}</p>
            <p>Category : {{ $data->category->name }}</p>
            <p>Author : {{ $data->user->name }}</p>
            <p>Created at : {{ $data->created_at->format('l, d F, Y H:i') }}</p>
            <p class="text-left">{{ $data->content }}</p>
            <div class="card-actions justify-end">
                <a href="{{ url('posts') }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-arrow-left"></i></a>
                <a href="{{ url('posts/' . $data->id . '/edit') }}" class="btn btn-sm btn-accent"><i
                        class="fa-regular fa-pen-to-square"></i></a>
                        <form style="display: inline" method="POST" action="{{ url('posts/'.$data->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="{{ url('posts/' . $data->id) }}" class="btn btn-sm btn-error"><i
                            class="fa-regular fa-trash-can"></i></button>
                          </form>
            </div>
        </div>
    </div>
@endsection
