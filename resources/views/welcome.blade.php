<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Voucher Generator</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel='stylesheet' id='wp-block-library-css'  href='https://mdbootstrap.com/wp-includes/css/dist/block-library/style.min.css?ver=5.1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='contact-form-7-css'  href='https://mdbootstrap.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.1' type='text/css' media='all' />
        <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required { visibility: visible; }
        </style>
        <link rel='stylesheet' id='wsl-widget-css'  href='https://mdbootstrap.com/wp-content/plugins/wordpress-social-login/assets/css/style.css?ver=5.1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='compiled.css-css'  href='https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.7.7.min.css?ver=4.7.7' type='text/css' media='all' />


        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Kisikoso Labs.
                </div>

                  <!-- Default form login -->
                <form method="POST" action="{{ route('vouchers.index') }}" class="text-center border border-light p-5">
                {{-- <form method="POST"  class="text-center border border-light p-5"> --}}
                    {{ csrf_field() }}
                    <p class="h4 mb-4">Voucher Generator</p>

                    {{-- alert --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div><br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    @if (\Session::has('warning'))
                        <div class="alert alert-danger alert-block">
                            <p>{{ \Session::get('warning') }}</p>
                        </div><br />
                    @endif



                    <!-- Customer Name -->
                    <input required type="text" id="name" name="name" class="form-control mb-4" placeholder="Your name" value="{{ old('name') }}">

                    <!-- Email -->
                    <input  required  type="text" id="email" name="email" class="form-control mb-4" placeholder="Input your valid email" value="{{ old('email') }}">

                    {{-- Voucher Option --}}

                    <select required class="browser-default custom-select" name="voucher">
                        <option selected value="">Choose Your Voucher</option>
                        @foreach ($voucherNames as $key )
                    <option value="{{ $key->id }}">{{ $key->name }} *expired {{date("jS F, Y", strtotime($key->expired_date))}}</option>
                        @endforeach
                    </select>

                    <!-- Generator Voucher button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Generate Voucher</button>

                    <!-- Notify -->
                    <p>
                        If you want use your voucher please call admin.
                    </p>

                        {{-- <blockquote class="embedly-card">
                                <h4>
                                    <a href="https://github.com/arthajonar/voucher-management-system">
                                        arthajonar/voucher-management-system
                                    </a>
                                </h4>
                                <p>
                                    Open Source Voucher Management System is a web application for manage voucher. used PHP with Laravel Framework and use MySQL for Database. - arthajonar/voucher-management-system
                                </p>
                            </blockquote>
                            <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script> --}}

                </form>
                <br>
                <p>
                    <strong>Open Source Voucher Management System</strong> - Kisikoso Labs 2019 - <a class="provider-name" target="_blank" href="https://github.com/arthajonar/voucher-management-system"><img src="https://i-cdn.embed.ly/1/display?height=16&amp;key=fd92ebbc52fc43fb98f69e50e7893c13&amp;url=https%3A%2F%2Fgithub.githubassets.com%2Ffavicon.ico&amp;width=16" width="16" height="16" class="provider-favicon">
                        GitHub</a>
                </p>
                <!-- Default form login -->
            </div>
        </div>
    </body>
</html>
