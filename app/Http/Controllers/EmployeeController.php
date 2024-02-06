<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::leftJoin('positions', 'positions.id', '=', 'users.position')
            ->leftJoin('positions as second_position', 'second_position.id', '=', 'users.second_position')
            ->select('users.*', 'positions.position_name','second_position.position_name as second_position')
            ->get();

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formTitle = "Tambah Karyawan";
        $position = Position::orderBy('position_name')->get();

        return view('employees.create', [
            'formTitle' => $formTitle,
            'positions' => $position,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = (object) $request->all();

        if($payload->position == 'create') {
            $newPosition = Position::create([
                'position_name' => $payload->new_position
            ]);

            $payload->position = $newPosition->id;
        }

        if($payload->second_position) {
            if($payload->second_position == 0) {
                $newPosition = Position::create([
                    'position_name' => $payload->new_position
                ]);
    
                $payload->second_position = $newPosition->id;
            }
        }
        User::create([
            'username'      => $payload->username,
            'name'          => $payload->name,
            'position'      => $payload->position,
            'second_position' => $payload->second_position,
            'unit'          => $payload->unit,
            'email'         => $payload->email,
            'password'      => Hash::make($payload->input_password),
            'date_joined'   => $payload->date_joined,
        ]);

        return redirect()->route('employees.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::find($id);
        $formTitle = "Ubah Karyawan";
        $position = Position::orderBy('position_name')->get();

        return view('employees.create', [
            'employee'  => $employee,
            'formTitle' => $formTitle,
            'positions' => $position,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payload = (object) $request->all();

        $employee = User::find($id);

        if($payload->position == 'create') {
            $newPosition = Position::create([
                'position_name' => $payload->new_position
            ]);

            $payload->position = $newPosition->id;
        }

        if($payload->second_position) {
            if($payload->second_position == 0) {
                $newPosition = Position::create([
                    'position_name' => $payload->new_position
                ]);
    
                $payload->second_position = $newPosition->id;
            }
        }
        
        $employee->update([
            'name'          => $payload->name,
            'username'      => $payload->username,
            'unit'          => $payload->unit,
            'position'      => $payload->position,
            'second_position' => $payload->second_position,
            'date_joined'   => $payload->date_joined,
            'password'      => $payload->input_password ?? $employee->password
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back();
    }
}
