<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-3 mb-4">
  <span class="text-muted font-weight-light">Forms /</span> Layouts and elements
</h4>

<div class="card mb-4">
  <h6 class="card-header">
    Default
  </h6>
  <div class="card-body">
    <form>
      <div class="form-group">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Password">
      </div>
      <div class="form-group">
        <label class="form-label w-100">File input</label>
        <input type="file">
        <small class="form-text text-muted">Example block-level help text here.</small>
      </div>
      <div class="form-group">
        <label class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input">
          <span class="custom-control-label">Check this custom checkbox</span>
        </label>
      </div>
      <div class="form-group">
        <label class="form-check">
          <input class="form-check-input" type="checkbox" checked>
          <div class="form-check-label">
            Check me out
          </div>
        </label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</div>

<div class="card mb-4">
  <h6 class="card-header">
    Form row
  </h6>
  <div class="card-body">
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" placeholder="1234 Main St">
      </div>
      <div class="form-group">
        <label class="form-label">Address 2</label>
        <input type="text" class="form-control" placeholder="Apartment, studio, or floor">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="form-label">City</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label class="form-label">State</label>
          <select class="custom-select">
            <option>Select state</option>
            <option>California</option>
            <option>Hawaii</option>
            <option>Florida</option>
            <option>Texas</option>
            <option>Massachusetts</option>
            <option>Alabama</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label class="form-label">Zip</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="custom-control custom-checkbox m-0">
          <input type="checkbox" class="custom-control-input">
          <span class="custom-control-label">Check this custom checkbox</span>
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
  </div>
</div>

<div class="card mb-4">
  <h6 class="card-header">
    Horizontal
  </h6>
  <div class="card-body">
    <form>
      <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Textarea</label>
        <div class="col-sm-10">
          <textarea class="form-control" placeholder="Textarea"></textarea>
        </div>
      </div>
      <fieldset class="form-group">
        <div class="row">
          <label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Radios</label>
          <div class="col-sm-10">
            <div class="custom-controls-stacked">
              <label class="custom-control custom-radio">
                <input name="custom-radio-3" type="radio" class="custom-control-input" checked>
                <span class="custom-control-label">Option one is this and that—be sure to include why it's great</span>
              </label>
              <label class="custom-control custom-radio">
                <input name="custom-radio-3" type="radio" class="custom-control-input">
                <span class="custom-control-label">Option two can be something else and selecting it will deselect option one</span>
              </label>
              <label class="custom-control custom-radio">
                <input name="custom-radio-3" type="radio" class="custom-control-input" disabled>
                <span class="custom-control-label">Option three is disabled</span>
              </label>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Checkbox</label>
        <div class="col-sm-10">
          <label class="custom-control custom-checkbox m-0">
            <input type="checkbox" class="custom-control-input">
            <span class="custom-control-label">Check me out</span>
          </label>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card mb-4">
  <h6 class="card-header">
    Inline
  </h6>
  <div class="card-body">
    <form class="form-inline mb-4">
      <label class="sr-only">Name</label>
      <input type="text" class="form-control mr-sm-2 mb-2 mb-sm-0" placeholder="Jane Doe">

      <label class="sr-only">Username</label>
      <div class="input-group mr-sm-2 mb-2 mb-sm-0">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" placeholder="Username">
      </div>

      <label class="form-check mr-sm-2 mb-2 mb-sm-0">
        <input class="form-check-input" type="checkbox">
        <div class="form-check-label">
          Remember me
        </div>
      </label>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <form class="form-inline">
      <label class="form-label mr-sm-2">Preference</label>
      <select class="custom-select mr-sm-2 mb-2 mb-sm-0">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>

      <label class="custom-control custom-checkbox mr-sm-2 mb-2 mb-sm-0">
        <input type="checkbox" class="custom-control-input">
        <span class="custom-control-label">Remember my preference</span>
      </label>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<div class="card mb-4">
  <h6 class="card-header">
    Help text
  </h6>
  <div class="card-body">
    <form>
      <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" class="form-control">
        <small class="form-text text-muted">
          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </small>
      </div>
    </form>

    <form class="form-inline mt-4">
      <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" class="form-control mx-sm-3">
        <small class="text-muted">
          Must be 8-20 characters long.
        </small>
      </div>
    </form>
  </div>
</div>

<div class="card mb-4">
  <h6 class="card-header">
    Static controls
  </h6>
  <div class="card-body">
    <form>
      <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
        <div class="col-sm-10">
          <div class="form-control-plaintext">example.email.com</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
          <button type="submit" class="btn btn-default">Confirm identity</button>
        </div>
      </div>
    </form>

    <!-- Inline form -->
    <form class="form-inline mt-4">
      <div class="form-control-plaintext mr-sm-2 mb-2 mb-sm-0">example.email.com</div>
      <input type="password" class="form-control mr-sm-2 mb-2 mb-sm-0" placeholder="Password">
      <button type="submit" class="btn btn-default">Confirm identity</button>
    </form>
  </div>
</div>

<div class="card mb-4">
  <h6 class="card-header">
    States
  </h6>
  <div class="card-body">
    <!-- Valid -->
    <div class="form-group">
      <label class="form-label">Valid</label>
      <input type="text" class="form-control is-valid">
      <small class="valid-feedback">A block of help text that breaks onto a new line and may extend beyond one line.</small>
    </div>

    <!-- Invalid -->
    <div class="form-group">
      <label class="form-label">Invalid</label>
      <input type="text" class="form-control is-invalid">
      <small class="invalid-feedback">A block of help text that breaks onto a new line and may extend beyond one line.</small>
    </div>

    <!-- With tooltip -->
    <div class="form-group position-relative">
      <label class="form-label">Invalid with tooltip</label>
      <input type="text" class="form-control is-invalid">
      <div class="invalid-tooltip">Please provide a valid state.</div>
    </div>
  </div>
</div>

<div class="card mb-4">
  <h6 class="card-header">
    Sizes
  </h6>
  <div class="card-body">
    <form>
      <!-- Large -->
      <div class="form-group">
        <label class="form-label form-label-lg">Large label</label>
        <input type="text" class="form-control form-control-lg" placeholder="Large input">
      </div>

      <!-- Small -->
      <div class="form-group">
        <label class="form-label form-label-sm">Small label</label>
        <input type="text" class="form-control form-control-sm" placeholder="Small input">
      </div>
    </form>

    <form class="mt-4">
      <!-- Large -->
      <div class="form-group row">
        <label class="col-form-label col-form-label-lg col-sm-2 text-sm-right">Large label</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" placeholder="Large input">
        </div>
      </div>

      <!-- Small -->
      <div class="form-group row">
        <label class="col-form-label col-form-label-sm col-sm-2 text-sm-right">Small label</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" placeholder="Small input">
        </div>
      </div>
    </form>
  </div>
</div>

</div>
<!-- / Content -->