<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="/">Lingyun Temple<span>.</span></a></h1>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="/#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="/#tabs">About</a></li>
                <li><a class="nav-link scrollto" href="/#gallery">Gallery</a></li>
                <li><a class="nav-link scrollto" href="/#testimonials">Events</a></li>
                <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
                <li><a class="nav-link scrollto" href="/prayer">Prayer</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="?lang=en">English</a></li>
                        <li><a class="dropdown-item" href="?lang=zh">中文</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        @guest
            <a class="get-started-btn scrollto" data-bs-toggle="modal" data-bs-target="#authModal">Login</a>
        @elseif(auth()->user()->is_admin)
            <nav id="navbar" class="navbar ">
                <li class="nav-item dropdown px-3" style="list-style-type: none;">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle px-1"> </i>Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </nav>
        @else
            <nav id="navbar" class="navbar ">
                <li class="nav-item dropdown px-3" style="list-style-type: none;">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle px-1"> </i>Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </nav>
        @endguest
    </div>
</header>



<!-- Authentication Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tab navs -->
                <ul class="nav nav-tabs mb-3" id="authTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                    </li>
                </ul>
                <div class="tab-content" id="authTabContent">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <div id="loginAlert" class="alert alert-danger d-none" role="alert">
                                    This is a danger alert—check it out!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="emailLogin" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="emailLogin" name="email" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="passwordLogin" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordLogin" name="password" required>
                            </div>
                            <div class="mb-3">
                                <p>Don't have an account? <a href="#" id="registerLink" style="color:grey">Register here</a></p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('password.request') }}" style="color:grey">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" id="registrationForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="surnameRegister" class="form-label">姓 Surname</label>
                                    <input type="text" class="form-control" id="surnameRegister" name="surname" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="givenNameRegister" class="form-label">名 Given Name</label>
                                    <input type="text" class="form-control" id="givenNameRegister" name="givenName" required>
                                </div>
                                <div class="col-12">
                                    <label for="emailRegister" class="form-label">电邮 Email</label>
                                    <input type="email" class="form-control" id="emailRegister" name="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="addressRegister" class="form-label">地址 Address</label>
                                    <input type="text" class="form-control" id="addressRegister" name="address" required>
                                </div>
                                <div class="col-12">
                                    <label for="contactRegister" class="form-label">联系电话 Contact Number</label>
                                    <input type="text" class="form-control" id="contactRegister" name="contact" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="passwordRegister" class="form-label">密码 Password</label>
                                    <input type="password" class="form-control" id="passwordRegister" name="password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="passwordConfirmationRegister" class="form-label">确认密码 Confirm Password</label>
                                    <input type="password" class="form-control" id="passwordConfirmationRegister" name="password_confirmation" required>
                                </div>
                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('registerLink').addEventListener('click', function(e) {
            e.preventDefault();

            var registerTab = new bootstrap.Tab(document.getElementById('register-tab'));
            var authModal = bootstrap.Modal.getInstance(document.getElementById('authModal'));
            authModal.hide();

            authModal._element.addEventListener('hidden.bs.modal', function onModalHidden() {
                authModal.show();
                registerTab.show();
                authModal._element.removeEventListener('hidden.bs.modal', onModalHidden);
            });
        });
    });


    function displayErrors(form, errors) {
        console.log(errors);
        // Clear previous errors
        form.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
            el.nextElementSibling?.remove();
        });

        // Display new errors
        for (const [field, messages] of Object.entries(errors)) {
            const input = form.querySelector(`[name="${field}"]`);
            input.classList.add('is-invalid');
            const errorText = document.createElement('div');
            errorText.className = 'invalid-feedback';
            errorText.innerText = messages.join(' ');
            input.parentNode.insertBefore(errorText, input.nextSibling);
        }
    }



    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        const form = this;
        const formData = new FormData(form);

        fetch('/login', { // Adjust this URL to your login route
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            if (!response.ok) {
                if (response.status === 401) {
                    // Handle unauthorized access
                    response.json().then(data => {
                        const message = data.message || 'Invalid credentials, please try again.';
                        // Use the Bootstrap alert div to display this message
                        const loginAlert = document.getElementById('loginAlert');
                        loginAlert.textContent = message;
                        loginAlert.classList.remove('d-none'); // Show the alert div
                    });
                } else {
                    throw response;
                }
            } else {
                return response.json();
            }
        })
        .then(data => {
            if (data && data.success) {
                // Login was successful
                alert('Login successful');
                location.reload(); // or redirect to the dashboard or intended page
            }
        })
        .catch(errorResponse => {
            console.error('Fetch error:', errorResponse);
        });
    });




    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);

        fetch('/register', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('User has been registered');
                window.location.href = '/';
            } else {
                // Handle errors
                displayErrors(form, data.errors);
            }
        })
        .catch(errorResponse => {
            errorResponse.json().then(errorData => {
                // Display error messages
                displayErrors(form, errorData.errors);
            });
        });
    });
</script>
