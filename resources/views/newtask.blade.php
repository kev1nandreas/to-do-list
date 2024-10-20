<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Create a New Task</title>
  <link rel="preload" href="/image/background.jpg" as="image">
  <link rel="preload" href="/image/logo.png" as="image">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Tempus Dominus CSS -->
  <link href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.2.8/dist/css/tempus-dominus.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/css/sign-in.css">
  <style>
    body {
      background-image: url('/image/background.jpg');
    }

    .form-signin {
      background-color: gray;
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <main class="form-signin w-100 m-auto">
    <form method="POST" action="/register">
      @csrf
      <img class="mb-4" src="/image/logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Create a New Task</h1>

      <!-- Task Name Input -->
      <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control" id="taskName" placeholder="Task Name">
        <label for="taskName">Task Name</label>
      </div>

      <!-- Time Input (Tempus Dominus Datetime Picker) -->
      <div class="form-floating mb-3">
        <div class="input-group" id="datetimepicker">
          <input type="text" class="form-control" placeholder="Select Date and Time" aria-label="Date and Time" />
          <span class="input-group-text">
            <i class="bi bi-calendar"></i>
          </span>
        </div>
      </div>

      <!-- Description Input -->
      <div class="form-floating mb-3">
        <input type="text" name="description" class="form-control" id="description" placeholder="">
        <label for="description">Description (optional)</label>
      </div>

      <!-- Submit Button -->
      <button class="btn btn-primary w-100 py-2" type="submit">Create Task</button>
    </form>
  </main>

  <!-- Bootstrap JS and Tempus Dominus -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEuXZRnXWoiUM1r0d0Pe+Zo0r+T5rOnokj3zEN1Jsno6ZIaXg4pnePLfwca8LkUH" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.2.8/dist/js/tempus-dominus.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const picker = new tempusDominus.TempusDominus(document.getElementById('datetimepicker'), {
        display: {
          components: {
            calendar: true,
            clock: true,
          }
        }
      });
    });
  </script>
</body>

</html>