@extends('layouts.admin.cms')

@section('screen', 'Administrační rozhraní')
@section('page', 'základní nastavení')

@section('navlinks')
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('admin') }}"><i class="fas fa-sliders-h">&nbsp;</i>Administrace</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.log') }}"><i class="fas fa-history">&nbsp;</i>Záznamy</a>
    </li>
@endsection

@section('main')

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Area Chart Example</div>
            <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="myAreaChart" width="1182" height="354" class="chartjs-render-monitor" style="display: block; width: 1182px; height: 354px;"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-bar"></i>
                        Bar Chart Example</div>
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="myBarChart" width="764" height="382" class="chartjs-render-monitor" style="display: block; width: 764px; height: 382px;"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i>
                        Pie Chart Example</div>
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="myPieChart" width="346" height="346" class="chartjs-render-monitor" style="display: block; width: 346px; height: 346px;"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>

        <p class="small text-center text-muted my-5">
            <em>More chart examples coming soon...</em>
        </p>

@endsection
