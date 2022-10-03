@extends('layouts.app')

@section('content')


<h1>id: {{ $tasklist->id }} のTask編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($tasklist, ['route' => ['tasklists.update', $tasklist->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'Task:') !!}
                    {!! Form::text('content', $tasklist->content, ['class' => 'form-control']) !!}
                    {!! Form::label('status', '状態:') !!}
                    {!! Form::select('status', ['未実行' => '未実行', '実行中' => '実行中', '完了' => '完了'], $tasklist->status, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    
@endsection