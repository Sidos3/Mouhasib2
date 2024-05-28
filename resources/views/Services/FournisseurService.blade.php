<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pageFournisseur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* style.css */

        body {
            font-family: Arial, sans-serif;
            background-color: teal;
            direction: rtl;
        }

        .container {
            width: 70%;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .step {
            text-align: center;
            flex: 1;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            background: #f1f1f1;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            color: #999;
        }

        .step.active .step-icon {
            background: #FFC312;
            color: #fff;
        }

        .step p {
            margin-top: 10px;
            color: #999;
        }

        .step.active p {
            color: #FFC312;
        }

        .form-step {
            display: none;
        }

        .form-step-active {
            display: block;
        }

        input,
        select {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: right;
        }

        button {
            background: #FFC312;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        button:hover {
            background: teal;
        }

        img {
            display: block;
            margin: 5px auto;
            width: 120px;
            height: 120px;
            border: 5px solid #FFC312;
            border-radius: 20%;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div>
        <img src="{{ asset('images/logo.jpeg') }}" alt="">
    </div>
    <div class="container">
        <div class="stepper">
            <div class="step active" data-step="1">
                <div class="step-icon"><i class="fas fa-user"></i></div>
                <p>معلومات المزود</p>
            </div>
            <div class="step" data-step="2">
                <div class="step-icon"><i class="fas fa-university"></i></div>
                <p>شركتك للبضائع</p>
            </div>
            <div class="step" data-step="3">
                <div class="step-icon"><i class="fas fa-file-alt"></i></div>
                <p>تم</p>
            </div>
        </div>

        <form id="stepperForm" action="{{ route('create_fournisseure') }}" method="POST">
            @csrf
           
            <div class="form-step form-step-active" data-step="1">
                <label>الاسم الكامل*</label>
                <input type="text" required name="full_name">
                <label>رقم الهوية الوطنية*</label>
                <input type="text" required name="NNI">
                <label>مفتاح البلدالخاص بك*</label>
                <div style="display: flex;">
                    <select required name="cle_de_paye">
                        <option value="+222">+222 موريتانيا</option>
                        <option value="+212">+212 المغرب</option>
                        <option value="+213">+213 الجزائر</option>
                        <option value="+216">+216 تونس</option>
                        <option value="+33">+33 فرنسا</option>
                        <option value="+1">+1 الولايات المتحدة الأمريكية</option>
                    </select>

                </div>
                <label>واتساب الخاص بك*</label>
                <input type="text" required name="numero_telephone">
                <button type="button" class="btn-next">التالي</button>
            </div>
            <div class="form-step" data-step="2">
                <label>اسم الشركة</label>
                <input type="text" name="company_name">
                <label>تاريخ الميلاد</label>
                <input type="date" name="date_naissance">
                <label>المدينة*</label>
                <input type="text" required name="ville">
                <label>العنوان المحلي*</label>
                <input type="text" required name="adresse">
                <button type="button" class="btn-prev">السابق</button>
                <button type="button" class="btn-next">التالي</button>
            </div>
            <div class="form-step" data-step="3">
                <p>شكراً لك.</p>
                <button type="button" class="btn-prev">السابق</button>
                <button type="submit">إرسال</button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>

<script>
    // script.js

    document.addEventListener('DOMContentLoaded', () => {
        const nextButtons = document.querySelectorAll('.btn-next');
        const prevButtons = document.querySelectorAll('.btn-prev');
        const formSteps = document.querySelectorAll('.form-step');
        const steps = document.querySelectorAll('.step');

        let formStepNum = 0;

        nextButtons.forEach(button => {
            button.addEventListener('click', () => {
                formStepNum++;
                updateFormSteps();
                updateStepper();
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener('click', () => {
                formStepNum--;
                updateFormSteps();
                updateStepper();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep, index) => {
                if (index === formStepNum) {
                    formStep.classList.add('form-step-active');
                } else {
                    formStep.classList.remove('form-step-active');
                }
            });
        }

        function updateStepper() {
            steps.forEach((step, index) => {
                if (index === formStepNum) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            });
        }
    });
</script>
