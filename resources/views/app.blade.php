@extends('layout')
@section('content')
<h1 class="text-3xl font-bold text-gray-50">Welcome to the dashboard!</h1>
<a href="{{ route('uzems.index') }}" class="text-amber-600 transition-colors underline hover:text-amber-500">Go to plants</a>
@endsection
