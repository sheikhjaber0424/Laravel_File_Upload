@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <form action="{{ route('public.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group mt-3">
                        <label for="priority">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                            id="title" value="{{ old('title') }}" placeholder="Title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>




                    <div class="form-group mt-3">
                        <label for="image">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                            id="image" placeholder="Image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary mt-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
