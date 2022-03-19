@extends('layouts.master')

@section('content')
    <div class="pull-right">
        <a class="btn btn-success" href="/users/create"> Create</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
    @php
        $number = 1;
    @endphp
    @forelse($users['data'] as $user)
    <tr>
        <td>{{ $number++ }}</td>
        <td>{{ $user['firstName'] }}</td>
        <td>{{ $user['lastName'] }}</td>
        <td align="center">
        <form action="/users/{{ $user['id'] }}" method="POST">
                    <a href="/users/{{ $user['id'] }}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    @csrf
                    @method('DELETE')  
                    <button type="submit" class="btn btn-danger" onclick="confirm('Yakin Menghapus?')">
                        <i class="bi bi-trash"></i></button>
        </form>
        </td>

    </tr>
    @empty
        <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
    @endforelse
    </tbody>
<table>
</div>
@endsection	