@extends('common.master')

@section('content')
    <h1 class="title">Create new Foo</h1>

    <form action="{{ route('foos.store') }}" method="POST">
        @csrf
        <input style="margin-bottom: 5px" type="text" name="name" placeholder="Enter your name here."><br>
        @error('name')
        <div class="has-text-danger">{{ $message }}</div>
        @enderror
        <input type="number" name="thud" placeholder="Enter thud" min="0"><br>
        @error('thud')
        <div class="has-text-danger">{{ $message }}</div>
        @enderror
        <input type="radio" name="wombat" value="1"> true <input checked type="radio" name="wombat" value="0"> false<br>
        @error('wombat')
        <div class="has-text-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Submit</button>
    </form>
@endsection
