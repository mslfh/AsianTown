@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Units and Specs </h1>
                <div class="section-header-button">
                    <a href="{{url('/units/create')}}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Units and Specs</a></div>
                    <div class="breadcrumb-item">All Items</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Units and Specs</h2>
                <p class="section-lead">
                    You can manage all units and specs.
                </p>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Units and Specs</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Remark</th>
                                            <th>Delivery Date</th>
                                            <th>Created At</th>
                                        </tr>
                                        @foreach($deliveryRecords as $index => $unit)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$unit['title']??'-'}}</td>
                                            <td>{{$unit['status']}}</td>
                                            <td>{{$unit['remark']}}</td>
                                            <td>{{$unit['delivery_date']}}</td>
                                            <td>{{$unit['created_at']}}</td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            <td><a href="#" class="btn btn-secondary">Handle</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
