<x-adminheader title="Profile Details"/>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row justify-content-center">
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-body">

            <!-- Title -->
            <p class="card-title mb-0 text-center">My Profile</p>

            <!-- Flash Messages -->
            @if(session('success'))
              <div class="mb-4 alert alert-success">
                  {{ session('success') }}
              </div>
            @elseif(session('error'))
              <div class="mb-4 alert alert-danger">
                  {{ session('error') }}
              </div>
            @endif

            <!-- Profile Picture -->
            <div class="text-center mb-4">
              <img src="{{ asset('uploads/profiles/' . $user->picture) }}"
                   onerror="this.onerror=null; this.src='{{ asset('images/default.jpg') }}';"
                   alt="{{ $user->fullname }}"
                   class="w-25 h-25 rounded-circle object-cover">
            </div>

            <!-- Profile Form -->
            <form method="POST" action="{{ route('updateUser') }}" enctype="multipart/form-data">
              @csrf

              <!-- Full Name -->
              <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" name="fullname" id="fullname" value="{{ old('fullname', $user->fullname) }}" 
                       class="form-control" placeholder="John Doe" required>
                @error('fullname')
                  <span class="text-danger small">{{ $message }}</span>
                @enderror
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" 
                       class="form-control bg-light text-muted" readonly>
              </div>

              <!-- New Password -->
              <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" id="password" 
                       class="form-control" placeholder="Enter new password" required>
                @error('password')
                  <span class="text-danger small">{{ $message }}</span>
                @enderror
              </div>

              <!-- Profile Picture Upload -->
              <div class="mb-3">
                <label for="file" class="form-label">Upload Profile Picture</label>
                <input type="file" name="file" id="file" accept="image/*" class="form-control">
                @error('file')
                  <span class="text-danger small">{{ $message }}</span>
                @enderror
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary w-100">
                Save Changes
              </button>
            </form>

          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
  <x-adminfooter />
</div>
