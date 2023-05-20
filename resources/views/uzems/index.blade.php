@extends('layout')
@section('content')
@if (count($plants) === 0)
    No plants!
@else
    <h1 class="text-3xl font-bold">Plants</h1>
    <div class="flex mt-2 gap-2">
        @foreach ($plants as $plant)
            <div class="card h-[60px] grid place-items-center">
                <a class="text-2xl font-semibold text-amber-400" href="{{ route('uzems.show', $plant->id) }}">{{ $plant->name }}</a>
            </div>
        @endforeach
    </div>
@endif
@endsection
