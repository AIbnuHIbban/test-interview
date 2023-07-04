@extends('layouts.app')

@section('content')
<div class="card card-body">
    <table class="table">
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Venue</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->name }}</td>
                <td>{{ $dt->date }}</td>
                <td>{{ $dt->time_start }} - {{ $dt->time_end }}</td>
                <td>{{ $dt->venue }}</td>
                <td></td>
            </tr>
        @endforeach
    </table>

</div>
@endsection
