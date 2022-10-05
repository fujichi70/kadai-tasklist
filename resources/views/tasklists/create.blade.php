@extends('layouts.app')

@section('content')


<h1>新規作成</h1>

   <div class="row">
        <div class="col-6">
            {!! Form::model($tasklist, ['route' => 'tasklists.store']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'Task:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    {!! Form::select('status', ['未実行' => '未実行', '実行中' => '実行中', '完了' => '完了'], null, ['class' => 'form-select',  'placeholder' => '選択してください']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    
@endsection