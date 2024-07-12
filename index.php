<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">Affiliate Management</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <!-- <a class="mr-5 hover:text-gray-900">Log In</a>
                <a class="mr-5 hover:text-gray-900">Sign Up</a> -->
            </nav>
            <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">About
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </header>

    <main>
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Welcome to the
                        <br class="hidden lg:inline-block">Affiliate Management System
                    </h1>
                    <p class="mb-8 leading-relaxed">This platform allows businesses to manage their affiliate marketing campaigns and affiliates to track their performance and earnings</p>
                    <div class="flex justify-center">
                        <a href="./login.php">
                            <button class="inline-flex text-white bg-[#007BFF] border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
                        </a>
                        <a href="./register.php">
                            <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Sign Up</button>
                        </a>

                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 h-1/2">
                    <img class="object-contain object-center rounded w-full h-full" alt="hero" src="./public/images/roberto-cortese-ejhjSZKTeeg-unsplash.jpeg">
                </div>
            </div>
        </section>
    </main>

    <footer class="w-full flex justify-center">
        <div class="w-full text-center">
            <p>&copy; 2024 Affiliate Management System</p>
        </div>
    </footer>

</body>

</html>