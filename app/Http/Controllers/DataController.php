<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $student = $user->student;

        $fullName = $student->full_name;
        $nameParts = explode(' ', $fullName);

        $firstName = $nameParts[0]; // First name
        $lastName = end($nameParts); // Last name

        $name = $firstName.' '. $lastName;
        

        $student->full_name_concatenated = $name;
        
        return view('dashboard', compact('students'));  
    
    }
}
