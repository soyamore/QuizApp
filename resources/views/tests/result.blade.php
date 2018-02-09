@extends('layout')

@section('page_content')

<!-- START PAGE-CONTAINER -->
<div class="page-container">

  @include('partials.header')

  <div class="page-content-wrapper">
    <!-- START PAGE CONTENT -->
    <div class="content">
      <!-- START JUMBOTRON -->
      <div class="jumbotron lg vertical center bg-white column-w4 vertical-bottom" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20 full-height">
          <div class="inner text-center p-t-50 m-t-80 full-height">
            <div class="m-b-10">
              <h2 class="p-t-10 inline">Vos résultas!</h2>
            </div>


            @if( ( ($test->score  / $test->quiz->questions->count()) * 100) > 50 )
              <div class="m-b-10">
                  <h1 style="font-size: 80px;color:#0da899;"><i class="fa fa-thumbs-up fa-6" aria-hidden="true"></i></h1>
              </div>
            @endif

            <div class="col-md-4 center-margin" style="float:none">
              <div class="col-md-7 b-grey b-r">
                <p class="hinted-text text-left p-t-15 p-b-t-15">Résultat:
                  <br>{{ $test->score }} / {{ $test->quiz->questions->count() }}</p>
              </div>
              <div class="col-md-5">
                <p class="hinted-text text-left p-t-15 p-b-t-15 p-l-10">
                  Correct : {{ $test->score }}
                  <br>Faux: {{ $test->quiz->questions->count() - $test->score }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END JUMBOTRON -->
    </div>
    <!-- END PAGE CONTENT -->
  </div>

</div>
<!-- END PAGE CONTAINER -->

@stop
@section('page_scripts')
    <script type="text/javascript">
        $('select').select2();
    </script>
@stop