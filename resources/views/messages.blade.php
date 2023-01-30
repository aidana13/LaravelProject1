@extends('layouts.app')

@section('title-block')
    Все заявки
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Лента</h1>
</div>
@include('inc.messages')
    @foreach($data as $el)
        <div class="alert alert-info">
            <h3>{{ $el->subject }}</h3>
            <p>{{ $el->email }}</p>
            <p><small>{{ $el->created_at }}</small></p>
            <a href="{{ route('contact-data-one', $el->id) }}"><button class="btn btn-warning">Детальнее</button>
        </div>
    @endforeach
@endsection

