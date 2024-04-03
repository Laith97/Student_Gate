<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Student $student)
    {
        $courses = $student->courses;
        return view('courses.index', ['courses' => $courses,'student'=>$student]);
    }
    

    /**
     * Show the form for creating a new resource.
     */

     public function getSemesters(Request $request)
     {
         // Validate the incoming request data
         $request->validate([
             'academic_year' => 'required|string',
             'semester' => 'required|string',
         ]);
     
         // Retrieve the academic year and semester from the request
         $academicYear = $request->input('academic_year');
         $semester = $request->input('semester');
     
         // Fetch all courses based on the academic year and semester
         $courses = Course::where('academic_year', $academicYear)
                          ->where('semester', $semester)
                          ->get(); // Fetch all relevant courses
     
         // Extract course data into separate arrays
         $courseNumbers = $courses->pluck('course_number')->toArray();
         $courseNames = $courses->pluck('course_name')->toArray();
         $hoursNumbers = $courses->pluck('hours_number')->toArray();
         $finalMarks = $courses->pluck('final_mark')->toArray();
     
         // Prepare the response data containing both semesters and course data
         $responseData = [
             'academic_year' => $academicYear,
             'semester' => $semester,
             'course_numbers' => $courseNumbers,
             'course_names' => $courseNames,
             'hours_numbers' => $hoursNumbers,
             'final_marks' => $finalMarks,
         ];
         return response()->json($responseData);
     }
     
     

    public function create($studentId)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }
        
        // Retrieve the student with the given ID
        $student = Student::findOrFail($studentId);
    
        return view('courses.create', ['student' => $student]);    
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'course_number' => 'required|string',
            'course_name' => 'required|string',
            'section' => 'required|string',
            'course_status' => 'required|string',
            'marks' => 'required|integer',
            'final_mark' => 'nullable|string', // You may adjust the validation rules for final_mark based on your requirements
            'hours_number' => 'nullable|integer', // You may adjust the validation rules for hours_number based on your requirements
            'academic_year' => 'nullable|string',
            'semester' => 'nullable|string',
        ]);
        // Create a new course instance
        $course = new Course([
            'course_number' => $request->course_number,
            'course_name' => $request->course_name,
            'section' => $request->section,
            'course_status' => $request->course_status,
            'marks' => $request->marks,
            'final_mark' => $request->final_mark,
            'hours_number' => $request->hours_number,
            'student_id' => $request->id,
            'academic_year' => $request->academic_year,
            'semester' => $request->semester,
        ]);    
        // Save the course to the database
        $course->save();
        // Optionally, you can return a response to indicate success or redirect to another page
        return redirect()->route('courses.index', ['student' => $request->id])->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, Course $course)
    {
        // Pass the student and course objects to the edit view
        return view('courses.edit', compact('student', 'course'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student, Course $course)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'course_number' => 'required|string',
            'course_name' => 'required|string',
            'section' => 'required|string',
            'course_status' => 'required|string',
            'marks' => 'required|integer',
            'final_mark' => 'nullable|string', // You may adjust the validation rules for final_mark based on your requirements
            'hours_number' => 'nullable|integer', // You may adjust the validation rules for hours_number based on your requirements
            'academic_year' => 'nullable|string',
            'semester' => 'nullable|string',
    
        ]);
    
        // Update the course with the validated data
        $course->update($validatedData);
    
        // Optionally, you can redirect the user to a specific page after updating
        return redirect()->route('courses.index', ['student' => $student->id])
                         ->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, Course $course)
    {
        // Delete the course
        $course->delete();
    
        // Optionally, you can redirect the user to a specific page after deletion
        return redirect()->route('courses.index', ['student' => $student->id])
                         ->with('success', 'Course deleted successfully');
    }
    
}
