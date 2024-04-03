<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        return view('students.create');    
    }

        
    public function store(Request $request)
    {
    // Validate the incoming request data
    $request->validate([
        'full_name' => 'required|string|max:255',
        'college' => 'required|string|max:255',
        'payment_number' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email|unique:users,email',
        'datebirth' => 'nullable|date',
        'full_name_english' => 'nullable|string|max:255',
        'birth_city' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'jordan_phone_number' => 'nullable|string|max:255',
        'second_phone_number' => 'nullable|string|max:255',
        'level_educational_dad' => 'nullable|string|max:255',
        'level_educational_mom' => 'nullable|string|max:255',
        'full_address' => 'nullable|string|max:255',
        'birthday_place_en' => 'nullable|string|max:255',
        'phone_number_earth' => 'nullable|string|max:255',
        'known1' => 'nullable|string|max:255',
        'phone_number_known1' => 'nullable|string|max:255',
        'known2' => 'nullable|string|max:255',
        'phone_number_known2' => 'nullable|string|max:255',
        'place_address' => 'nullable|in:Amman,Irbid,Aqaba,Zarqa,Other',
        'place_give' => 'nullable|in:yes,no',
        // Add validation for additional fields as needed
    ]);
    

    // Create a new user record
    $user = User::create([
        'name' => $request->input('name'), // Assuming name is the user's name and is sent in the request
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')), // Adjust as needed
    ]);

    // Create a new student record associated with the user
    $student = new Student($request->all());
    $student->user_id = $user->id;
    $student->save();

    // Redirect back with a success message
    return redirect()->route('students.index')->with('success', 'Student created successfully');
}


    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $student->load('user');
        return view('students.edit', compact('student'));
    }
    
public function update(Request $request, Student $student)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'college' => 'required|string|max:255',
        'payment_number' => 'required|string|max:255',
        'email' => 'required|email',
        'datebirth' => 'nullable|date',
        'full_name_english' => 'nullable|string|max:255',
        'birth_city' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'jordan_phone_number' => 'nullable|string|max:255',
        'second_phone_number' => 'nullable|string|max:255',
        'level_educational_dad' => 'nullable|string|max:255',
        'level_educational_mom' => 'nullable|string|max:255',
        'full_address' => 'nullable|string|max:255',
        'birthday_place_en' => 'nullable|string|max:255',
        'phone_number_earth' => 'nullable|string|max:255',
        'known1' => 'nullable|string|max:255',
        'phone_number_known1' => 'nullable|string|max:255',
        'known2' => 'nullable|string|max:255',
        'phone_number_known2' => 'nullable|string|max:255',
        'place_address' => 'nullable|in:Amman,Irbid,Aqaba,Zarqa,Other',
        'place_give' => 'nullable|in:yes,no',
        // Add validation for additional fields as needed
    ]);

    $student->update($request->all());

    // Update student fields
  /*  $student->update($request->only([
        'full_name',
        'college',
        'payment_number',
        'email',
        'comments',
        'datebirth',
        'full_name_english',
        'birth_city',
        'address',
        'jordan_phone_number',
        'second_phone_number',
        'level_educational_dad',
        'level_educational_mom',
        'full_address',
        // Add other student fields here
    ]));
    
*/
    // Update user fields
    if ($student->user) {
        $student->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Add other user fields here
        ]);
    }

    return redirect()->route('students.index')->with('success', 'Student updated successfully');
}


    public function destroy(Student $student)
    {
        // Find the corresponding user with the same email as the student

        $user = User::where('email', $student->email)->first();

        // Check if the user exists and then delete it
        if ($user) {
            $user->delete();
        }
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
