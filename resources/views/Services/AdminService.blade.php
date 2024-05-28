<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ميزانية الشركة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* style.css */

        body {
            font-family: Arial, sans-serif;
            background-color: teal;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .container {
            width: 70%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 5px;
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
            font-size: 20px;
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
        textarea,
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

        textarea {
            height: 100px;
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
                <div class="step-icon"><i class="fas fa-building"></i></div>
                <p>الأصول المجمدة</p>
            </div>
            <div class="step" data-step="2">
                <div class="step-icon"><i class="fas fa-money-bill"></i></div>
                <p>الأصول المتداولة</p>
            </div>
            <div class="step" data-step="3">
                <div class="step-icon"><i class="fas fa-balance-scale"></i></div>
                <p>أسهم الشركة</p>
            </div>
            <div class="step" data-step="4">
                <div class="step-icon"><i class="fas fa-hand-holding-usd"></i></div>
                <p>الديون</p>
            </div>
        </div>

        <form id="stepperForm" action="{{ route('create_bilan') }}" method="POST">
            @csrf
            <!-- Step 1: Actifs -->
            <div class="form-step form-step-active" data-step="1">
                <label>إجمالي الأصول الثابتة*</label>
                <input type="number" name="total_immobilisation">
                <label>التفاصيل</label>
                <textarea name="details_immobilisation"></textarea>
                <button type="button" class="btn-next">التالي</button>
            </div>

            <!-- Step 2: Actifs Circulants -->
            <div class="form-step" data-step="2">
                <label>إجمالي الأصول المتداولة*</label>
                <input type="number" name="total_actif_a_court_terme">
                <label>التفاصيل</label>
                <textarea name="details_total_actif_a_court_terme"></textarea>
                <button type="button" class="btn-prev">السابق</button>
                <button type="button" class="btn-next">التالي</button>
            </div>

            <!-- Step 3: Capitaux Propre -->
            <div class="form-step" data-step="3">
                <label>رأس المال*</label>
                <input type="number" name="total_du_capital">
                <label>التفاصيل</label>
                <textarea name="details_du_capital"></textarea>
                <button type="button" class="btn-prev">السابق</button>
                <button type="button" class="btn-next">التالي</button>
            </div>

            <!-- Step 4: Passifs Circulants -->
            <div class="form-step" data-step="4">
                <label>إجمالي الخصوم المتداولة*</label>
                <input type="number" name="total_du_passif_court_terme">
                <label>التفاصيل</label>
                <textarea name="details_du_passif_court_terme"></textarea>
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
