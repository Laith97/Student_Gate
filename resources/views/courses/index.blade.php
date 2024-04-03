<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
        }
        .header a {
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .logout {
            background-color: #dc3545;
            color: #fff;
        }
        .profile {
            background-color: #007bff;
            color: #fff;
        }
        .logout:hover, .profile:hover {
            opacity: 0.8;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .actions a, .actions button {
            margin-right: 10px;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .actions a.view, .actions button.view {
            background-color: #28a745;
            color: #fff;
        }
        .actions a.edit, .actions button.edit {
            background-color: #007bff;
            color: #fff;
        }
        .actions a.delete, .actions button.delete {
            background-color: #dc3545;
            color: #fff;
        }
        .actions a:hover, .actions button:hover {
            opacity: 0.8;
        }
        .create-course {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.create-course:hover {
    background-color: #0056b3;
}

h2{
    font-size: 25px !important;
    font-weight: bold !important;
    text-align: center;
}

.button-container {
        display: flex;
        align-items: center; /* Align items vertically */
    }

    .spacer {
        flex-grow: 1; /* Push the "Manage Students" button to the end */
    }
    </style>
</head>
<x-app-layout>
    <body>
        <div class="container">
            <h2>Courses</h2>
            <div class="button-container">
                <a href="{{ route('courses.create', ['student' => $student->id]) }}" class="btn btn-primary create-course">Add Course</a>
                <div class="spacer"></div> <!-- Add spacer for flexbox -->
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Students Records</a>
            </div>
            <br>
            @if (isset($courses) && $courses->isEmpty())
                <p>No courses found for this student.</p>
            @elseif(isset($courses))
                <table>
                    <thead>
                        <tr>
                            <th>Course Number</th>
                            <th>Course Name</th>
                            <th>Section</th>
                            <th>Actions</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->course_number }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->section }}</td>

                            <td class="actions">
                                <a href="{{ route('courses.edit', ['student' => $student->id, 'course' => $course->id]) }}" class="edit">Edit</a>
                                <form action="{{ route('courses.destroy', ['student' => $student->id, 'course' => $course->id]) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete">Delete</button>
                                </form>
                            </td>
                            <!-- Add more cells for additional columns -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No courses found for this student.</p>
            @endif
        </div>
    </body>
</x-app-layout>

</html>
