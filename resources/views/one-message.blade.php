@extends('layouts.app')

@section('title-block')
    Заявка
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Заявка #{{ $data->id }}</h1>
</div>

@include('inc.messages')


        <div class="alert alert-info">
        <h3>{{ $data->subject }}</h3>
            <p>{{ $data->message }}</p>
            <br>
            <p>{{ $data->name }}<br>{{ $data->email }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            <a href="{{ route('contact-update', $data->id) }}"><button class="btn btn-primary">Редактирование</button>
            <a href="{{ route('contact-delete', $data->id) }}"><button class="btn btn-danger">Удаление</button>
        </div>

@endsection

