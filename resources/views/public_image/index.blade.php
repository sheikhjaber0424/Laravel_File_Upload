@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="{{ route('public.create') }}"><button class="btn btn-primary mt-3">Add Data</button></a>
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
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td> <img src="{{ $item->image }}" width="80px" height="60px" alt=""> </td>
                            <td> <a href="{{ route('public.edit', $item) }}"><button
                                        class="btn btn-primary">Edit</button></a>

                                <form method="POST" class="d-inline-block" action="{{ route('public.delete', $item) }}">
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
