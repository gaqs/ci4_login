<main class="main mt-5">

  <div class="container">
    <div class="row">

      <h1>Welcome to the Dashboard!</h1>
      <h2>Hello, <?= session()->get('name').' '.session()->get('lastname'); ?>.</h2>

    </div>

  </div>

</main>
