<div>
    <h1>Projekt: {{ $record->name }}</h1>
    <br/>

    <ul>
        @foreach ($record->periodsByYearAndMonth($yearAndMonth) as $period)
            <li>Datum: {{ date('j F, Y', strtotime($period->date)) }} mit {{ $period->getPeriodFromDb($period->minutes) }} </li>
        @endforeach
    </ul>

    <br/>
    <p>Summe: {{$record->getSummary($yearAndMonth)}} Maschinenstundenformat</p>
</div>

