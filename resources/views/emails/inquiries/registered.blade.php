<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>You have a new inquiry from the contact form</title>

    <style>
        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }

        body {
            margin: 0 1rem;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(229 231 235);
        }

        @media (min-width: 360px) {
            #container {
                margin: 0;
            }
        }

        #container {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        @media (min-width: 475px) {
            #container {
                width: 450px;
            }
        }

        #content {
            padding: 1.5rem;
            margin-top: 1rem;
            border-radius: 0.5rem;
            background-color: white;
        }

        #content+div {
            margin-top: 1rem;
            margin-bottom: 0;
        }

        img:first-of-type {
            width: fit-content;
            max-height: 2.25rem;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }

        @media (min-width: 640px) {
            img:first-of-type {
                width: 200px;
                max-height: 60px;
            }
        }

        p:first-of-type {
            font-size: 1.5rem;
            line-height: 2rem;
            text-align: center;
            margin: 1rem 0 0;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="content">
            <img src="{{ env('APP_URL') }}/images/graphics/logo.png" alt="logo" />
            <p>A new inquiry has been submitted from the contact form.</p>
        </div>
        <div style="text-align:center">&copy; {{ date('Y') }} CADEXSA. All rights reserved</div>
    </div>
</body>

</html>
