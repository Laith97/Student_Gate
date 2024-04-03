<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            <h3>الصفحة الرئيسية
            </h3>
            <button class="toggle-button" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-7">
                <div class="student-details" style="height: 405px; overflow-y: auto; direction: rtl;">
                    <div class="row">
                        <div class="col-md-12 student-info">
                            <h5>بيانات الطالب</h5>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>اسم الطالب</label>
                                </div>
                                <div class="col-md-8">
                                    <label>{{ auth()->user()->student->full_name }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>الكلية / التخصص</label>
                                </div>
                                <div class="col-md-8">
                                    <label>{{ auth()->user()->student->college }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>رقم الدفع (فواتيركم)</label>
                                </div>
                                <div class="col-md-8">
                                    <label>{{ auth()->user()->student->payment_number }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>البريد الإلكتروني</label>
                                </div>
                                <div class="col-md-8">
                                    <label>{{ auth()->user()->email }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>ملاحظات</label>
                                </div>
                                <div class="col-md-8">
                                    <label>{{ auth()->user()->student->comments }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


</body>
</html>
