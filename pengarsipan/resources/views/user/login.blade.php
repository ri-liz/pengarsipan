<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-sm bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h2>
        <form action="{{route('page.login.sy')}}" method="post">
            
            @csrf
            
            <!-- Username -->
            <div class="mb-4">
                <label class="block mb-1 text-gray-700" for="username">Username</label>
                <input @required(true) type="text" id="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your username" name="username">
            </div>

            <!-- Password -->
            <div class="mb-4 relative">
                <label class="block mb-1 text-gray-700" for="password">Password </label>
                <input @required(true) type="password" type="text" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="password">
                <div class="absolute right-3 bottom-2.5 cursor-pointer text-gray-500 hover:text-gray-800" id="show-hide">
                    <i class="fa fa-eye"></i>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Login
            </button>
        </form>
    </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script>
    $("#show-hide").on("click",()=>{
        var password=$("#password").attr("type");
        console.log(password);
        if (password=="text") {
            var password=$("#password").attr("type", "password");
            $("#show-hide").html(`<i class="fa fa-eye-slash"></i>`);
        }else if(password=="password"){
            $("#show-hide").html(`<i class="fa fa-eye"></i>`);
            var password=$("#password").attr("type","text");
        }
    })
  </script>
</body>
</html>