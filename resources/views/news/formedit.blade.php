@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ url('posts/' . $data->id) }}">
        @csrf
        @method('PUT')
        <div class="form-control">
            <label class="label">
                <span class="label-text" for="txttitle">Title</span>
            </label>
            <input type="text" id="txttitle" name="txttitle" placeholder="title" value="{{ $data->title }}"
                class="input input-bordered @error('txttitle') is-invalid @enderror" autofocus/>
            @error('txttitle')
                <div class="alert alert-danger text-error"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label" for="txtcategory">
                <span class="label-text">Category</span>
            </label>
            <select class="select select-bordered @error('txtcategory') is-invalid @enderror" id="txtcategory"
                name="txtcategory">
                <option selected>Pick Category</option>
                @foreach ($category as $option)
                    <option value="{{ $option->id }}" {{ $option->id == $data->category_id ? 'selected' : '' }}>
                        {{ $option->name }}</option>
                @endforeach
            </select>
            @error('txtcategory')
                <div class="alert alert-danger text-error"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label" for="txtuser">
                <span class="label-text">Author</span>
            </label>
            <select class="select select-bordered @error('txtuser') is-invalid @enderror" id="txtuser" name="txtuser">
                <option selected>Pick Author</option>
                @foreach ($user as $option)
                    <option value="{{ $option->id }}" {{ $option->id == $data->user_id ? 'selected' : '' }}>
                        {{ $option->name }}</option>
                @endforeach
            </select>
            @error('txtuser')
                <div class="alert alert-danger text-error"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text" for="txtslug">Slug</span>
            </label>
            <input type="text" id="txtslug" name="txtslug" placeholder="title" value="{{ $data->slug }}"
                class="input input-bordered @error('txtslug') is-invalid @enderror" />
            @error('txtslug')
                <div class="alert alert-danger text-error"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label" for="txtcontent">
                <span class="label-text">Content</span>
            </label>
            <textarea class="textarea textarea-bordered h-24 @error('txtcontent') is-invalid @enderror" placeholder="content"
                id="txtcontent" name="txtcontent">{{ $data->content }}</textarea>
            @error('txtcontent')
                <div class="alert alert-danger text-error"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                </div>
            @enderror
        </div>
        <div class="card-actions justify-end mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
