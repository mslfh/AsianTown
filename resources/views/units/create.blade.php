@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Units</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Units</a></div>
                    <div class="breadcrumb-item">Create New Units</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create New Units</h2>
                <p class="section-lead">
                    On this page you can create a new product unit and fill in all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write Your Units</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ url('/units') }}">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group row mb-4">
                                                <label for="preview"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3" style="color: #c8742a;">
                                                    PREVIEW</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <p id="preview"
                                                       style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;"></p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="title"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">*
                                                    Title</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           placeholder="exp: box(*24)" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="chinese_title"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Chinese
                                                    Title</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" id="chinese_title"
                                                           name="chinese_title" placeholder="如：整箱（*24瓶）">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="item_specs"
                                                       class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item
                                                    Specs</label>
                                                <div class="col-sm-12 col-md-7 input-group">
                                                    <input type="number" step="1" min="1" class="form-control"
                                                           id="item_specs" name="item_specs" value="1" required>
                                                    <select class="custom-select" id="unit" name="unit">
                                                        <option selected value="ml">ml</option>
                                                        <option value="g">g</option>
                                                        <option value="kg">kg</option>
                                                        <option value="l">l</option>
                                                    </select>
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
    <script>
        // 获取所有需要的元素
        var titleInput = document.getElementById('title');
        var itemSpecsInput = document.getElementById('item_specs');
        var unitSelect = document.getElementById('unit');
        var chineseTitleInput = document.getElementById('chinese_title');
        var previewInput = document.getElementById('preview');

        // 创建一个函数来更新 "Preview" 的文本内容
        function updatePreview() {
            var title = titleInput.value;
            var itemSpecs = itemSpecsInput.value || '';
            var unit = unitSelect.options[unitSelect.selectedIndex].text || '';
            var chineseTitle = chineseTitleInput.value || '';

            // 如果 "Title" 输入框没有值，那么不显示任何内容
            if (!title) {
                previewInput.textContent = 'Wait for input...';
                return;
            }

            // 设置 "Preview" 的文本内容
            previewInput.textContent = title + ' - ' + itemSpecs + ' ' + unit + ' 【' + chineseTitle + '】';
        }

        // 监听用户的输入事件
        titleInput.addEventListener('input', updatePreview);
        itemSpecsInput.addEventListener('input', updatePreview);
        unitSelect.addEventListener('change', updatePreview);
        chineseTitleInput.addEventListener('input', updatePreview);

        // 初始化 "Preview" 的文本内容
        updatePreview();
    </script>
@endsection
