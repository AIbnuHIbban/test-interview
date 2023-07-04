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
            </tr>
        @endforeach
    </table>

</div>
@endsection
