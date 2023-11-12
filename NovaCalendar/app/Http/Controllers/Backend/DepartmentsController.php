<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function DepartmentsList(){
        $data = departments::all();
        return $data;
    }
}
