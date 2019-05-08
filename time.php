<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        
    setInterval(function()
{
    $.ajax({
        type: "get",
        url: "my-script.php",
        success:function(data)
        {
            $("p").html(data);
            //console.log the response
            console.log(data);
        }
    });
},1000);
    
    </script>
    <p></p>
</body>
</html>