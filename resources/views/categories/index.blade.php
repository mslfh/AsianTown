@extends('layouts.app')



@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
                <div class="section-header-button">
                    <a href="{{url('/product_category_item/create')}}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Category</a></div>
                    <div class="breadcrumb-item">All Items</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Category</h2>
                <p class="section-lead">
                    You can manage all categories.
                </p>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Product Category</h4>
                            </div>
                            <div class="card-body" style="font-size: large;">
                                <div id="treeview"></div>
                            </div>

                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button class="btn btn-primary mr-2" type="submit" id="addNode">Add New</button>
                                                    <button class="btn btn-danger mr-2" type="button"
                                                    id="deleteNode">Detele It
                                                    </button>
                                                </div>
                                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>

                         <!-- 模态对话框 -->
                    <div id="nodeModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">添加节点</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="nodeName">节点名称</label>
                                <input type="text" class="form-control" id="nodeName">
                            </div>
                            <div class="form-group">
                                <label for="nodeChineseName">中文名称（选填）</label>
                                <input type="text" class="form-control" id="nodeChineseName">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="saveNode">保存</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                        </div>
                        </div>
                    </div>
                    </div>

@endsection


@section('scripts')

<!-- 引入 jsTree 插件 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
<script>
    $(function () {

    var data = {!! json_encode($items) !!};
    var tree = $('#treeview').jstree({
    'plugins': ['types'],
    'core': {
        'data': data
    },
    'types': {
        'default': { 'icon': 'fa fa-folder' },  // 默认的图标
        'file': { 'icon': 'fa fa-file' }  // 文件节点的图标
    }
});

// 显示模态对话框
$('#addNode').click(function () {
    $('#nodeModal').modal('show');
});

// 保存节点
$('#saveNode').click(function () {
    var selectedNode = $('#treeview').jstree(true).get_selected(true);
    var nodeName = $('#nodeName').val();
    var nodeChineseName = $('#nodeChineseName').val();
    var parentNodeId = 0;  // 默认父节点ID为0

    // 如果有节点被选中，获取选中节点的ID
    if (selectedNode.length > 0) {
        parentNodeId = selectedNode[0].id;
    }

    // 如果节点名称存在
    if (nodeName) {
        $.post("{{url('/product_category_item')}}", { name: nodeName, chinese_name: nodeChineseName, pid: parentNodeId })
        .done(function(data) {
            // 添加成功后，重新获取所有的产品类别，并更新树形视图
            $.get("{{url('/getAllCategories')}}")
            .done(function(data) {
                $('#treeview').jstree(true).settings.core.data = data['items'];
                $('#treeview').jstree(true).refresh();
                $('#nodeModal').modal('hide');  // 隐藏模态对话框
            });
        });
    }
});

 // 删除节点
$('#deleteNode').click(function () {
    var selectedNode = $('#treeview').jstree(true).get_selected(true);
    if (selectedNode.length > 0) {
        var nodeId = selectedNode[0].id;  // 获取节点的 ID
        if (confirm('确定要删除这个节点吗？')) {
            $.ajax({
                url: "{{url('/product_category_item')}}/" + nodeId,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(result) {
                    // 删除成功后，重新获取所有的产品类别，并更新树形视图
                    $.get("{{url('/getAllCategories')}}")
                        .done(function(data) {
                            $('#treeview').jstree(true).settings.core.data = data['items'];
                            $('#treeview').jstree(true).refresh();
                        });
                }
            });
        }
    }
});
});
</script>
@endsection

