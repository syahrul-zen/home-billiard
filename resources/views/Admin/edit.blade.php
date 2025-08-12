@extends("Admin.Layouts.main")

@section("container")
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                @if (session()->has("success"))
                    <div class="alert alert-success" role="alert">
                        {{ session("success") }}
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Edit Admin</h4>
                    </div>

                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <div class="card-body">
                        <form action="{{ url("edit-admin/" . $admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="name"
                                    value="{{ @old("name", $admin->name) }}">

                                @error("name")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ @old("email", $admin->email) }}">
                                @error("email")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                                @error("password")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid mt-4 gap-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div @endsection
