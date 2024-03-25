<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{     
    public function show()
    {
        return view('details');
    }

    public function update(Request $request)
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the associated student record
        $student = $user->student;

        $request->validate([
            'known1' => 'required|string|max:255',
            'phone_number_known1' => 'required|string|max:20',
            'known2' => 'nullable|string|max:255',
            'phone_number_known2' => 'nullable|string|max:20',
            'place_address' => 'required|string|in:Amman,Irbid,Aqaba,Zarqa,Other',
            'place_give' => 'required|string|in:yes,no',
            'level_educational_dad' => 'required|string|in:High School,College,Bachelor,Master,Doctor',
            'level_educational_mom' => 'required|string|in:High School,College,Bachelor,Master,Doctor',
            'full_name_english' => 'required|string|max:255',
            'birthday_place_en' => 'required|string|max:255',
            'jordan_phone_number' => 'required|string|max:20',
            'second_phone_number' => 'nullable|string|max:20',
            'phone_number_earth' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:20',
        ]);
        


        $student->update($request->all());
        if ($student->user) {
            $student->user->update([
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                // Add other user fields here
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student details updated successfully');
    }
}
