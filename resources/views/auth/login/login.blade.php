@extends('auth.layout.authLayout')
@section('title')
    Login
@endsection
@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Login Now</h5>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success form-control">Login</button>
                    </div>
                    <p>Already have an account <span class="text-primary"><a href="/register">Register</a></span></p>
                </div>
            </form>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            async function SubmitLogin() {
                let email = document.getElementById('email').value;
                let password = document.getElementById('password').value;
                if (email.length === 0) {
                    console.log('Email must not be empty');
                } else if (password.length === 0) {
                    console.log('Password must not be empty');
                } else {
                    try {
                        let res = await axios.post('/login', {
                            email: email,
                            password: password
                        });

                        if (res.status == 200 && res.data['status'] == 'success') {
                            window.location.href = '/';
                        } else {
                            console.log(res.data['message']);
                        }
                    } catch (error) {
                        if (error.code === 'ECONNABORTED') {
                            console.error('Request timeout:', error.message);
                        } else if (error.response) {
                            console.error('Server responded with an error:', error.response.data);
                        } else {
                            console.error('Error:', error.message);
                        }
                    }
                }
            }
        </script>
    @endpush
@endsection
