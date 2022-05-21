<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{url('storage/img/logo.png')}}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>En maintenance</title>
</head>
<body>
    <main class="min-h-screen bg-cover bg-top sm:bg-top" style="background-image: url('https://images.unsplash.com/photo-1545972154-9bb223aac798?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=3050&q=80&exp=8&con=-15&sat=-75');">
        <div class="max-w-7xl mx-auto px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8 lg:py-48">
          <p class="text-sm font-semibold text-black text-opacity-50 uppercase tracking-wide">503</p>
          <h1 class="mt-2 text-4xl font-extrabold text-white tracking-tight sm:text-5xl">Le site est en maintenance </h1>
          <p class="mt-2 text-lg font-medium text-black text-opacity-50">Nous travaillons à améliorer l'expérience de {{config('app.name')}} Merci de votre compréhension</p>
         
        </div>
      </main>
</body>
</html>