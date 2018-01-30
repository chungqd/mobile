@extends('admin.layout.index')
@section('content')
<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                
                <h2 class="text-center">Sản phẩm bán</h2>
                 @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>Warning!</strong> {{$error}}<br>
                        @endforeach
                    </div>
                @endif
                <div class="col-md-12" style="padding-bottom: 10px;">
                    <form class="form-inline" action="{{ route('postStatisticalProduct') }}" method="post">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="from">Từ</label>
                            <input type="text" class="form-control" id="from" name="from" placeholder="yyyy/mm/dd">
                        </div>
                        <div class="form-group">
                            <label for="to">Đến</label>
                            <input type="text" class="form-control" id="to" name="to" placeholder="yyyy/mm/dd">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnSearch">Tìm</button>
                        @isset ($donhang)
                        <xml>
                            <x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>
                                <x:WorksheetOptions>
                                    <x:Panes></x:Panes></x:WorksheetOptions>
                            </x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook>
                        </xml>
                            <a class="btn btn-info pull-right" href="#" id="test" onClick="javascript:fnExcelReport();"><span class="fa fa-print"></span></a>
                        @endisset
                    </form>
                </div>
                {{-- <div class="col-md-6"> --}}
                   
                  {{-- <input class="form-control pull-right" style="width: 300px;" name="txtSearch" type="text" id="datepicker"> --}}
                {{-- </div> --}}

                <table id="export" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Ma san pham</th>
                            <th>Ten san pham</th>
                            <th>So luong con</th>
                            <th>Da ban</th>
                        </tr>
                    </thead>
                    <tbody id="result-reportPr">
                    @if (isset($donhang))
                        @foreach ($donhang as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ str_slug($value->name) }}</td>
                            <td>{{ $value->soluong }}</td>
                            <td>{{ $value->slban }}</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $( function() {
        var dateFormat = "yy/mm/dd",
          from = $( "#from" )
            .datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              changeYear: true,
              dateFormat: "yy/mm/dd"
            })
            .on( "change", function() {
              to.datepicker( "option", "minDate", getDate( this ) );
            }),
          to = $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy/mm/dd"
          })
          .on( "change", function() {
            from.datepicker( "option", "maxDate", getDate( this ) );
          });
     
        function getDate( element ) {
          var date;
          try {
            date = $.datepicker.parseDate( dateFormat, element.value );
          } catch( error ) {
            date = null;
          }
     
          return date;
        }
    } );

    $(document).ready(function() {
        $('#export').DataTable({
            responsive: true
        });
    })

    function fnExcelReport() {
        var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
        tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

        tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

        tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
        tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

        tab_text = tab_text + "<table border='1px'>";
        tab_text = tab_text + $('#export').html();
        tab_text = tab_text + '</table></body></html>';

        var data_type = 'data:application/vnd.ms-excel';

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            if (window.navigator.msSaveBlob) {
                var blob = new Blob([tab_text], {
                    type: "application/csv;charset=utf-8;"
                });
                navigator.msSaveBlob(blob, 'Test file.xls');
            }
        } else {
            $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
            $('#test').attr('download', 'Test file.xls');
        }

    }
</script>

@endsection