@extends("Admin.Layouts.main")

@section("container")
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Edit Member</h4>
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
                        <form action="{{ url("member/" . $member->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama_lengkap"
                                    value="{{ @old("nama_lengkap", $member->nama_lengkap) }}">

                                @error("nama_lengkap")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ @old("alamat", $member->alamat) }}</textarea>
                                @error("alamat")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status">
                                    <option value="pelajar(siswa)" @selected($member->status == "pelajar(siswa)")>Pelajar (Siswa)</option>
                                    <option value="mahasiswa" @selected($member->status == "mahasiswa")>Mahasiswa</option>
                                    <option value="bekerja" @selected($member->status == "bekerja")>Bekerja
                                    </option>
                                    <option value="dll" @selected($member->status == "dll")>Dll</option>
                                </select>

                                @error("status")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_wa" class="form-label">Nomor WhatsApp</label>
                                <input type="tel" class="form-control" id="no_wa" name="no_wa"
                                    value="{{ @old("no_wa", $member->no_wa) }}" required>

                                @error("no_wa")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ @old("email", $member->email) }}">
                                @error("email")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control-file" onchange="previewImage()" id="image"
                                    name="foto">
                                <img id="img-preview" style="width: 250px;margin-top: 20px"
                                    src="{{ asset("file/" . $member->foto) }}" alt="Image Preview" class="img-fluid" />

                                @error("foto")
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
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');

            const imgPreview = document.querySelector('#img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
