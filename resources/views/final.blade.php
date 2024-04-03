<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<title>Sidebar Menu</title>
<!-- PrimeIcons CSS -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/primeicons/5.0.0/primeicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">

</head>
<body>

@include('sidebar')

<div class="content">
    <!-- Your main content here -->
    <div class="header">
        <div class="header-content">
            <div class="header-buttons">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button" title="خروج"><i class="pi pi-sign-out"></i></button>
                </form>
                                <button class="edit-button" title="تغيير كلمة السر"><i class="pi pi-pencil"></i></button>
                 <div class="st_name">{{ auth()->user()->student->full_name }}</div>
                            </div>

            <h3>نتائج الطالب النهائية 
            </h3>
            <button class="toggle-button" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        </div>
    </div>


<div class="container-fluid">
<div class="row">
    <div class="col-md-12" id="filter">
        <div class="row" style="direction: rtl; text-align:right;">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="academic_year">السنة الدراسية </label>
                    <select class="form-control" id="academic_year" name="academic_year" required>
                        <option value="---">---</option>
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
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="semester">الفصل الدراسي</label>
                    <select class="form-control" id="semester" name="semester" required>
                        <option value="---">---</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
                
    <div class="col-md-12" style="line-height: 30px; margin-bottom:50px">
        <table id="course-table" class="table table-striped" style="text-align: right; direction:rtl">
            <thead>
                <tr>
                    <th>رقم المادة</th>
                    <th>اسم المادة</th>
                    <th>عدد الساعات</th>
                    <th>العلامات</th>
                </tr>
            </thead>
            <tbody>
               <!-- @foreach(auth()->user()->student->courses as $course)
                <tr>
                    <td>{{ $course->course_number }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->hours_number }}</td>
                    <td>{{ $course->final_mark }}</td>
                </tr>
                @endforeach-->
            </tbody>
        </table>
    </div>

    <div class="col-md-12" id="filter" style="bottom: 0">
        <div class="row" style="direction: rtl; text-align:right;">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="semester_hours">الساعات الفصلية</label>
                    <input type="text" value="{{$course->student->semester_hours}}" readonly style="background-color: #f4f4f4; border: none;">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="semester_average">المعدل الفصلي</label>
                    <input type="text" value="{{$course->student->semester_average}}" readonly style="background-color: #f4f4f4; border: none;">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="semester_average">الساعات التراكمية</label>
                    <input type="text" value="{{$course->student->cumulative_hours}}" readonly style="background-color: #f4f4f4; border: none;">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cumulative_average">المعدل التراكمي</label>
                    <input type="text" value="{{$course->student->cumulative_average}}" readonly style="background-color: #f4f4f4; border: none;">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="sm_success">س.م. بنجاح</label>
                    <input type="text" value="{{$course->student->sm_success}}" readonly style="background-color: #f4f4f4; border: none;">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="indicator">مؤشر الفصل</label>
                    <input type="text" value="{{$course->student->indicator}}" readonly style="background-color: #f4f4f4; border: none;">
                </div>
            </div>
        </div>
    </div>
    

</div>

    </div>
    
</div>


<script>
    $(document).ready(function() {
        $('#academic_year,#semester').change(function() {
            var academicYear = $('#academic_year').val();
            var selectedSemester = $('#semester').val();
            var url = "{{ route('get.semesters') }}";
            $.ajax({
            url: url,
            method: 'GET',
            data: { academic_year: academicYear, semester: selectedSemester },
            success: function(response) {
                console.log(response); // Check the response in the browser console

                // Clear existing table rows
        $('#course-table tbody').empty();

        // Append courses to the table
        for (var i = 0; i < response.course_numbers.length; i++) {
    $('#course-table tbody').append('<tr>' +
        '<td>' + response.course_numbers[i] + '</td>' +
        '<td>' + response.course_names[i] + '</td>' +
        '<td>' + response.hours_numbers[i] + '</td>' +
        '<td>' + response.final_marks[i] + '</td>' +
        '</tr>');
    }
    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});

        });
    });
    document.getElementById('academic_year').addEventListener('change', function() {
        var academicYear = this.value;
        var semesterSelect = document.getElementById('semester');
        semesterSelect.innerHTML = ''; // Clear existing options
        
        // Define semester options based on the selected academic year
        var semesterOptions = ['الفصل الأول', 'الفصل الصيفي', 'الفصل الثاني'];
        // Add an empty option initially
        var emptyOption = document.createElement('option');
        emptyOption.value = '';
        emptyOption.textContent = '---';
        semesterSelect.appendChild(emptyOption);

        // Populate the rest of the options
        for (var i = 0; i < semesterOptions.length; i++) {
            var option = document.createElement('option');
            option.value = semesterOptions[i] + ' ' + academicYear;
            option.textContent = semesterOptions[i] + ' ' + academicYear;
            semesterSelect.appendChild(option);
        }

    });
</script>
</body>

</html>