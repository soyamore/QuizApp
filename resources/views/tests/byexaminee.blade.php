@extends('layout')

@section('page_content')

<!-- START PAGE-CONTAINER -->
<div class="page-container">

  @include('partials.header')

  <!-- START PAGE CONTENT WRAPPER -->
  <div class="page-content-wrapper">
    <!-- START PAGE CONTENT -->
    <div class="content">
      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
          <li><a href="#">{{ $examinee->name }}</a></li>
          <li><a href="#" class="active">Résultats</a></li>
        </ul>
        <!-- END BREADCRUMB -->
      </div>
      <!-- END CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg bg-white">
        <br>
        <div id="chart_container">
          <div id="y_axis"></div>
          <div id="chart"></div>
          <div id="legend"></div>
          </form>
        </div>
      </div>
      <div class="container-fluid container-fixed-lg bg-white">

        <div class="panel panel-transparent">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr role="row">
                    <th style="width: 2%;">#</th>
                    <th style="width: 20%;">Titre</th>
                    <th style="width: 20%;">Résultat</th>
                    <th style="width: 30%; text-align:right">Afficher</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($tests as $key => $test)
                <tr role="row" class="odd">
                  <td class="v-align-middle">
                    <p>{{ count($tests) - $key }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $test->quiz->subject }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $test->results->count() == 0 ? 0 : 100 * $test->score / $test->results->count() }}</p>
                  </td>
                  <td align="right">
                    <div class="btn-group">
                      <a title="Afficher" href="{{ route('tests.show', $test->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- END PAGE CONTENT -->

    @include('partials.footer')

  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->
@stop

@section('page_scripts')

  <script>
    var palette = new Rickshaw.Color.Palette();

    var graph = new Rickshaw.Graph( {
      element: document.querySelector("#chart"),
      width: document.body.clientWidth - 300,
      height: 240,
      renderer: 'line',
      series: [
        {
          name: "{{ $examinee->name }}",
          data: [
            @foreach ($examinee->tests as $key => $test)
              {{ '{ x: ' . ($key + 1) . ', ' . 'y: ' . ($test->results->count() == 0 ? 0 : 100 * $test->score / $test->results->count()) . '},' }}
            @endforeach
          ],
          color: palette.color()
        },
      ]
    } );

    var x_axis = new Rickshaw.Graph.Axis.X( {
      graph: graph,
      tickFormat: function(n) {
        if (Math.ceil(n) != Math.floor(n))
          return ' ';
        return n;
      },
    } );

    var y_axis = new Rickshaw.Graph.Axis.Y( {
      graph: graph,
      orientation: 'left',
      tickFormat: Rickshaw.Fixtures.Number.formatKMBT,
      element: document.getElementById('y_axis'),
    } );

    var legend = new Rickshaw.Graph.Legend( {
      element: document.querySelector('#legend'),
      graph: graph
    } );

    graph.render();

  </script>

@stop