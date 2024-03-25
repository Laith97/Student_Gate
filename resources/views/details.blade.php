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
<!-- Add necessary CSS here -->
<style>

    /* Styles for the header */
 
</style>

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

            <h3>بيانات الطالب الشخصية
            </h3>
            <button class="toggle-button" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        </div>
    </div>

    <form action="{{ route('update_student_details') }}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="student-details" style="height: 450px; overflow-y: auto; direction: rtl;">
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>المعرف 1</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="known1" value="{{ auth()->user()->student->known1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>رقم هاتف المعرف 1</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="phone_number_known1" value="{{ auth()->user()->student->phone_number_known1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>معرف 2</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="known2" value="{{ auth()->user()->student->known2 }}">

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>رقم هاتف المعرف 2</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="phone_number_known2" value="{{ auth()->user()->student->phone_number_known2 }}">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>مكان السكن</label>
                            </div>
                            <div class="col-md-7">
                                <select class="form-control" name="place_address">
                                    <option value="Amman" {{ auth()->user()->student->place_address == "Amman" ? 'selected' : '' }}>العاصمة</option>
                                    <option value="Irbid" {{ auth()->user()->student->place_address == "Irbid" ? 'selected' : '' }}>اربد</option>
                                    <option value="Aqaba" {{ auth()->user()->student->place_address == "Aqaba" ? 'selected' : '' }}>العقبة</option>
                                    <option value="Zarqa" {{ auth()->user()->student->place_address == "Zarqa" ? 'selected' : '' }}>الزرقاء</option>
                                    <option value="Other" {{ auth()->user()->student->place_address == "Other" ? 'selected' : '' }}>غيرهم</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>هل ترغب باعطاء عنوانك للجهات الباحثة عن موظفين؟</label>
                            </div>
                            <div class="col-md-7">
                                <select class="form-control" name="place_give">
                                    <option value="yes" {{ auth()->user()->student->place_give == "yes" ? 'selected' : '' }}>نعم</option>
                                    <option value="no" {{ auth()->user()->student->place_give == "no" ? 'selected' : '' }}>لا</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>مستوى التعليم للأب</label>
                            </div>
                            <div class="col-md-7">
                                <select class="form-control" name="level_educational_dad">
                                    <option value="High School" {{ auth()->user()->student->level_educational_dad == "High School" ? 'selected' : '' }}>توجيهي</option>
                                    <option value="College" {{ auth()->user()->student->level_educational_dad == "College" ? 'selected' : '' }}>دبلوم</option>
                                    <option value="Bachelor" {{ auth()->user()->student->level_educational_dad == "Bachelor" ? 'selected' : '' }}>بكالوريوس</option>
                                    <option value="Master" {{ auth()->user()->student->level_educational_dad == "Master" ? 'selected' : '' }}>ماجستير</option>
                                    <option value="Doctor" {{ auth()->user()->student->level_educational_dad == "Doctor" ? 'selected' : '' }}>دكتوراه</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 student-info">
                        <div class="row">
                            <div class="col-md-5">
                                <label>مستوى التعليم للأم</label>
                            </div>
                            <div class="col-md-7">
                                <select class="form-control" name="level_educational_mom">
                                    <option value="High School" {{ auth()->user()->student->level_educational_mom == "High School" ? 'selected' : '' }}>توجيهي</option>
                                    <option value="College" {{ auth()->user()->student->level_educational_mom == "College" ? 'selected' : '' }}>دبلوم</option>
                                    <option value="Bachelor" {{ auth()->user()->student->level_educational_mom == "Bachelor" ? 'selected' : '' }}>بكالوريوس</option>
                                    <option value="Master" {{ auth()->user()->student->level_educational_mom == "Master" ? 'selected' : '' }}>ماجستير</option>
                                    <option value="Doctor" {{ auth()->user()->student->level_educational_mom == "Doctor" ? 'selected' : '' }}>دكتوراه</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br>
            <div class="col-md-6">
                <div class="student-details" style="height: 450px; overflow-y: auto; direction: rtl;">
                    <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>اسم الطالب</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ auth()->user()->student->full_name }}</label>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>مكان / عام الولادة</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ auth()->user()->student->birth_city }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>اﻹسم باللغة اﻹنجليزية </label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="full_name_english" value="{{ auth()->user()->student->full_name_english }}">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>مكان الولادة باللغة اﻹنجليزية </label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="birthday_place_en" value="{{ auth()->user()->student->birthday_place_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>العنوان الدائم</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="address" value="{{ auth()->user()->student->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>  الهاتف الخلوي من داخل الأردن
                                    </label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="jordan_phone_number" value="{{ auth()->user()->student->jordan_phone_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>  الهاتف الخلوي 2
                                    </label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="second_phone_number" value="{{ auth()->user()->student->second_phone_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>رقم الهاتف الأرضي</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="phone_number_earth" value="{{ auth()->user()->student->phone_number_earth }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 student-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>البريد الإلكتروني</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="email" value="{{ auth()->user()->student->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="student-details">
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    <span class="ui-button-icon-left ui-icon ui-c pi pi-save">
                    حفظ
                    </span>
                </button>
            </div>
        </div>
        </div>
    </div>

</body>
</html>