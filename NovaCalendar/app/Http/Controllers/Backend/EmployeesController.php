<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{

    public function show(){
        return view('backend.page.employees.create');
    }

    public function create(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $date = $request->input('date');
        $gender = $request->input('gender');
        $position = $request->input('position');
        $depart_id = $request->input('depart_id');
        Employees::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'date' => $date,
            'gender' => $gender,
            'position' => $position,
            'depart_id' => $depart_id
        ]);
        return view('backend.page.employees.createAcount');
    }

    // tat ca nhan su
    public function EmployeesList(){
        $data = Employees::all();
        return $data;
    }

    // nhan su theo cac phong ban
    public function EmployeesByDept_ID($id){
        $data = Employees::where('depart_id',$id)->get();
        return view('backend.page.employees.index')->with('EmployeesByDept_ID',$data);
    }

}
