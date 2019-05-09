<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <style>
        .bg {
            width: 250px;
            /* or whatever width you want. */
            max-width: 250px;
            /* or whatever width you want. */
            display: inline-block;
        }
    </style>
    <script>
        $(document).ready(function(e) {
            $("#fupForm").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'submit.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submitBtn').attr("disabled", "disabled");
                        $('#fupForm').css("opacity", ".5");
                    },
                    success: function(msg) {
                        $('.statusMsg').html('');
                        if (msg != 'ok') {
                            $('.bg').css('backgroundImage', 'url('+ msg +')');
                             
                            $('#fupForm')[0].reset();
                            $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                        } else {
                            $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                        }
                        $('#fupForm').css("opacity", "");
                        $(".submitBtn").removeAttr("disabled");
                    }
                });
            });

            //file type validation
            $("#file").change(function() {
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    alert('Please select a valid image file (JPEG/JPG/PNG).');
                    $("#file").val('');
                    return false;
                }
            });
        });
    </script>
    <p class="statusMsg"></p>
    <form enctype="multipart/form-data" id="fupForm">
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form-control" id="file" name="file" required />
        </div>
        <input type="submit" name="submit" class="btn btn-danger submitBtn" value="SAVE" />
    </form>
    <div class='progress' id="progressDivId">
        <div class='progress-bar' id='progressBar'></div>
        <div class='percent' id='percent'>0%</div>
    </div>
    <div class="bg">4545455</div>
</body>

</html>