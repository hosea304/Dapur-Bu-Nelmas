<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>About Us</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="{{ asset('user/user-style.css') }}" />
    </head>
    <body
        class="aboutus"
        style="
            background-image: url('user/asset gambar/backgroundweb.jpg');
            background-size: cover;
        "
    >
        @include('user.navbar')
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <img
                        src="user/asset gambar/logo usaha.png"
                        alt="Logo"
                        class="img-fluid"
                        style="width: 150px; height: 150px"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="about-box">
                        <h2>Contact Information</h2>
                        <a
                            class="kontak"
                            style="color: antiquewhite"
                            href="tel:081319939500"
                            >Phone: 081319939500</a
                        ><br />
                        <a
                            class="kontak"
                            style="color: antiquewhite"
                            href="johannaagustina78@gmail.com"
                            >Email: johannaagustina78@gmail.com</a
                        >
                    </div>
                    <div
                        class="about-box"
                        style="display: flex; align-items: center"
                    >
                        <img
                            src="user/asset gambar/admin logo.jpg"
                            alt="Logo"
                            class="img-fluid"
                            style="
                                width: 50%;
                                border-radius: 10px;
                                padding-right: 10px;
                            "
                        />
                        <p style="text-align: justify">
                            Dapur Bu Nelmas merupakan usaha online tanpa fisik
                            toko, yang menyediakan aneka macam masakan dengan
                            berbagai variasi menu.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-box">
                        <h2>Address</h2>
                        <p>
                            Jl. Pandawa 2 No.8, Caringin, Kec. Legok, Kabupaten
                            Tangerang, Banten 15820
                        </p>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6562830001853!2d106.56553337786028!3d-6.308807277385942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e315688b7535%3A0x5d6fe14918fffd87!2sHummergun%20Cloth%20Custom!5e0!3m2!1sen!2sid!4v1702313952839!5m2!1sen!2sid"
                                width="400"
                                height="200"
                                style="border: 0"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                        <br><br>
                        <center>
    <img class="food-img" alt="Food Image" src="{{ asset('user/asset gambar/gambartempat.jpg') }}" style="width: 300px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
</center>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('user/scripts.js') }}"></script>
    </body>
</html>
