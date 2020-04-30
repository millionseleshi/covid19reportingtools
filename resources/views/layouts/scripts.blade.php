<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
{{--<script src="{{asset('adminLt/plugins/jquery/jquery-3.5.0.slim.min.js')}}" type="application/javascript"></script>--}}

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
<script src="{{asset('adminLt/plugins/jquery/jquery.min.js')}}" type="application/javascript"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLt/plugins/bootstrap/js/bootstrap.min.js')}}" type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/bootstrap/js/bootstrap.bundle.min.js')}}" type="application/javascript"></script>

{{--DataTable--}}
<script src="{{asset('adminLt/plugins/datatables/jquery.dataTables.min.js')}}" type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"
        type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"
        type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/datatables-buttons/js/dataTables.buttons.min.js/')}}"
        type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/jszip/jszip.min.js')}}" type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/datatables-buttons/js/buttons.flash.min.js')}}"
        type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/pdfmake/pdfmake.min.js')}}" type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/pdfmake/vfs_fonts.js')}}" type="application/javascript"></script>
<script src="{{asset('adminLt/plugins/datatables-buttons/js/buttons.html5.min.js')}}"
        type="application/javascript"></script>

{{--Moment js--}}
<script src="{{asset('adminLt/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminLt/plugins/moment/moment-with-locales.min.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('adminLt/plugins/chartjs/Chart.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('adminLt/dist/js/adminlte.min.js')}}" type="application/javascript"></script>

<script>

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = "{{route('NewCaseReportMonthGraph')}}";
        $.ajax(
            {
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $(document).ready(function () {
                        console.log(data);
                        var areaChartData = {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                            datasets:
                                [{
                                    label: 'New Case Monthly Count',
                                    backgroundColor: 'rgba(60,141,188,0.9)',
                                    borderColor: 'rgba(60,141,188,0.8)',
                                    pointRadius: false,
                                    pointColor: '#3b8bba',
                                    pointStrokeColor: 'rgba(60,141,188,1)',
                                    pointHighlightFill: '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data: [data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11], data[12]]
                                }]
                        };
                        var barChartCanvas = $('#newCaseByMonthBarChart').get(0).getContext('2d');
                        var barChartData = jQuery.extend(true, {}, areaChartData);
                        var temp0 = areaChartData.datasets[0];
                        barChartData.datasets[0] = temp0;

                        var barChartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            datasetFill: false
                        };

                        var barChart = new Chart(barChartCanvas, {
                            type: 'bar',
                            data: barChartData,
                            options: barChartOptions
                        })
                    })
                }
            }
        );

        var url = "{{route('NewCaseReportDayGraph')}}";
        $.ajax(
            {
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $(document).ready(function () {
                        console.log(data);
                        var areaChartData = {
                            labels: Array.from({length: 31}, (v, k) => k + 1),
                            datasets:
                                [{
                                    label: 'New Case Daily Count',
                                    backgroundColor: 'rgba(139,188,45,0.9)',
                                    borderColor: 'rgba(188,95,99,0.8)',
                                    pointRadius: false,
                                    pointColor: '#3b8bba',
                                    pointStrokeColor: 'rgba(60,141,188,1)',
                                    pointHighlightFill: '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data: [data[1], data[2], data[3], data[4], data[5], data[6],
                                        data[7], data[8], data[9], data[10], data[11], data[12],
                                        data[13], data[14], data[15], data[16], data[17], data[18],
                                        data[19], data[20], data[21], data[22], data[23], data[24],
                                        data[25], data[26], data[27], data[28], data[29], data[30], data[31],
                                    ]
                                }]
                        };
                        var barChartCanvas = $('#newCaseByDayBarChart').get(0).getContext('2d');
                        var barChartData = jQuery.extend(true, {}, areaChartData);
                        var temp0 = areaChartData.datasets[0];
                        barChartData.datasets[0] = temp0;

                        var barChartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            datasetFill: false
                        };

                        var barChart = new Chart(barChartCanvas, {
                            type: 'bar',
                            data: barChartData,
                            options: barChartOptions
                        })
                    })
                }
            }
        );

        var url = "{{route('FatalityReportMonthGraph')}}";
        $.ajax(
            {
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $(document).ready(function () {
                        console.log(data);
                        var areaChartData = {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                            datasets:
                                [{
                                    label: 'Fatality Monthly Count',
                                    backgroundColor: 'rgba(188,4,21,0.9)',
                                    borderColor: 'rgba(60,141,188,0.8)',
                                    pointRadius: false,
                                    pointColor: '#3b8bba',
                                    pointStrokeColor: 'rgba(60,141,188,1)',
                                    pointHighlightFill: '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data: [data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11], data[12]]
                                }]
                        };
                        var barChartCanvas = $('#fatalityByMonthBarChart').get(0).getContext('2d');
                        var barChartData = jQuery.extend(true, {}, areaChartData);
                        var temp0 = areaChartData.datasets[0];
                        barChartData.datasets[0] = temp0;

                        var barChartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            datasetFill: false
                        };

                        var barChart = new Chart(barChartCanvas, {
                            type: 'bar',
                            data: barChartData,
                            options: barChartOptions
                        })
                    })
                }
            }
        );

        var url = "{{route('FatalityReportDayGraph')}}";
        $.ajax(
            {
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $(document).ready(function () {
                        console.log(data);
                        var areaChartData = {
                            labels: Array.from({length: 31}, (v, k) => k + 1),
                            datasets:
                                [{
                                    label: 'Fatality Dayliy Count',
                                    backgroundColor: 'rgba(188,4,21,0.9)',
                                    borderColor: 'rgba(60,141,188,0.8)',
                                    pointRadius: false,
                                    pointColor: '#3b8bba',
                                    pointStrokeColor: 'rgba(60,141,188,1)',
                                    pointHighlightFill: '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data: [data[1], data[2], data[3], data[4], data[5], data[6],
                                        data[7], data[8], data[9], data[10], data[11], data[12],
                                        data[13], data[14], data[15], data[16], data[17], data[18],
                                        data[19], data[20], data[21], data[22], data[23], data[24],
                                        data[25], data[26], data[27], data[28], data[29], data[30], data[31],
                                    ]
                                }]
                        };
                        var barChartCanvas = $('#fatalityByDayBarChart').get(0).getContext('2d');
                        var barChartData = jQuery.extend(true, {}, areaChartData);
                        var temp0 = areaChartData.datasets[0];
                        barChartData.datasets[0] = temp0;

                        var barChartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            datasetFill: false
                        };

                        var barChart = new Chart(barChartCanvas, {
                            type: 'bar',
                            data: barChartData,
                            options: barChartOptions
                        })
                    })
                }
            }
        );

        $('#today_report').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Daily Report',
                    className: 'btn btn-outline-info',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Daily Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Daily Report',
                    className: 'btn btn-outline-primary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Daily Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Daily Report',
                    className: 'btn btn-outline-secondary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Daily Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
            ]
        });

        $('#all_daily_report').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Reports',
                    className: 'btn btn-outline-info',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Report',
                    className: 'btn btn-outline-primary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Daily Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Report',
                    className: 'btn btn-outline-secondary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
            ]
        });

        $('#user_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' managers',
                    className: 'btn btn-outline-info',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' managers',
                },
                {
                    extend: 'pdfHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' managers',
                    className: 'btn btn-outline-primary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' managers',
                },
                {
                    extend: 'csvHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' managers',
                    className: 'btn btn-outline-secondary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' managers',
                },
            ]
        });

        $('#control_node_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Control node',
                    className: 'btn btn-outline-info',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Control node',
                },
                {
                    extend: 'pdfHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Control node',
                    className: 'btn btn-outline-primary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Control node',
                },
                {
                    extend: 'csvHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Control node',
                    className: 'btn btn-outline-secondary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Control node',
                },
            ]
        });

        $('#sent_report_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Sent Report',
                    className: 'btn btn-outline-info',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Sent Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Sent Report',
                    className: 'btn btn-outline-primary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Sent Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: moment(moment.now()).format("DD-MM-YYYY") + ' Sent Report',
                    className: 'btn btn-outline-secondary',
                    messageTop: moment(moment.now()).format("DD-MM-YYYY") + ' Sent Report',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
            ]
        });

        $('#users_list_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Users List',
                    className: 'btn btn-outline-info',
                    messageTop: 'Node Managers List',
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Users List',
                    className: 'btn btn-outline-primary',
                    messageTop: 'Node Managers List',
                },
                {
                    extend: 'csvHtml5',
                    title: 'Users List',
                    className: 'btn btn-outline-secondary',
                    messageTop: 'Node Managers List',
                },
            ]
        });

        $('#setEditModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);

            var reportId = button.data("reportid");
            var newCaseCount = button.data("newcasecount");
            var fatalityCount = button.data("fatalitycount");
            var summary = button.data("summary");

            var model = $(this);

            model.find('.modal-body  #new_case_count').val(newCaseCount);
            model.find('.modal-body  #fatality_count').val(fatalityCount);
            model.find('.modal-body  #summary').val(summary);
            model.find('.modal-body  #report_id').val(reportId)
        });


    });
</script>
