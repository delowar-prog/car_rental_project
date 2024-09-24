  @extends('auth.layout.authLayout')
  @section('title')
      Register
  @endsection
  @section('content')
      <div class="col-md-4">
          <div class="card">
              <div class="card-header">
                  <h5 class="text-center">Register Now</h5>
              </div>
              <div class="card-body">
                  <div class="mb-3">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  <div class="mb-3">
                      <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                  </div>
                  <div class="mb-3">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                  </div>
                  <div class="mb-3">
                      <button onclick="SubmitRegister()" type="submit" class="btn btn-success form-control">Register</button>
                  </div>
                  <p>Already have an account <span class="text-primary"><a href="/login">Login</a></span></p>
              </div>
          </div>
      </div>
      @push('js')
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
          async function SubmitRegister(){
              let email = document.getElementById('email').value;
              let name = document.getElementById('name').value;
              let password = document.getElementById('password').value;
              if (email.length === 0) {
                  console.log('Email must not be empty');
              } else if (name.length === 0) {
                  console.log('Name must not be empty');
              }else if (password.length === 0) {
                  console.log('Password must not be empty');
              } else {
                  let res = await axios.post('/register', {
                      email: email,
                      name: name,
                      password: password
                  });

                  if (res.status == 200 && res.data['status'] == 'success') {
                      window.location.href = '/login';
                  } else {
                      console.log(res.data['message']);
                  }
              }
          }
      </script>
      @endpush
  @endsection
