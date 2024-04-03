<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap">
    <title>Create Student</title>
    <style>
        body {
            font-family: 'Noto Kufi Arabic', serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            direction: rtl;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Course</h2>
        <form action="{{ route('courses.store', ['student' => $student->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="course_number">رقم المادة</label>
                <input type="text" class="form-control" id="course_number" name="course_number" required>
            </div>
            <div class="form-group">
                <label for="course_name">اسم المادة</label>
                <input type="text" class="form-control" id="course_name" name="course_name" required>
            </div>
            <div class="form-group">
                <label for="section">الشعبة</label>
                <input type="text" class="form-control" id="section" name="section" required>
            </div>
            <div class="form-group">
                <label for="course_status">حالة المادة</label>
                <input type="text" class="form-control" id="course_status" name="course_status" required>
            </div>
            <div class="form-group">
                <label for="marks">العلامة الفصلية</label>
                <input type="text" class="form-control" id="marks" name="marks" required>
            </div>
            <div class="form-group">
                <label for="final_mark"> العلامة النهائية</label>
                <input type="text" class="form-control" id="final_mark" name="final_mark" required>
            </div>
            <div class="form-group">
                <label for="hours_number">عدد الساعات</label>
                <input type="text" class="form-control" id="hours_number" name="hours_number" required>
            </div>

            <div class="form-group">
                <label for="academic_year">السنة الدراسية</label>
                <select class="form-control" id="academic_year" name="academic_year" required>
                    @php
                        // Get the current year
                        $currentYear = date('Y');
                        // Generate options for the last 10 years
                        for ($i = $currentYear; $i > $currentYear - 10; $i--) {
                            $nextYear = $i + 1;
                            echo "<option value=\"$i-$nextYear\">$i-$nextYear</option>";
                        }
                    @endphp
                </select>
            </div>
            
            <div class="form-group">
                <label for="semester">الفصل الدراسي</label>
                <select class="form-control" id="semester" name="semester" required>
                </select>
            </div>
            
            <input type="hidden" name="id" value="{{ $student->id }}">

            <!-- Add more fields as needed -->
        
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        

    </div>

    <script>
        document.getElementById('academic_year').addEventListener('change', function() {
            var academicYear = this.value;
            var semesterSelect = document.getElementById('semester');
            semesterSelect.innerHTML = ''; // Clear existing options
            
            // Define semester options based on the selected academic year
            var semesterOptions = ['الفصل الأول', 'الفصل الصيفي', 'الفصل الثاني'];
            semesterOptions.forEach(function(semester) {
                var option = document.createElement('option');
                option.value = semester + ' ' + academicYear;
                option.textContent = semester + ' ' + academicYear;
                semesterSelect.appendChild(option);
            });
        });
    </script>
</body>

</html>