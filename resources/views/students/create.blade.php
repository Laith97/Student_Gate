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
        <h2>Create Student</h2>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name"> اسم المستخدم</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="full_name">اسم المستخدم كاملا</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="password">الرمز السري</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="college">الكلية / التخصص</label>
                <input type="text" class="form-control" id="college" name="college" required>
            </div>
            <div class="form-group">
                <label for="payment_number">رقم الدفع (فواتيركم)</label>
                <input type="text" class="form-control" id="payment_number" name="payment_number" required>
            </div>
            <div class="form-group">
                <label for="email">البريد اﻹلكتروني</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="comments">الملاحظات</label>
                <textarea name="comments" id="comments" class="form-control" rows="3"></textarea>
            </div>
            <!-- Add more fields as needed -->
           <!-- <div class="form-group">
                <label for="datebirth">تاريخ الميلاد</label>
                <input type="date" class="form-control" id="datebirth" name="datebirth">
            </div>-->
            <div class="form-group">
                <label for="full_name_english">الاسم باللغة الإنجليزية</label>
                <input type="text" class="form-control" id="full_name_english" name="full_name_english">
            </div>
            <div class="form-group">
                <label for="birth_city"> مكان /عام الولادة</label>
                <input type="text" class="form-control" id="birth_city" name="birth_city">
            </div>
            <div class="form-group">
                <label for="address">العنوان الدائم</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="jordan_phone_number">الهاتف الخلوي من داخل الأردن</label>
                <input type="text" class="form-control" id="jordan_phone_number" name="jordan_phone_number">
            </div>
            <div class="form-group">
                <label for="second_phone_number">الهاتف الخلوي2</label>
                <input type="text" class="form-control" id="second_phone_number" name="second_phone_number">
            </div>
            <div class="form-group">
                <label for="birthday_place_en">مكان الولادة باللغة الإنجليزية</label>
                <input type="text" class="form-control" id="birthday_place_en" name="birthday_place_en">
            </div>
            <div class="form-group">
                <label for="phone_number_earth">رقم الهاتف الأرضي</label>
                <input type="text" class="form-control" id="phone_number_earth" name="phone_number_earth">
            </div>
            <div class="form-group">
                <label for="known1">معرف 1</label>
                <input type="text" class="form-control" id="known1" name="known1">
            </div>
            <div class="form-group">
                <label for="phone_number_known1">رقم هاتف المعرف 1</label>
                <input type="text" class="form-control" id="phone_number_known1" name="phone_number_known1">
            </div>
            <div class="form-group">
                <label for="known2">معرف 2</label>
                <input type="text" class="form-control" id="known2" name="known2">
            </div>
            <div class="form-group">
                <label for="phone_number_known2">رقم هاتف المعرف 2</label>
                <input type="text" class="form-control" id="phone_number_known2" name="phone_number_known2">
            </div>
            <div class="form-group">
                <label for="place_address">مكان السكن</label>
                <select name="place_address" id="place_address" class="form-control">
                    <option value="">---</option>
                    <option value="Amman">العاصمة</option>
                    <option value="Irbid">اربد</option>
                    <option value="Aqaba">العقبة</option>
                    <option value="Zarqa">الزرقاء</option>
                    <option value="Other">غيرهم</option>
                </select>
            </div>
            <div class="form-group">
                <label for="place_give">هل ترغب باعطاء عنوانك للجهات الباحثة عن موظفين؟</label>
                <select name="place_give" id="place_give" class="form-control">
                    <option value="">---</option>
                    <option value="yes">نعم</option>
                    <option value="no">لا</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="level_educational_dad">المستوى الدراسي للأب</label>
                <select name="level_educational_dad" id="level_educational_dad" class="form-control">
                    <option value="">---</option>
                    <option value="High School">توجيهي</option>
                    <option value="College">دبلوم</option>
                    <option value="Bachelor">بكالوريوس</option>
                    <option value="Master">ماجستير</option>
                    <option value="Doctor">دكتوراه</option>
                </select>
            </div>
            <div class="form-group">
                <label for="level_educational_mom">المستوى الدراسي للأم</label>
                <select name="level_educational_mom" id="level_educational_mom" class="form-control">
                    <option value="">---</option>
                    <option value="High School">توجيهي</option>
                    <option value="College">دبلوم</option>
                    <option value="Bachelor">بكالوريوس</option>
                    <option value="Master">ماجستير</option>
                    <option value="Doctor">دكتوراه</option>
                </select>
            </div>
           <!-- <div class="form-group">
                <label for="full_address">Full Address</label>
                <input type="text" class="form-control" id="full_address" name="full_address">
            </div>-->
            <button type="submit">إنشاء مستخدم جديد</button>
        </form>
    </div>
</body>
</html>
