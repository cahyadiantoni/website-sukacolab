@extends('template.main')
@section('title', 'Edit Project')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/project">Project</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/project" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/project/{{ $project->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Role Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name Project" value="{{old('name', $project->name)}}" required>
                                            @error('name')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name_project">Project / Company Name</label>
                                            <input type="text" name="name_project" class="form-control @error('name_project') is-invalid @enderror" id="name_project" placeholder="name_project" value="{{old('name_project', $project->name_project)}}" required>
                                            @error('name_project')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="location" value="{{old('location', $project->location)}}" required>
                                            @error('location')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tipe">Tipe</label>
                                            <select name="tipe" class="form-control @error('tipe') is-invalid @enderror" id="tipe" required>
                                                <option value="Lain Lain">Pilih Tipe</option>
                                                <option value="Loker" {{ old('tipe', $project->tipe) == 'Loker' ? 'selected' : '' }}>Loker</option>
                                                <option value="Portofolio" {{ old('tipe', $project->tipe) == 'Portofolio' ? 'selected' : '' }}>Portofolio</option>
                                                <option value="Lomba" {{ old('tipe', $project->tipe) == 'Lomba' ? 'selected' : '' }}>Lomba</option>
                                                <option value="Lain Lain" {{ old('tipe', $project->tipe) == 'Lain Lain' ? 'selected' : '' }}>Lain Lain</option>
                                            </select>
                                            @error('tipe')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="salary">Salary (Jt)</label>
                                            <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" placeholder="salary" value="{{old('salary', $project->salary)}}" required>
                                            @error('salary')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="working_time">Working Time (hours/day)</label>
                                            <input type="number" name="working_time" class="form-control @error('working_time') is-invalid @enderror" id="working_time" placeholder="working_time" value="{{old('working_time', $project->working_time)}}" required>
                                            @error('working_time')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="10" rows="5" placeholder="description">{{old('description', $project->description)}}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="requirements">Requirements</label>
                                            <textarea name="requirements" id="requirements" class="form-control @error('requirements') is-invalid @enderror" cols="10" rows="5" placeholder="requirements">{{old('requirements', $project->requirements)}}</textarea>
                                            @error('requirements')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                                    Reset</button>
                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                    Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>

@endsection