@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/modules/fullcalendar/fullcalendar.min.css') }}">
@endsection

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Calendar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">Calendar</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Calendar</h2>
                <p class="section-lead">
                    We use 'Full Calendar' made by @fullcalendar. You can check the full documentation <a href="https://fullcalendar.io/">here</a>.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Calendar</h4>
                            </div>
                            <div class="card-body" >
                                <div class="fc-overflow" style="width:80%; height:80%">
                                    <div id="myEvent"></div>
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

  <!-- JS Libraies -->
  <script src="assets/modules/fullcalendar/fullcalendar.min.js"></script>

  <!-- Page Specific JS File -->
	<script src="assets/js/page/modules-calendar.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('myEvent');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                minTime: "08:00:00", // 设置日历的最小时间为 8am
                maxTime: "12:00:00", // 设置日历的最大时间为 12pm
                events: [
                    {
                        title: 'My Event',
                        start: '2022-05-01T09:00:00', // 设置事件开始时间为 9am
                        end: '2022-05-01T10:00:00', // 设置事件结束时间为 10am
                    }
                ]
            });

            calendar.render();
        });
    </script>

@endsection

