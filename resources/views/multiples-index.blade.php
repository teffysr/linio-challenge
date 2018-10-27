@extends('master')

@section('content')

   <h3>Multiplos</h3>
    <br>
   <div class="page-header">
   </div>

   <div class="row">
            <div class="col-6">
               <table class="table table-bordered table-hover table-sm table-dark">
                 <thead>
                    <th>Número</th>
                    <th>Valor</th>
                 </thead>
                 <tbody>
                  @php
                    /*
                      'multiple3' => $multiple3,
                      'multiple5' => $multiple5,
                      'multiple3and5' => $multiple3and5,
                      'numberValue'=>$numberValue,
                    */
                  @endphp
                  @foreach($numberValue as $nv)
                    <tr>
                       <td>{{$nv['number']}}</td>
                       <td>{{$nv['value']}}</td>
                    </tr>
                  @endforeach
                 </tbody>
               </table>
               {{ $numberValue->links() }}
            </div>
            <div class="col-sm text-left">
              <div class="row">Multiplos de 3</div>
              @foreach($multiple3 as $m3)
                <div class="row">{{ $m3['number'] }} ({{ $m3['value'] }})</div>
              @endforeach
            </div>
            <div class="col-sm">
              <div class="row">Multiplos de 5</div>
              @foreach($multiple5 as $m5)
                <div class="row">{{ $m5['number'] }} ({{ $m5['value'] }})</div>
              @endforeach
            </div>
            <div class="col-sm">
              <div class="row">Multiplos de 3 y 5</div>
              @foreach($multiple3and5 as $m35)
                <div class="row">{{ $m35['number'] }} ({{ $m35['value'] }})</div>
              @endforeach
            </div>
   </div>


@endsection