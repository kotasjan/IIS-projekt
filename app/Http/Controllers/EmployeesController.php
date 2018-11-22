<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO dodelat autentizaci pro admina

        $employees = DB::table('employees')->leftjoin('users', 'employees.id', '=', 'users.id')->paginate(10);

        return view('employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Employee::create(request()->validate([
            'id' => ['required', 'string', 'max:255'],
        ]));

        $employees = DB::table('employees')->leftjoin('users', 'employees.id', '=', 'users.id')->paginate(10);

        return view('employees.employees', compact('employees'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Employee $employee)
    {
        $this->authorize('view', $employee);

        $employee = DB::table('employees')
            ->leftJoin('users', 'employees.id', '=', 'users.id')->where('employees.id', '=', $employee->id)
            ->get();

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Employee $employee)
    {
        $this->authorize('update', $employee);

        $employee = DB::table('employees')
            ->leftJoin('users', 'employees.id', '=', 'users.id')->where('employees.id', '=', $employee->id)
            ->get();

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Employee $employee
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Employee $employee)
    {
        $this->authorize('update', $employee);

        $user = User::find($employee->id);

        $user->update(
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:15'],
                'dateOfBirth' => ['required', 'date'],
                'address' => ['required', 'string', 'max:255'],
                'bankAccountNumber' => ['required', 'string', 'max:255'],
            ])
        );

        $employee = DB::table('employees')
            ->leftJoin('users', 'employees.id', '=', 'users.id')->where('employees.id', '=', $employee->id)
            ->get();

        return view('employees.show', compact('employee'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);

        $employee->delete();

        return redirect('/employees');
    }
}
