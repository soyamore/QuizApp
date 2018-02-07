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
          <li><a href="#">Accueil</a></li>
          <li><a href="#" class="active">Tests passés</a></li>
        </ul>
        <!-- END BREADCRUMB -->
      </div>
      <!-- END CONTAINER FLUID -->

      <div class="container-fluid container-fixed-lg bg-white">

        <div class="panel panel-transparent">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr role="row">
                    <th style="width: 2%;">#</th>
                    <th style="width: 20%;">Nom</th>
                    <th style="width: 20%;">Tests</th>
                    <th style="width: 30%; text-align:right">Afficher</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($examinees as $key => $examinee)
                <tr role="row" class="odd">
                  <td class="v-align-middle">
                    <p>{{ $key + 1 }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $examinee->name }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $examinee->tests()->count() }}</p>
                  </td>
                  <td align="right">
                    <div class="btn-group">
                      <a title="Afficher" href="{{ route('tests.examinees.tests', $examinee->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
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