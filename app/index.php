<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css"
        integrity="sha256-v5YlJGWVLS5hQ+o48fBzCKHEP2vMNsku57x3CosYykc=" crossorigin="anonymous"/>
</head>
<body>
<section class="container">
  <h1><?php out('Você está acessando o host <b>', Url::host(), Url::path(), '</b>. '); ?></h1>
  <div class="column">
    <div class="field">
      <label class="label">Form label</label>
      <div class="control">
        <input class="input" type="text" placeholder="Input">
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
        <textarea class="textarea" placeholder="Textarea"></textarea>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <label class="checkbox">
          <input type="checkbox">
          Checkbox
        </label>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <label class="radio">
          <input type="radio" name="question">
          Radio
        </label>
        <label class="radio">
          <input type="radio" name="question">
          Buttons
        </label>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <a class="button is-link">Button</a>
      </p>
    </div>
  </div>
</section>
</body>
</html>