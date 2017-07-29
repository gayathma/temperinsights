@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="weekly_retention"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        Highcharts.chart('weekly_retention', {

            title: {
                text: 'Onboarding Weekly Retention Curve'
            },
            yAxis: {
                title: {
                    text: 'Percentage of Users'
                }
            },
            xAxis: {
                title: {
                    text: 'Step in Onboarding'
                },
                categories: [
                    'Create account - 0%',
                    'Activate account - 20%',
                    'Provide profile information - 40%',
                    'What jobs are you interested in? - 50%',
                    'Do you have relevant experience in these jobs? - 70%',
                    'Are you freelancer? - 90%',
                    'Waiting for approval - 99%',
                    'Approval - 100%']
            },
            credits: {
                enabled: false
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    pointStart: 0
                }
            },

            series:<?php echo $weekly_retention_data;?>

        });
    </script>
@endsection