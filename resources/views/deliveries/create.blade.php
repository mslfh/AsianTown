@extends('layouts.app')



@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <style>
        .custom-width-10 {
            width: 10%;
        }

        .custom-width-60 {
            width: 60%;
        }

        .custom-width-70 {
            width: 70%;
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Delivery</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">Delivery</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Event</h2>
                <p class="section-lead">
                    <!-- We use 'Full Calendar' made by @fullcalendar. You can check the full documentation <a href="https://fullcalendar.io/">here</a>. -->
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Event</h4>
                            </div>
                            <div class="card-body">


                            <form id="deliveryForm" method="POST" action="{{url('/deliveries')}}">


                                <div id="eventList">
                                    <div class="event d-flex align-items-center mb-2">
                                        <i class="fas fa-th handle mr-2"></i>

                                        <select id="purchaser0" name="purchaser"
                                                class="form-control mr-2 chosen-select custom-width-10">
                                            <option value="">选择商家</option>
                                            @foreach($purchasers  as $purchaser)
                                                <option value="{{$purchaser['id']}}">{{$purchaser['name']}}</option>
                                            @endforeach
                                        </select>

                                        <div id="productEventList0" class="ml-4 custom-width-60 bg-light rounded">
                                            <div class="event d-flex align-items-center mb-2">
                                                <i class="fas fa-th handle mr-2"></i>

                                                <select id="product0" name="product"
                                                        class="form-control mr-2 chosen-select custom-width-70">
                                                    <option value="">选择商品</option>
                                                    @foreach($products  as $product)
                                                        <option
                                                            value="{{$product['id']}}">{{$product['main_name']."【".$product['chinese_name'].'】'.'-'.$product['unit']}}</option>
                                                    @endforeach
                                                </select>

                                                <input type="number" name="quantity"
                                                       class="form-control mr-2 custom-width-10"
                                                       placeholder="Number" min="1" value="1">


                                                <button class="deleteProduct btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>


                                        </div>
                                        <button id="addProduct0" class="btn btn-light">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <div class="custom-width-10"></div>
                                        <button class="deleteEvent btn btn-danger">删除商家</button>
                                    </div>

                                </div>
                                <button id="addMerchant" class="btn btn-primary">添加商家</button>
                                <button type="submit" class="btn btn-success">提交</button>
                                <button type="button" class="btn btn-danger" onclick="window.history.back();">取消</button>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

    <script>
        // 初始化 Chosen
        $(".chosen-select").chosen({
            no_results_text: "没有找到结果",
        });

         // 使 eventList 可拖动
         $("#eventList").sortable({
                handle: '.handle',
                axis: 'y'
            });

        $(function () {
            var merchantId = 1;
            var productId = 1;
            // 添加商家
            $("#addMerchant").click(function () {
                event.preventDefault();
                merchantId++;
                var merchantForm = `
            <div class="event d-flex align-items-center mb-2">
                <i class="fas fa-th handle mr-2"></i>

                <select id="purchaser${merchantId}" name="purchaser" class="form-control mr-2 chosen-select custom-width-10">
                    <option value="">选择商家</option>
                    @foreach($purchasers  as $purchaser)
                <option value="{{$purchaser['id']}}">{{$purchaser['name']}}</option>
                    @endforeach
                </select>

                <div id="productEventList${merchantId}" class="ml-4 custom-width-60 bg-light rounded">
                    <div class="event d-flex align-items-center mb-2">
                        <i class="fas fa-th handle mr-2"></i>

                        <select id="product${merchantId}" name="product" class="form-control mr-2 chosen-select custom-width-70">
                            <option value="">选择商品</option>
                            @foreach($products  as $product)
                <option value="{{$product['id']}}">{{$product['main_name']."【".$product['chinese_name'].'】'.'-'.$product['unit']}}</option>
                            @endforeach
                </select>

                <input type="number" name="quantity" class="form-control mr-2 custom-width-10"
                       placeholder="Number" min="1" value="1">

                <button class="deleteProduct btn btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        <button id="addProduct${merchantId}" class="btn btn-light">
                    <i class="fas fa-plus"></i>
                </button>
                <div class="custom-width-10" ></div>
                <button class="deleteEvent btn btn-danger">删除商家</button>
            </div>
            `;
                // 添加到事件列表
                $("#eventList").append(merchantForm);

                // 初始化新添加的 chosen-select
                $("#purchaser" + merchantId).chosen({
                    no_results_text: "没有找到结果",
                });
                $("#product" + merchantId).chosen({
                    no_results_text: "没有找到结果",
                });
            });

        // 添加商品
            $(document).on('click', '[id^="addProduct"]', function () {
                event.preventDefault();
                productId++;
                var productForm = `
<div class="event d-flex align-items-center mb-2">
                        <i class="fas fa-th handle mr-2"></i>

                        <select id="product${merchantId}" name="product" class="form-control mr-2 chosen-select custom-width-70">
                            <option value="">选择商品</option>
                            @foreach($products  as $product)
                <option value="{{$product['id']}}">{{$product['main_name']."【".$product['chinese_name'].'】'.'-'.$product['unit']}}</option>
                            @endforeach
                </select>

                <input type="number" name="quantity" class="form-control mr-2 custom-width-10"
                       placeholder="Number" min="1" value="1">

                <button class="deleteProduct btn btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
`;
    // 添加到事件列表
    var merchantId = $(this).attr('id').replace('addProduct', '');
        $("#productEventList" + merchantId).append(productForm);

        // 重新初始化所有的 chosen-select
    $(".chosen-select").chosen('destroy').chosen({
        no_results_text: "没有找到结果",
    });

    });

    // 删除商家
    $(document).on('click', '.deleteEvent', function () {
        $(this).parent().remove();
    });

    // 删除商品
    $(document).on('click', '.deleteProduct', function () {
        $(this).parent().remove();
    });


// 提交表单时，收集所有选择的采购商和商品的信息
$("#deliveryForm").submit(function (event) {
    event.preventDefault();

    var data = [];
    $("#eventList .event").each(function () {
        var purchaserId = $(this).find('select[name="purchaser"]').val();
        if (!purchaserId) {
            return true; // 如果没有 purchaserId，跳过这个 event 元素
        }
        var purchaserName = $(this).find('select[name="purchaser"] option:selected').text();
        var products = [];
        $(this).find('select[name="product"]').each(function () {
            var product = $(this).val();
            var productName = $(this).find('option:selected').text();
            var productNumber = $(this).parent().find('input[name="quantity"]').val();
            products.push({
                productId: product,
                productName: productName,
                number: productNumber
            });
        });
        data.push({
            purchaserId: purchaserId,
            purchaserName: purchaserName,
            products: products
        });
    });

    $.post("{{url('/deliveries')}}", {data: data})
    .done(function (response) {
        if(response.message) {
            alert(response.message);
            window.location.href = "{{url('/deliveries')}}";
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert("请求失败: " + textStatus + ", " + errorThrown);
    });
});

});
</script>
@endsection
