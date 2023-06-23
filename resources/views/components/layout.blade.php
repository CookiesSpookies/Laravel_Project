<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Tes IT Avian</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24 p-5" src="{{ asset('images/laravel-logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="/history" class="hover:text-laravel"><i class="fa-solid fa-history"></i> History</a>
            </li>
            <li>
                <a href="/transaction" class="hover:text-laravel"><i class="fa-solid fa-money-check-dollar"></i>
                    Transaction</a>
            </li>
            <li>
                <a href="/area_sale" class="hover:text-laravel"><i class="fa-solid fa-drafting-compass"></i> Area
                    Sales</a>
            </li>
            <li>
                <a href="/master_sale" class="hover:text-laravel"><i class="fa-solid fa-person"></i> Master Sales</a>
            </li>
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <x-flash-message />
</body>

</html>
