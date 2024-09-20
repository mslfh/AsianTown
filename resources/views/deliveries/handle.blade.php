@extends('layouts.app')

@section('style')
    <style>
        .completed {
            text-decoration: line-through;
        }
        @media (max-width: 768px) {
            .table-cell {
                font-size: 14px;
                margin-bottom: 10px;
            }
        }
    </style>
@endsection


@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Handle</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">Handle</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Handle</h2>
                <p class="section-lead">
                    We use Handle. You can check the full documentation <a href="https://fullcalendar.io/">here</a>.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Handle</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col" data-label="Task Name">Task Name</th>
                                            <th scope="col" data-label="Progress">Progress</th>
                                            <th scope="col" data-label="Status">Status</th>
                                            <th scope="col" data-label="Action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($records['delivery_details'] as $detail)
                                            <tr>
                                                <td data-label="Task Name">{{ $detail['purchaserName'] }}</td>
                                                <td data-label="Progress">
                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                        <div class="progress-bar bg-success" data-width="100"></div>
                                                    </div>
                                                </td>
                                                <td data-label="Status">
                                                    <div class="badge badge-success">Completed</div>
                                                </td>
                                                <td data-label="Action"><a href="#" class="btn btn-secondary detail-btn">Detail</a></td>
                                            </tr>
                                            <tr class="product-list" style="display: none;">
                                                <td colspan="4">
                                                    <ul>
                                                        @foreach($detail['productList'] as $product)
                                                            <li>
                                                                {{ $product['productName'] }} - {{ $product['number'] }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <button class="btn btn-secondary hide-btn">Hide</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    document.querySelectorAll('.detail-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            var todoList = this.parentNode.parentNode.nextElementSibling;
            todoList.style.display = 'table-row';
        });
    });

    document.querySelectorAll('.hide-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            var todoList = this.parentNode.parentNode;
            todoList.style.display = 'none';
        });
    });
</script>
@endsection

