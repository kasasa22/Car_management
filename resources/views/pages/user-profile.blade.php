<!-- resources/views/pages/user-profile.blade.php -->

@include("components.header")

<body>

    @include("components.topnav")
    @include("components.sidebar")

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Profile Details</h5>

                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/img/default-avatar.png') }}" alt="Profile" class="rounded-circle" width="150">
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Full Name</div>
                        <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Role</div>
                        <div class="col-lg-9 col-md-8">{{ ucfirst($user->role) }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Joined</div>
                        <div class="col-lg-9 col-md-8">{{ $user->created_at->format('F d, Y') }}</div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('user.edit-profile') }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit Profile</a>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
