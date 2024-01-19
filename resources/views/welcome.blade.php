<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Notyet</title>
</head>
<body>
    <div class="main-content">
        <div class="data">
            <img src="./images/logo-site.png" alt="image">
            <form class="user" method="POST"  action="{{ route('checkCode') }}">
                @csrf
                <input type="text" name="code" id="number" placeholder="Enter Digit Code">
                <button href="#" type="submit" class="btn-data">Verify</button>
            </form>
        </div>
    </div>
    <div class="main-in-content">
        <div class="data-content">
            <div class="data-in">
                <img src="./images/first-image.png" alt="">
            </div>
            <div class="data-out">
                <img src="./images/second-image.png" alt="">
            </div>
        </div>
        <div class="data-in-content">
            <div class="main-in">
                <h3>Follow Us On Social Media</h3>
            </div>
            <div class="main-out">
                <p>Copyright @ 2023 Notyet | All Reserved</p>
                <div class="icons">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session()->has('error'))
        <script type="text/javascript">
            Swal.fire(
              'Error',
              "{{session()->get('error')}}",
              'error'
            );
        </script>
    @endif

    @if(session()->has('success'))
        <script type="text/javascript">
            Swal.fire(
              'Success',
              "{{session()->get('success')}}",
              'success'
            );
        </script>
    @endif
</body>
</html>