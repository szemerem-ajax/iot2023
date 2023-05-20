@extends('layout')
@section('content')
<h1 class="text-3xl font-semibold mb-2">{{ $plant->name }}</h1>

<h2 class="text-xl mb-2">Live data</h2>
<input type="hidden" id="data" value="{{ $plant->osszes() }}">
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
        drawLineChart('aram', aram.map(d => d.veg.slice(-8)), aram.map(d => d.ertek), 'kWh')

        const viz = data['l/h']
        drawLineChart('viz', viz.map(d => d.veg.slice(-8)), viz.map(d => d.ertek), 'l/h')
    })

    function navigate(id) {
        location.href = '/berendezesek/' + id;
    }
</script>

<h2 class="text-xl mb-2">Machines</h2>
<ul class="flex flex-wrap gap-2">
    @foreach ($plant->machines as $machine)
        @if ($machine->szulo !== null)
            @continue
        @endif
        <li>
            <div class="card" onclick="navigate({{ $machine->id }})">
                <h3 class="text-lg font-semibold">{{ $machine->name }}</h3>
                <h4 class="text-md">Latest measurements:</h4>
                <ul class="custom-list">
                    @foreach ($machine->legutobbi() as $meres)
                        <li>{{ $meres[0]->veg }}: <span class="text-sm font-mono">{{ $meres[0]->ertek }}</span> <span class="italic">{{ $meres[0]->egyseg}}</span></li>
                    @endforeach
                </ul>
            </div>
        </li>
    @endforeach
</ul>
@endsection
