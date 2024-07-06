<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;

class StaffController extends Controller
{
    public function index()
    {
        return view('staffs');
    }

    public function getStaffs(Request $request)
    {
        $searchTerm = $request->input('search');
        
        $staffs = User::with('department', 'designation')
                     ->where(function ($query) use ($searchTerm) {
                         $query->where('users.name', 'like', '%'.$searchTerm.'%')
                               ->orWhereHas('department', function ($query) use ($searchTerm) {
                                   $query->where('name', 'like', '%'.$searchTerm.'%');
                               })
                               ->orWhereHas('designation', function ($query) use ($searchTerm) {
                                   $query->where('name', 'like', '%'.$searchTerm.'%');
                               });
                     })
                     ->orderBy('id', 'asc')
                     ->get();

        return response()->json($staffs);
    }
}
