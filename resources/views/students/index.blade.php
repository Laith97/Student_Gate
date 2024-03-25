
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .create-user {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.create-user:hover {
    background-color: #0056b3;
}

h2{
    font-size: 25px !important;
    font-weight: bold !important;
    text-align: center;
}

    </style>
</head>
<x-app-layout>
    <body>
        <div class="container">
            <h2>Students Records</h2>
            <div>
                <a href="{{ route('students.create') }}" class="btn btn-primary create-user">Create User</a>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>College</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->college }}</td>
                        <td>{{ $student->email }}</td>
                        <td class="actions">
                            <a href="{{ route('students.show', $student->id) }}" class="view">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="edit">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    </x-app-layout>

</html>
