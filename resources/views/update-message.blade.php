@extends('layouts.app')

@section('title-block')
    Редактирование заявки
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Заявка #{{ $data->id }}</h1>
</div>
    <h2>Редактирование заявки</h2>

    <form action="{{ route('contact-update-submit', $data->id) }}" method="post">
    @csrf
    
    <div class="form-group">
            <label for="name">Введите имя</label>
            <input type="text" name="name" value="{{$data->name}}" placeholder="Введите имя" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{$data->email}}" placeholder="Введите email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Тема сообщения</label>
            <input type="text" name="subject" value="{{$data->subject}}" placeholder="Тема сообщения" id="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea name="message" placeholder="Введите сообщение" id="message" class="form-control">{{$data->message}}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection