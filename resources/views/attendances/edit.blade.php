<!-- resources/views/attendances/edit.blade.php -->
@extends('layouts.master')

@section('title', 'Edit Attendance')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listAttendances') }}">Kehadiran</a></li>
                            <li class="breadcrumb-item active">Edit Kehadiran</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <h1 class="mt-5">Edit Kehadiran</h1>
                <form action="{{ route('updateAttendances', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="student_name">Nama Siswa <span class="text-danger">*</span></label>
                        <select name="student_name" id="student_name" class="form-control">
                            <option selected disabled>Pilih Nama Siswa</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ $student->id == $attendance->student_id ? 'selected' : '' }}>{{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Nomor Induk Siswa <span class="text-danger">*</span></label>
                        <select name="student_id" id="student_id" class="form-control">
                            <option selected disabled>Pilih Nomor Induk Siswa</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ $student->id == $attendance->student_id ? 'selected' : '' }}>
                                    {{ $student->student_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_class">Kelas <span class="text-danger">*</span></label>
                        <select name="student_class" id="student_class" class="form-control">
                            <option selected disabled>Pilih Kelas</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ $student->class == $attendance->student_class ? 'selected' : '' }}>
                                    {{ $student->class }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="date" id="date" value="{{ $attendance->date }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>Present
                            </option>
                            <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                            <option value="Late" {{ $attendance->status == 'Late' ? 'selected' : '' }}>Late</option>
                            <option value="Excused" {{ $attendance->status == 'Excused' ? 'selected' : '' }}>Excused
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('listAttendances') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
