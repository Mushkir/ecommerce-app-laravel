@extends('admin.default')
@section('title', 'Categories Page')

@section('main-content')
    <form class="input-group d-block w-25 p-5 mx-auto" method="POST" action="{{ url('/store') }}">
        @csrf

        <h3 class=" text-center mb-4"> Category Details </h3>

        <div class="input-group mb-3">
            <label class="form-label" id="category">Add category</label>
            <input type="text" class="form-control w-100" placeholder="Enter category name" id="category" name="category">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <button type="submit" class="btn btn-success">Add new category</button>
        </div>
    </form>
@endsection
