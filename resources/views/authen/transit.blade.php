<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['app_name']}}</title>
</head>
<body>
    <h1>This is the transit page</h1>

    <script>
        // const currentUrl = window.location.href;
        const tokenData = {!! json_encode($token_data) !!};
        
        const access = tokenData['access'];
        const refresh = tokenData['refresh'];
        const csrf = tokenData['csrf'];

        let currentDate = new Date();
        let expireDate = new Date(currentDate.getTime() + (7 * 24 * 60 * 60 * 1000)); // seven days lifetime

        let expireDateString = expireDate.toUTCString();

        document.cookie = `access=${access}`;
        document.cookie = `refresh=${refresh}`;
        document.cookie = `csrf=${csrf}`;
        document.cookie = `expires=${expireDateString}`;

        window.location.href = '/';
        

    </script>
</body>
</html>