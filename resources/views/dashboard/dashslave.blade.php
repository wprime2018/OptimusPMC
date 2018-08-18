@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard {{$fundo}}</h1>
@stop

@section('content')
<div class="col-md-4">
    <p class="text-center">
        <strong>Cargos</strong>
    </p>

    <div class="progress-group">
        <span class="progress-text">Add Products to Cart</span>
        <span class="progress-number"><b>160</b>/200</span>

    <div class="progress sm">
        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
    </div>
    </div>
        <!-- /.progress-group -->
    <div class="progress-group">
        <span class="progress-text">Complete Purchase</span>
        <span class="progress-number"><b>310</b>/400</span>

    <div class="progress sm">
        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
    </div>
    </div>
        <!-- /.progress-group -->
    <div class="progress-group">
        <span class="progress-text">Visit Premium Page</span>
        <span class="progress-number"><b>480</b>/800</span>

        <div class="progress sm">
            <div class="progress-bar progress-bar-green" style="width: 80%"></div>
        </div>
    </div>
        <!-- /.progress-group -->
    <div class="progress-group">
        <span class="progress-text">Send Inquiries</span>
        <span class="progress-number"><b>250</b>/500</span>

        <div class="progress sm">
            <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
        </div>
    </div>
    <!-- /.progress-group -->
</div>
    
@stop