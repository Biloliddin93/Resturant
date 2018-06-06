<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Smart cafe</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ URL("css/lib/bootstrap/bootstrap.min.css") }}">
    <style>
        body {
            background: rgb(204,204,204);
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }
        page[size="A4"][layout="portrait"] {
            width: 29.7cm;
            height: 21cm;
        }
        page[size="A3"] {
            width: 29.7cm;
            height: 42cm;
        }

        page[size="check"] {
            width: 10cm;
            height: auto;
            min-height: 15cm;
        }
        page[size="A3"][layout="portrait"] {
            width: 42cm;
            height: 29.7cm;
        }
        page[size="A5"] {
            width: 14.8cm;
            height: 21cm;
        }
        page[size="A5"][layout="portrait"] {
            width: 21cm;
            height: 14.8cm;
        }
        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }

            page[size="check"] {
                width: 10cm;
                height: auto;
                min-height: 15cm;
            }
        }
    </style>
</head>
<body class="with-side-menu">


<div class="page-content">
    <div class="container-fluid">
        <page size="check">

<div class="col-md-12" style="padding: 10px;">

    <div class="col-md-12" style="text-align: center;"><strong>SMART CAFE CHECK</strong></div>
    <div class="col-md-12" style="margin-top: 10px;">
       <div style="text-align: center;"><strong>JAMI TAOMLAR</strong></div>
        @foreach($tab as $vl)

            <div class="col-md-8" style="border: solid 1px #000000">{!! $vl->taom_nomi !!}</div>
            <div class="col-md-4" style="border: solid 1px #000000">{!! $vl->narxi !!}</div>

        @endforeach

    </div>
    <div class="col-md-12" style="margin-top: 25px;">
        <div class="col-md-8" style="font-weight: 600">JAMI NARXI:</div>
        <div class="col-md-4" >{{ $totals }} сўм</div>
        <div class="col-md-8" style="font-weight: 600">Xizmat haqqi:</div>
        <div class="col-md-4" style="">{{ ($totals*0.1) }} сўм</div>

        <div class="col-md-8" style="font-weight: 600">JAMI TO`LOV:</div>
        <div class="col-md-4" style="">{{ ($totals*1.1) }} сўм</div>

    </div>




</div>



        </page>

    <div class="col-md-12" align="center">  <button class="btn " onclick="getcheck('{{ $stol_id }}')">ЧЕК чикариш</button></div>



    </div><!--.container-fluid-->
</div><!--.page-content-->


<script>
    function getcheck(str) {

        window.location.assign("{{ URL("endcheck") }}"+"/"+str);

    }
    
</script>
</body>
</html>