<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap">
    <title>Edit Student</title>
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
        <h2>Edit Student</h2>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"> اسم المستخدم</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->user->name }}" required>
            </div>
            <div class="form-group">
                <label for="full_name">اسم المستخدم كاملا</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $student->full_name }}" required>
            </div>
            <div class="form-group">
                <label for="password">الرمز السري</label>
                <input type="text" class="form-control" id="college" name="college" value="{{ $student->college }}" required>
            </div>
            <div class="form-group">
                <label for="payment_number">رقم الدفع (فواتيركم)</label>
                <input type="text" class="form-control" id="payment_number" name="payment_number" value="{{ $student->payment_number }}" required>
            </div>
            <div class="form-group">
                <label for="email">البريد اﻹلكتروني</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
            </div>

            <div class="form-group">
                <label for="comments">الملاحظات</label>
                <textarea name="comments" id="comments" class="form-control" rows="3">{{ $student->comments }}</textarea>
            </div>
            <!-- Add more fields as needed -->
           <!-- <div class="form-group">
                <label for="datebirth">تاريخ الميلاد</label>
                <input type="date" class="form-control" id="datebirth" name="datebirth" value="{{ $student->datebirth }}">
            </div>-->
            <div class="form-group">
                <label for="full_name_english">الاسم باللغة الإنجليزية</label>
                <input type="text" class="form-control" id="full_name_english" name="full_name_english" value="{{ $student->full_name_english }}">
            </div>
            <div class="form-group">
                <label for="birth_city"> مكان /عام الولادة</label>
                <input type="text" class="form-control" id="birth_city" name="birth_city" value="{{ $student->birth_city }}">
            </div>
            <div class="form-group">
                <label for="address">العنوان الدائم</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}">
            </div>
            <div class="form-group">
                <label for="jordan_phone_number">الهاتف الخلوي من داخل الأردن</label>
                <input type="text" class="form-control" id="jordan_phone_number" name="jordan_phone_number" value="{{ $student->jordan_phone_number }}">
            </div>
            <div class="form-group">
                <label for="second_phone_number">الهاتف الخلوي2</label>
                <input type="text" class="form-control" id="second_phone_number" name="second_phone_number" value="{{ $student->second_phone_number }}">
            </div>
            <div class="form-group">
                <label for="birthday_place_en">مكان الولادة باللغة الإنجليزية</label>
                <input type="text" class="form-control" id="birthday_place_en" name="birthday_place_en" value="{{ $student->birthday_place_en }}">
            </div>
            <div class="form-group">
                <label for="phone_number_earth">رقم الهاتف الأرضي</label>
                <input type="text" class="form-control" id="phone_number_earth" name="phone_number_earth" value="{{ $student->phone_number_earth }}">
            </div>
            <div class="form-group">
                <label for="known1">معرف 1</label>
                <input type="text" class="form-control" id="known1" name="known1" value="{{ $student->known1 }}">
            </div>
            <div class="form-group">
                <label for="phone_number_known1">رقم هاتف المعرف 1</label>
                <input type="text" class="form-control" id="phone_number_known1" name="phone_number_known1" value="{{ $student->phone_number_known1 }}">
            </div>
            <div class="form-group">
                <label for="known2">معرف 2</label>
                <input type="text" class="form-control" id="known2" name="known2" value="{{ $student->known2 }}">
            </div>
            <div class="form-group">
                <label for="phone_number_known2">رقم هاتف المعرف 2</label>
                <input type="text" class="form-control" id="phone_number_known2" name="phone_number_known2" value="{{ $student->phone_number_known2 }}">
            </div>
            <div class="form-group">
                <label for="place_address">مكان السكن</label>
                <select name="place_address" id="place_address" class="form-control">
                    <option value="">---</option>
                    <option value="Amman" {{ $student->place_address === 'Amman' ? 'selected' : '' }}>العاصمة</option>
                    <option value="Irbid" {{ $student->place_address === 'Irbid' ? 'selected' : '' }}>اربد</option>
                    <option value="Aqaba" {{ $student->place_address === 'Aqaba' ? 'selected' : '' }}>العقبة</option>
                    <option value="Zarqa" {{ $student->place_address === 'Zarqa' ? 'selected' : '' }}>الزرقاء</option>
                    <option value="Other" {{ $student->place_address === 'Other' ? 'selected' : '' }}>غيرهم</option>
                </select>
            </div>
            <div class="form-group">
                <label for="place_give">هل ترغب باعطاء عنوانك للجهات الباحثة عن موظفين؟</label>
                <select name="place_give" id="place_give" class="form-control">
                    <option value="">---</option>
                    <option value="yes" {{ $student->place_give === 'yes' ? 'selected' : '' }}>نعم</option>
                    <option value="no" {{ $student->place_give === 'no' ? 'selected' : '' }}>لا</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="level_educational_dad">المستوى الدراسي للأب</label>
                <select name="level_educational_dad" id="level_educational_dad" class="form-control">
                    <option value="">---</option>
                    <option value="High School" {{ $student->level_educational_dad === 'High School' ? 'selected' : '' }}>توجيهي</option>
                    <option value="College" {{ $student->level_educational_dad === 'College' ? 'selected' : '' }}>دبلوم</option>
                    <option value="Bachelor" {{ $student->level_educational_dad === 'Bachelor' ? 'selected' : '' }}>بكالوريوس</option>
                    <option value="Master" {{ $student->level_educational_dad === 'Master' ? 'selected' : '' }}>ماجستير</option>
                    <option value="Doctor" {{ $student->level_educational_dad === 'Doctor' ? 'selected' : '' }}>دكتوراه</option>
                </select>
            </div>
            <div class="form-group">
                <label for="level_educational_mom">المستوى الدراسي للأم</label>
                <select name="level_educational_mom" id="level_educational_mom" class="form-control">
                    <option value="">---</option>
                    <option value="High School" {{ $student->level_educational_mom === 'High School' ? 'selected' : '' }}>توجيهي</option>
                    <option value="College" {{ $student->level_educational_mom === 'College' ? 'selected' : '' }}>دبلوم</option>
                    <option value="Bachelor" {{ $student->level_educational_mom === 'Bachelor' ? 'selected' : '' }}>بكالوريوس</option>
                    <option value="Master" {{ $student->level_educational_mom === 'Master' ? 'selected' : '' }}>ماجستير</option>
                    <option value="Doctor" {{ $student->level_educational_mom === 'Doctor' ? 'selected' : '' }}>دكتوراه</option>
                </select>
            </div>
        <!--    <div class="form-group">
                <label for="full_address">Full Address</label>
                <input type="text" class="form-control" id="full_address" name="full_address" value="{{ $student->full_address }}">
            </div>-->
            <button type="submit">حفظ</button>
        </form>
    </div>
</body>
</html>
