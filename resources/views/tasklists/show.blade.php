@extends('layouts.app')

@section('content')


<h1 class="mb-4">{{ $user->name }}さんのTask詳細ページ</h1>

    <table class="table table-bordered w-75 mb-4 mx-auto">
        <tr>
            <th>id</th>
            <th>Task</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>{{ $tasklist->id }}</td>
            <td>{{ $tasklist->content }}</td>
            <td>{{ $tasklist->status }}</td>
        </tr>
        <tr>
        </tr>
    </table>
    
    <div class="d-flex w-75 mx-auto">
    {!! link_to_route('tasklists.edit', '編集', ['tasklist' => $tasklist->id], ['class' => 'btn btn-primary mx-4']) !!}
    
    {!! Form::model($tasklist, ['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger mx-4']) !!}
    {!! Form::close() !!}
    </div>
    

@endsection