<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>

<body class="relative bg-[#fbfbfd]">
    <div class="fixed inset-0 -z-10">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-100 to-white"></div>
    </div>

    <div class="animate-fade-in flex min-h-screen flex-col justify-center px-4 py-12 sm:px-6 lg:px-8 relative">
        <a href="{{route('login')}}" class="mb-8 hidden text-sm font-medium text-gray-500 hover:text-gray-800 sm:block mx-auto transition-colors duration-200 ease-in-out">
            Go Back to Login
        </a>
        <div class="w-full max-w-[400px] space-y-8 mx-auto">
            <div>
                <img class="mx-auto h-10 w-auto" src="{{ asset('img/Logo.png') }}" alt="Logo">
                <h2 class="mt-8 text-center text-2xl font-medium text-gray-900">
                    Verify Your Identity
                </h2>
                <p class="mt-3 text-center text-sm text-gray-500">
                    Enter the verification code sent to your email
                </p>
            </div>

            @if ($errors->any())
            <div class="rounded-lg bg-red-50 p-4 mb-4">
                <div class="flex">
                    <div class="ml-3">
                        <div class="text-sm text-red-700">
                            <ul class="list-none space-y-1">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('2fa.verify.post') }}" method="POST">
                @csrf
                <div>
                    <input id="code" name="code" type="text" required
                        class="block w-full rounded-lg border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 text-center text-lg tracking-[0.2em] transition-all duration-200 ease-in-out"
                        placeholder="Enter code" maxlength="6" autocomplete="one-time-code">
                </div>

                <div class="space-y-3">
                    <button type="submit"
                        class="relative flex w-full justify-center rounded-lg bg-gray-900 py-3.5 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                        Continue
                    </button>

                    <button type="button" id="resendButton"
                        class="w-full py-3 text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors duration-200 ease-in-out">
                        Resend Code
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('resendButton').addEventListener('click', function() {
            const button = this;
            button.disabled = true;
            button.textContent = 'Sending...';

            fetch('{{ route("2fa.resend") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        alert('New verification code sent!');
                        startCooldown(button);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to resend code. Please try again.');
                    button.disabled = false;
                    button.textContent = 'Resend Code';
                });
        });

        function startCooldown(button) {
            let timeLeft = 300; // 5 minutes in seconds
            button.disabled = true;

            const timer = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                button.textContent = `Resend available in ${minutes}:${seconds.toString().padStart(2, '0')}`;

                if (timeLeft <= 0) {
                    clearInterval(timer);
                    button.disabled = false;
                    button.textContent = 'Resend Code';
                }
                timeLeft--;
            }, 1000);
        }
    </script>
</body>

</html>