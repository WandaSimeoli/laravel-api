@extends('layouts.app')

@section('page-title', 'Technologies')

@section('main-content')
<div class="container-sm">
<a href="" class="btn btn-primary mb-2">Add</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        @foreach ($technologies as $technology)
        <td>{{ $technology->id}}</td>
        <td>{{ $technology->title}}</td>
        <td> {{ $technology->slug}}</td>
        <td> <a href="{{ route('admin.technologies.show',['technology'=>$technology->id])}}"  class="btn btn-info m-2">Look</a>
        <a href=""  class="btn btn-warning m-2">Modify</a>
    </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection