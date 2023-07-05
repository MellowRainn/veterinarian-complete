@extends('common.master')

@section('content')
    <h1 class="title">Foo {{ $foo->id }}</h1>

    <div class="content">
        <p>Name: {{ $foo->name }}</p>
        <p>Thud: {{ $foo->thud }}</p>
        @if ($foo->wombat === 1)
            <p>Wombat: True</p>
        @else
            <p>Wombat: False</p>
        @endif
        <p>Created at: {{ $foo->created_at }}</p>
        <p>Edited at: {{ $foo->updated_at }}</p>
        <a href="{{ route('foos.edit', $foo) }}" class="button is-primary">Edit Foo</a>
    </div>
@endsection
