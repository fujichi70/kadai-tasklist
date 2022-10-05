@extends('layouts.app')

@section('content')


<h1>id = {{ $tasklist->id }} のTask詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>I+id</th>
            <td>{{ $tasklist->id }}</td>
        </tr>
        <tr>
            <th>Task</th>
            <td>{{ $tasklist->content }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $tasklist->status }}</td>
        </tr>
    </table>
    
    {!! link_to_route('tasklists.edit', '編集', ['tasklist' => $tasklist->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::model($tasklist, ['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection