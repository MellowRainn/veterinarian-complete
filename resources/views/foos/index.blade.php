@extends('common.master')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Foos</p>
            </div>
        </div>
    </section><br>
    <a href="/foos/create" class="button is-primary">Add new foo</a>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Thud</td>
            <td>Wombat</td>
        </tr>
        @foreach($foos as $foo)
            <tr>
                <td>
                    <a href="{{ route('foos.show', $foo) }}">
                        {{ $foo->id }}
                    </a>
                </td>
                <td>{{ $foo->name }}</td>
                <td>{{ $foo->thud }}</td>
                @if ($foo->wombat === 1)
                    <td>True</td>
                @else
                    <td>False</td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
