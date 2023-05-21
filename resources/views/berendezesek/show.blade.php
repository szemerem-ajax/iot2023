@extends('layout')
@section('content')
<h1 class="text-3xl font-semibold mb-2">{{ $machine->name }}</h1>

<h2 class="text-xl mb-2">Live data</h2>
<input type="hidden" id="data" value="{{ $machine->osszes() }}">
<div class="grid grid-cols-2 gap-2 mb-2">
    <div class="border-2 border-amber-400 bg-gray-50 p-2">
        <span class="text-gray-900">Electricity consumption</span>
        <canvas id="aram"></canvas>
    </div>
    <div class="border-2 border-amber-400 bg-gray-50 p-2">
        <span class="text-gray-900">Water consumption</span>
        <canvas id="viz"></canvas>
    </div>
</div>
<script>
    addEventListener("load", (event) => {
        const data = JSON.parse(document.querySelector('#data').value);

        const aram = data['kWh'];
        if (aram)
            drawLineChart('aram', aram.map(d => d.veg.slice(-8)), aram.map(d => d.ertek), 'kWh');

        const viz = data['l/h'];
        if (viz)
            drawLineChart('viz', viz.map(d => d.veg.slice(-8)), viz.map(d => d.ertek), 'l/h');
    })

    function navigate(id) {
        location.href = '/berendezesek/' + id;
    }
</script>

@if (count($machine->meresek) > 0)
<h2 class="text-xl mb-2">Measurements</h2>
<table>
    <thead>
        <th>Start</th>
        <th>End</th>
        <th>Amount</th>
        <th>Unit</th>
    </thead>
    <tbody>
        @foreach ($machine->meresek as $meres)
            <tr>
                <td>{{ $meres->kezdes }}</td>
                <td>{{ $meres->veg }}</td>
                <td>{{ $meres->ertek }}</td>
                <td>{{ $meres->egyseg }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif

@if (count($machine->gyerekek) > 0)
    <h2 class="text-xl my-2">Sub-machines</h2>
    <div class="flex gap-2">
        @foreach ($machine->gyerekek as $child)
            <div class="card h-[60px] grid place-items-center" onclick="navigate({{ $child->id }})">
                <h3 class="text-lg font-semibold">{{ $child->name }}</h3>
            </div>
        @endforeach
    </div>
@endif

@endsection
