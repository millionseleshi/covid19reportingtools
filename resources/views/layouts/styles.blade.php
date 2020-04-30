<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token()}}">

<!-- Font Awesome -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!-- CSS -->
<link href="{{asset('adminLt/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('adminLt/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
      type="text/css">
<link href="{{asset('adminLt/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
      type="text/css">
<link href="{{asset('adminLt/dist/css/adminlte.min.css')}}" rel="stylesheet" type="text/css">

<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: white !important;
        border: 1px solid #2a21b9 !important;
        background-color: #285cb9 !important;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2980B9), color-stop(100%, #2980B9)) !important;
        background: -webkit-linear-gradient(top, #2980B9 0%, #2980B9 100%) !important;
        background: -moz-linear-gradient(top, #2980B9 0%, #2980B9 100%) !important;
        background: -ms-linear-gradient(top, #2980B9 0%, #2980B9 100%) !important;
        background: -o-linear-gradient(top, #2980B9 0%, #2980B9 100%) !important;
        background: linear-gradient(to bottom, #2980B9 0%, #2980B9 100%) !important;
    }
</style>

