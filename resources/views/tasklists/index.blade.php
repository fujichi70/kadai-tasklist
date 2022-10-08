@extends('layouts.app')

@section('content')


<h1>Task一覧</h1>

<a href="{{ route('tasklists.create') }}" class="btn btn-primary">新規タスク追加</a>

@if (count($tasklists) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>task</th>
                <th>status</th>
            </tr>
        </thead>    
        <tbody>
            @foreach ($tasklists as $tasklist)
            <tr>
                <td>{!! link_to_route('tasklists.show', $tasklist->id, ['tasklist' => $tasklist->id]) !!}</td>
                <td>{{ $tasklist->content }}</td>
                <td>{{ $tasklist->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{-- ページネーションのリンク --}}
    {{ $tasklists->links() }}
    
@endif

@endsection