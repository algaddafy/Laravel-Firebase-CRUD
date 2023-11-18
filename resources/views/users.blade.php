<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Firebase CRUD by Md. Al Gaddafy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    {{--Firebase Tasks--}}
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>

</head>
<body>
    <div class="container" style="margin-top: 50px;">

        <h4 class="text-center">Laravel RealTime CRUD Using Google Firebase</h4><br>
    
        <h5># Add Customer</h5>
        <div class="card card-default">
            <div class="card-body">
                <form id="addCustomer" class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                               required autofocus>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email"
                               required autofocus>
                    </div>
                    <button id="submitCustomer" type="button" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    
        <br>
    
        <h5># Customers</h5>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <tbody id="tbody">
    
            </tbody>
        </table>
    </div>

    <script>
        var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);

    var database = firebase.database();

    var lastIndex = 0;

    // Get Data
    firebase.database().ref('customers/').on('value', function (snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function (index, value) {
        if (value) {
            htmls.push('<tr>\
            <td>' + value.name + '</td>\
            <td>' + value.email + '</td>\
        </tr>');
        }
        lastIndex = index;
    });
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});
    
    // Add Data
    $('#submitCustomer').on('click', function () {
    var values = $("#addCustomer").serializeArray();
    var name = values[0].value;
    var email = values[1].value;
    var userID = lastIndex + 1;

    console.log(values);

    firebase.database().ref('customers/' + userID).set({
        name: name,
        email: email,
    });

    // Reassign lastID value
    lastIndex = userID;
    $("#addCustomer input").val("");
});
    </script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</body>
</html>
