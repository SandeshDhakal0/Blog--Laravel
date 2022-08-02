<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="A.fonts,,_icomoon,,_style.css+css,,_bootstrap.min.css+css,,_style.css,Mcc.xV8IWJN333.css.pagespeed.cf.uTNFcN-9yn.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Contact Form #10</title>

</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-7">
                    <div class="form h-100 contact-wrap p-5">
                        <h3 class="text-center">Let's Talk</h3>
                        <form class="mb-5" action="{{route('send.email')}}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your name">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your email">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="message" class="col-form-label">Message *</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="4"
                                        placeholder="Write your message"></textarea>
                                </div>
                                <input type="submit" value="Send Message" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
