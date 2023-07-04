@extends('layouts.app')

@section('content')
<div class="card card-body">
    <table class="table">
        <tr>
            <th>Kode Tiket</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->ticket_code }}</td>
                <td>{{ $dt->customer->name }}</td>
                <td>{{ $dt->customer->email }}</td>
                <td>{{ $dt->customer->phone }}</td>
                <td>{{ $dt->status }}</td>
                <td>
                    @if($dt->status === 'reserved')
                    <form action="{{ url('checkin/'.$dt->ticket_code) }}">
                        @csrf
                        <button type="submit" onclick="return confirm('Yakin ingin Check In?')" class="btn btn-success">Check In</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

</div>
@endsection
