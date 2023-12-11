<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}">
</head>
<body class="aboutus" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
    @include('user.navbar')
    <br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <img src="user/asset gambar/logo usaha.png" alt="Logo" class="img-fluid"  style="width: 150px; height: 150px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="about-box">
                    <h2>Contact Information</h2>
                    <p>Phone: 081319939500</p>
                    <p>Email: bambachristoper9@gmail.com</p>
                </div>
                <div class="about-box">
                    <h2>Description</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec eros vel justo pellentesque facilisis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-box">
                    <h2>Address</h2>
                    <p>Jl. Pandawa 2 No.8, Caringin, Kec. Legok, Kabupaten Tangerang, Banten 15820</p>
                    <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6562830001853!2d106.56553337786028!3d-6.308807277385942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e315688b7535%3A0x5d6fe14918fffd87!2sHummergun%20Cloth%20Custom!5e0!3m2!1sen!2sid!4v1702313952839!5m2!1sen!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
