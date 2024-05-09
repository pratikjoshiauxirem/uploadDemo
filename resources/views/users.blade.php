<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
    <script src="https://gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>
</head>

<body>
    <form id="addUser">
        <input type="text" name="name" placeholder="Enter Name" id="name">
        <br><br>
        <input type="text" name="email" placeholder="Enter Email" id="email">
        <br><br>
        <button type="button" id="submitUser">Submitt</button>
    </form>
    <script>
        const firebaseConfig = {
            apiKey: "{{ config('services.firebase.apiKey') }}",
            authDomain: "{{ config('services.firebase.authDomain') }}",
            projectId: "{{ config('services.firebase.projectId') }}",
            databaseURL: "{{ config('services.firebase.databaseUrl') }}",
            storageBucket: "{{ config('services.firebase.storageBucket') }}",
            messagingSenderId: "{{ config('services.firebase.messaginSenderId') }}",
            appId: "{{ config('services.firebase.appId') }}"
        };
        const app = firebase.initializeApp(firebaseConfig);
        var database = firebase.database;
        var lastIndex = 0;
        $('#submitUser').on('click', () => {
            var values = $('#addUser').serializeArray();
            var name = values[0].value;
            var email = values[1].value;
            var userId = lastIndex + 1;
            firebase.database().ref('Users/' + userId).set({
                name: name,
                email: email
            })
            lastIndex = userId
            $('#addUser input').val("")

        })
    </script>
</body>

</html>
