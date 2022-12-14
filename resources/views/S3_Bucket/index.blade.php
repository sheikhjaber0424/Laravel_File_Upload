@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="{{ route('s3.create') }}"><button class="btn btn-primary mt-3">Add Data</button></a>
        <div class="mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($s3_items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td> <img src="{{ $item->image }}" width="80px" height="60px" alt=""> </td>
                            <td> <a href="{{ route('s3.edit', $item) }}"><button class="btn btn-primary">Edit</button></a>

                                <form method="POST" class="d-inline-block" action="{{ route('s3.delete', $item) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
