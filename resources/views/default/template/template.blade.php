<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" size="76x76" href="{{asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" size="96x96" href="{{asset('assets/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{$title or 'Educação'}}</title>

    <script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js') }}"></script>
    <script type="text/javascript" src="{{asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    {{--<link href="assets/css/bootstrap.min.css" rel="stylesheet" />--}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}" />

    <!-- Animation library for notifications   -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css') }}" />

    <!--  Paper Dashboard core CSS    -->
    <link rel="stylesheet" href="{{asset('assets/css/paper-dashboard.css') }}" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css') }}" />



    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css') }}" />
    @yield('style')
</head>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    EDUCAÇÂO
                </a>
            </div>

            @yield('menu')
        </div>
     </div>

    @yield('content')

    @extends('default.template.footer')

<body>

<script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/chartist.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-notify.js') }}"></script>
<script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/paper-dashboard.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/demo.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'fa fa-phone',
            message: "Bem Vindo ao sistema de Educação - <b>Usuário</b> "

        },{
            type: 'success',
            timer: 4000
        });

    });
</script>


<script type="text/javascript">
    /*
     Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
     */
    $(document).ready(function(){
        $('.filterable .btn-filter').click(function(){
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e){
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function(){
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
        });
    });
</script>


</html>
