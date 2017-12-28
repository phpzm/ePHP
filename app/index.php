<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css"
        integrity="sha256-v5YlJGWVLS5hQ+o48fBzCKHEP2vMNsku57x3CosYykc=" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous"/>
</head>
<body>
<section class="container">
  <h1><?php out('Você está acessando o host <b>', Url::host(), Url::path(), '</b>', ' from ', address()); ?></h1>
  <pre><?php out(Http::all()) ?></pre>
  <pre><?php out(Http::file('resume')) ?></pre>
  <form class="column" method="post" enctype="multipart/form-data">
    <div class="field">
      <label class="label">Form label</label>
      <div class="control">
        <input class="input" type="text" name="input" placeholder="Input">
      </div>
    </div>
    <div class="field">
      <p class="control">
      <span class="select">
        <select>
          <option>Select dropdown</option>
        </select>
      </span>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <textarea class="textarea" name="textarea" placeholder="Textarea"></textarea>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <label class="checkbox">
          <input type="checkbox" name="checkbox">
          Checkbox
        </label>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <label class="radio">
          <input type="radio" name="radio">
          Radio
        </label>
        <label class="radio">
          <input type="radio" name="radio">
          Buttons
        </label>
      </p>
    </div>
    <div class="field">
      <label class="label">File</label>
      <div class="file">
        <label class="file-label">
          <input class="file-input" type="file" name="resume">
          <span class="file-cta">
            <span class="file-icon">
              <i class="fa fa-upload"></i>
            </span>
            <span class="file-label">
              Choose a file…
            </span>
          </span>
        </label>
      </div>
    </div>
    <div class="field">
      <p class="control">
        <button class="button is-link">Button</button>
      </p>
    </div>
  </form>
</section>
</body>
</html>