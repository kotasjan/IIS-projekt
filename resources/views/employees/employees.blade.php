@extends('layouts.app')

@section('title', 'Employees')

@section('headline', 'Employees')

@section('content')

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>ID</b></th>
            <th><b>Name</b></th>
            <th><b>Surname</b></th>
            <th><b>Email</b></th>
            <th><b>Bank Account</b></th>
            <th><b>Details</b></th>
        </tr>
        </thead>

        <tbody>
        @foreach($employees as $employee)

            <tr>

                <td>
                    {{ $employee->id }}
                </td>
                <td>
                    {{ $employee->name }}
                </td>
                <td>
                    {{ $employee->surname }}
                </td>
                <td>
                    {{ $employee->email }}
                </td>
                <td>
                    {{ $employee->bankAccountNumber }}
                </td>
                <td>
                    <a href="/employees/{{ $employee->id }}">Link</a>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

    {{ $employees->links() }}

@endsection