@extends('layout')

@section('page_content')
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
                  <li>
                       <a href="#">Accueil</a>
                  </li>
                  <li>
                      <a href="#" class="active">Test</a>
                  </li>
              </ul>
              <!-- END BREADCRUMB -->
          </div>
          <!-- END CONTAINER FLUID -->

          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START PANEL -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <table>
                        <tr>
                            <th>
                                <p>Nom de complet:&nbsp;</p>
                            </th>
                            <td>
                                <p> {{ $test->getName() }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <p>Test:</p>
                            </th>
                            <td>
                                <p>{{ $test->quiz->subject }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <p>Résultat:</p>
                            </th>
                            <td>
                                <p>{{ $test->results->count() > 0 ? (100 / $test->results->count()) * $test->score : 0 }} / {{ (100) }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <p>Date de test</p>
                            </th>
                            <td>
                                <p>{{ $test->created_at->format('d/m/Y') }}</p>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->

        @include('partials.footer')
    </div>
    <!-- END PAGE CONTENT WRAPPER -->


    <!-- END PAGE CONTENT WRAPPER -->
</div>
@stop