@extends('admin.default')
@section('title', 'Edit category page')
@section('main-content')

    <form action="" class="input-group d-block w-50 p-5 mx-auto" method="POST">
        @csrf
        <h3 class=" text-center mb-4"> Edit category detail </h3>

        <div class="input-group mb-3">
            <label class="form-label" for="category">Name</label>
            <input type="text" class="form-control w-100" id="category" value="{{ $categories->category_name }}"
                name="category">
        </div>

        <button class="btn btn-success">Save changes</button>
    </form>

@endsection
