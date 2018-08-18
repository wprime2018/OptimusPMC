@extends('adminlte::page')

@section('title', 'OptimusRH')

@section('content_header')
    <h1>Dashboard Administrador</h1>
@stop

@section('content')
<div class="row">
    <div class="info-box bg-aqua col-md-6">
        <span class="info-box-icon"><i class="far fa-building"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">PMC</span>
            <span class="info-box-number">R$ 83.997,00</span>

            <div class="progress">
            <div class="progress-bar" style="width: 10%"></div>
            </div>
            <span class="progress-description">
                10,36% / 72 Colaboradores
                </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <div class="info-box bg-yellow col-md-6">
        <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Educação</span>
        <span class="info-box-number">R$ 345.672,55</span>

        <div class="progress">
            <div class="progress-bar" style="width: 43%"></div>
        </div>
        <span class="progress-description">
                43,63% / 324 Colaboradores
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<div class="row">
    <div class="info-box bg-green col-md-6">
        <span class="info-box-icon"><i class="far fa-hospital"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Saúde</span>
        <span class="info-box-number">R$ 356.731,18</span>

        <div class="progress">
            <div class="progress-bar" style="width: 44%"></div>
        </div>
        <span class="progress-description">
                43,99% / 169 Colaboradores
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
        
    <div class="info-box bg-red col-md-6">
        <span class="info-box-icon"><i class="fas fa-user-tie"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Assistência Social</span>
        <span class="info-box-number">R$ 24.507,60</span>

        <div class="progress">
            <div class="progress-bar" style="width: 3%"></div>
        </div>
        <span class="progress-description">
                3% / 24 Colaboradores
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>    
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Browser Usage</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-md-8">
            <div class="chart-responsive">
                <canvas id="chart-area" height="155" width="514" style="width: 514px; height: 155px;"></canvas>
            </div>
            <!-- ./chart-responsive -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
            <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle text-aqua"></i> PMC</li>
                <li><i class="fa fa-circle text-yellow"></i> Educação</li>
                <li><i class="fa fa-circle text-green"></i> Saúde</li>
                <li><i class="fa fa-circle text-red"></i> Assistência Social</li>
            </ul>
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer no-padding">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="#">PMC
                <span class="pull-right text-aqua"><i class="fa fa-angle-down"></i> 7%</span></a></li>
            <li><a href="#">Educação<span class="pull-right text-yellow"><i class="fa fa-angle-up"></i> 44%</span></a>
            </li>
            <li><a href="#">Saúde
                <span class="pull-right text-green"><i class="fa fa-angle-left"></i> 46%</span></a></li>
            <li><a href="#">Assistência Social
                    <span class="pull-right text-red"><i class="fa fa-angle-left"></i> 3%</span></a></li>
        </ul>
    </div>
    <!-- /.footer -->
    </div>
@stop


@section('js')
<script>
var doughnutData = [
        {
            value: 56,
            color:"blue",
            highlight: "aqua",
            label: "PMC"
        },
        {
            value: 230,
            color: 'orange',
            highlight: "orange",
            label: "Educação"
        },
        {
            value: 238,
            color: "green",
            highlight: "green",
            label: "Saúde"
        },
        {
            value: 16,
            color: "red",
            highlight: "red",
            label: "Ass.Social"
        },
    ];

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
    };
</script>
@stop