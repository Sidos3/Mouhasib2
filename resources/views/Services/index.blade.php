<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية ||</title>
    <link rel="icon" href="path/to/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: teal;
            text-align: center;
            padding: 10px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .user-type {
            margin: 20px;
            padding: 20px;
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            background-color: #FFC312;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            text-align: center;
        }

        .user-type h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .user-type .icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .admin {
            color: #c0392b;
        }

        .fournisseur {
            color: #c0392b;
        }

        h1 {
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        img {
            border-radius: 10px;
            border-style: solid;
            border-width: 2px;
            border-color: #FFC312;
            width: 100%;
            max-width: 200px;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .user-type {
                max-width: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/logo.jpeg') }}"  alt="Logo">
        <a href="{{ route('ServiceFournisseur') }}" class="user-type fournisseur">
            <i class="fas fa-truck icon"></i>
            <h2>مورد</h2>
        </a>
        <a href="{{ route('ServiceAdmin') }}" class="user-type admin">
            <i class="fas fa-user-tie icon"></i>
            <h2>مدير</h2>
        </a>
        <h1>هل أنت ؟</h1>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
