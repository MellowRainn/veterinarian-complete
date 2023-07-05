@extends('common.master')

@section('content')
    <h1 class="title">Edit Foo {{ $foo->id }}</h1>
    <form action="{{ route('foos.update', $foo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input style="margin-bottom: 5px" type="text" name="name" value="{{ $foo->name }}"
               placeholder="Enter your name here."><br>
        @error('name')
        <div class="has-text-danger">{{ $message }}</div>
        @enderror
        <input type="number" name="thud" value="{{ $foo->thud }}" placeholder="Enter thud" min="0"><br>
        @error('thud')
        <div class="has-text-danger">{{ $message }}</div>
        @enderror
        @if($foo->wombat === 1)
            <input checked type="radio" name="wombat" value="1"> true <input type="radio" name="wombat" value="0"> false
            <br>
        @else
            <input type="radio" name="wombat" value="1"> true <input checked type="radio" name="wombat" value="0"> false
            <br>
        @endif
        @error('wombat')
        <div class="has-text-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Submit</button>
    </form><br>
    <form action="{{ route('foos.destroy', $foo) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="button is-primary is-danger">Delete Foo</button>
    </form>
@endsection

