@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Product</a></div>
                    <div class="breadcrumb-item">Create New Product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create New Product</h2>
                <p class="section-lead">
                    On this page you can create a new product and fill in all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write Your Product</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/products') }}">


                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row mb-4">
                                                <label for="main_name"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">*
                                                    Main Name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="main_name"
                                                           name="main_name" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="chinese_name"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Chinese
                                                    Name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="chinese_name"
                                                           name="chinese_name">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="chinese_name"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short
                                                    Name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="short_name"
                                                           name="short_name">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="barcode"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Barcode</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="barcode" name="barcode">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="category"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control" id="category" name="category"></select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="unit"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Unit
                                                    & Specs</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input list="units" class="form-control" id="unit" name="unit">
                                                    <input type="hidden" id="unit_id" name="unit_id">
                                                    <datalist id="units">
                                                    @foreach( $units as $unit)
                                                        <!-- 在这里添加预定义的单位选项 -->
                                                            <option
                                                                value=" {{$unit['title']." - ". $unit['norm'].' 【 '. $unit['chinese_title'].' 】'}}">
                                                                <!-- 用户可以在这里输入新的单位 -->
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="type"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control" id="type" name="type" required>
                                                        <option value="3" selected> Store & Warehouse</option>
                                                        <option value="2"> Store</option>
                                                        <option value="1">Warehouse</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="cost_price" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cost Price</label>
                                                <div class="input-group col-sm-12 col-md-7">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            $
                                                        </div>
                                                    </div>
                                                    <input type="number" step="1" min="0.01" class="form-control currency" id="cost_price" name="cost_price" value="0.00" required>
                                                </div>
                                                <div class="col-sm-12 col-md-7 offset-md-3">
                                                    <small class="form-text text-muted">0.00 - no cost price</small>
                                                </div>
                                            </div>


                                        <div class="form-group row mb-4">
                                            <label for="basic_price" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Default Price</label>
                                            <div class="input-group col-sm-12 col-md-7">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        $
                                                    </div>
                                                </div>
                                                <input type="number" step="1" min="0.01" class="form-control currency" id="basic_price" name="basic_price" value="0.00" required>
                                            </div>
                                            <div class="col-sm-12 col-md-7 offset-md-3">
                                                <small class="form-text text-muted">0.00 - no default price</small>
                                            </div>
                                        </div>



                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">For
                                                    Sale</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                               id="active" value="1" checked>
                                                        <label class="form-check-label" for="active">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                               id="inactive" value="0">
                                                        <label class="form-check-label" for="inactive">No</label>
                                                    </div>
                                                    <small class="form-text text-muted">Yes - Directly sell the
                                                        product</small>
                                                    <small class="form-text text-muted">No- Keep it as draft</small>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div id="image-preview" class="image-preview">
                                                        <label for="image-upload" id="image-label">Choose File</label>
                                                        <input type="file" name="image" id="image-upload"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="description"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea class="form-control" id="description"
                                                              name="description"></textarea>
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

@section('scripts')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        var data = {!! json_encode($select2_categories) !!};

        $(document).ready(function () {
            $('#category').select2({
                data: data,
                selectOnClose: true,
                minimumResultsForSearch: Infinity
            });
        });
    </script>
@endsection
