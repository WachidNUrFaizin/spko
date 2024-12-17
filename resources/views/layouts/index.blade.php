@extends('layouts.app')

@section('content')
    <h1>List SPKO</h1>

    <a href="{{ route('layouts.create') }}" class="btn btn-primary">Create New SPKO</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID SPKO</th>
            <th>SW</th>
            <th>Employee</th>
            <th>Trans Date</th>
            <th>Process</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($spkos as $spko)
            <tr>
                <td>{{ $spko->id_spko }}</td>
                <td>{{ $spko->sw }}</td>
                <td>{{ $spko->employeeRelation->nama }}</td>
                <td>{{ $spko->trans_date }}</td>
                <td>{{ $spko->process }}</td>
                <td>
                    <a href="{{ route('layouts.edit', $spko->id_spko) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('layouts.destroy', $spko->id_spko) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                    <a href="{{ route('layouts.print', $spko->id_spko) }}" class="btn btn-sm btn-info" target="_blank">Print</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
