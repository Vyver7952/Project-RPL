@extends('layouts.main')

@section('container')
<h1>Selamat Datang, {{ auth()->user()->name }}</h1>
@endsection
