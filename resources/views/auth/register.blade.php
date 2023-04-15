<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
     
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px 40px 80px 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            margin-top: 5rem;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="email"], input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 3rem;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Form</h1>
        <form id="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>

            <button type="submit">
                Register
            </button>
        </form>
    </div>
    <script>
        document.querySelector('#register-form').addEventListener('submit', function(e) {
            e.preventDefault();

            var email = document.querySelector('#email').value;
            var password = document.querySelector('#password').value;
            var confirmPassword = document.querySelector('#password-confirm').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }

            // Perform AJAX request to register endpoint
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('register') }}');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Registrationsuccessful, redirect to login page
window.location.href = "{{ route('login') }}";
} else {
// Display error message
alert(xhr.responseText);
}
};
xhr.send(JSON.stringify({
email: email,
password: password
}));
});
</script>

</body>
</html>
