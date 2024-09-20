@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url('/purchasers') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Purchaser</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Purchasers</a></div>
                    <div class="breadcrumb-item">Create New Purchaser</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create New Purchaser</h2>
                <p class="section-lead">
                    On this page you can create a new purchaser and fill in all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write New Purchaser</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ url('/purchasers') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group row mb-4">
                                                <label for="name"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">*
                                                    Name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           placeholder="Enter name" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="user_id"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User ID</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control" id="user_id" name="user_id">
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="phone"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="phone"
                                                           name="phone" placeholder="Enter phone number">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="address"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="address"
                                                           name="address" placeholder="Enter address">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="remark"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Remark</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="remark"
                                                           name="remark" placeholder="Enter remark">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button class="btn btn-primary mr-2" type="submit">Submit</button>
                                                    <button class="btn btn-light" type="button"
                                                            onclick="window.history.back();">Cancel
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
