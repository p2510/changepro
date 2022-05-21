    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="shortcut icon" href="{{url('storage/img/logo.png')}}" type="image/x-icon">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Erreur 404</title>
    </head>
    <body>
        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white min-h-screen px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
    <div class="max-w-max mx-auto">
      <main class="sm:flex">
        <p class="text-4xl font-extrabold text-indigo-600 sm:text-5xl">404</p>
        <div class="sm:ml-6">
          <div class="sm:border-l sm:border-gray-200 sm:pl-6">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Page introuvable</h1>
            <p class="mt-1 text-base text-gray-500">Veuillez vérifier l'URL dans la barre d'adresse et réessayer.</p>
          </div>
          <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
            <a href="{{config('app.url')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                
              Page d'acceuil
            </a>

          </div>
        </div>
      </main>
    </div>
  </div>
    </body>
    </html>