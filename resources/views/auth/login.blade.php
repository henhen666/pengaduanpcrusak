<div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Welcome back!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" method="post" action="{{ url('login') }}">
                @csrf
                <div class="modal-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('failed') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Enter Email Address...">
                        @error('email')
                            <div class="invalid-feedback pl-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control form-control-user @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        @error('password')
                            <div class="invalid-feedback pl-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                    <div class="text-center mt-3">
                        <a class="small" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Create an account
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit"> Login</button>
                </div>
            </form>
            <div class="collapse" id="collapseExample">
                <div class="modal-body">
                    <div class="card card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" autocomplete="off" action="{{ url('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    id="exampleFirstName" placeholder="Full Name" name="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback pl-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    name="email" id="exampleInputEmail" placeholder="Email Address"
                                    value={{ old('email') }}>
                                @error('email')
                                    <div class="invalid-feedback pl-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="exampleInputPassword" name="password" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback pl-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type='submit' class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
