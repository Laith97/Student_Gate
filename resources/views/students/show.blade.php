<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap">

    <title>Show Student</title>
    <style>
        body {
            font-family: 'Noto Kufi Arabic', serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            direction: rtl; /* Right-to-left direction */
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: auto auto;
            gap: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .details {
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }
        label {
            font-weight: bold;
            color: #666;
            display: inline-block;
            width: 40%;
        }
        p {
            margin-top: 5px;
            color: #444;
            display: inline-block;
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>تفاصيل الطالب</h2>
        <div class="details">
            <label for="user_name">اسم المستخدم</label>
            <p>{{ $student->user->name }}</p>
        </div>

        <div class="details">
            <label for="full_name">اسم المستخدم كاملا</label>
            <p>{{ $student->full_name }}</p>
        </div>
        <div class="details">
            <label for="college">الكلية / التخصص</label>
            <p>{{ $student->college }}</p>
        </div>
        <div class="details">
            <label for="payment_number">رقم الدفع: (فواتيركم)</label>
            <p>{{ $student->payment_number }}</p>
        </div>
        <div class="details">
            <label for="email">البريد اﻹلكتروني</label>
            <p>{{ $student->email }}</p>
        </div>
        <div class="details">
            <label for="comments">الملاحظات</label>
            <p>{{ $student->comments }}</p>
        </div>
        <div class="details">
            <label for="full_name_english">الاسم باللغة الإنجليزية</label>
            <p>{{ $student->full_name_english }}</p>
        </div>
        <div class="details">
            <label for="birth_city"> مكان /عام الولادة</label>
            <p>{{ $student->birth_city }}</p>
        </div>
        <div class="details">
            <label for="address">العنوان الدائم</label>
            <p>{{ $student->address }}</p>
        </div>
        <div class="details">
            <label for="jordan_phone_number">الهاتف الخلوي من داخل الأردن</label>
            <p>{{ $student->jordan_phone_number }}</p>
        </div>
        <div class="details">
            <label for="second_phone_number">الهاتف الخلوي2</label>
            <p>{{ $student->second_phone_number }}</p>
        </div>

        <div class="details">
            <label for="birthday_place_en">مكان الولادة باللغة الإنجليزية</label>
            <p>{{ $student->birthday_place_en }}</p>
        </div>
        <div class="details">
            <label for="phone_number_earth">رقم الهاتف الأرضي</label>
            <p>{{ $student->phone_number_earth }}</p>
        </div>
        <div class="details">
            <label for="known1">معرف 1</label>
            <p>{{ $student->known1 }}</p>
        </div>
        <div class="details">
            <label for="phone_number_known1">رقم هاتف المعرف 1</label>
            <p>{{ $student->phone_number_known1 }}</p>
        </div>
        <div class="details">
            <label for="known2">معرف 2</label>
            <p>{{ $student->known2 }}</p>
        </div>
        <div class="details">
            <label for="phone_number_known2">رقم هاتف المعرف 2</label>
            <p>{{ $student->phone_number_known2 }}</p>
        </div>
        <div class="details">
            <label for="place_address">مكان السكن</label>
            <p>{{ $student->place_address }}</p>
        </div>
        <div class="details">
            <label for="place_give">هل ترغب باعطاء عنوانك للجهات الباحثة عن موظفين؟</label>
            <p>{{ $student->place_give }}</p>
        </div>
        
        <div class="details">
            <label for="level_educational_dad">المستوى الدراسي للأب</label>
            <p>{{ $student->level_educational_dad }}</p>
        </div>
        <div class="details">
            <label for="level_educational_mom">المستوى الدراسي للأم</label>
            <p>{{ $student->level_educational_mom }}</p>
        </div>
    </div>
</body>
</html>
