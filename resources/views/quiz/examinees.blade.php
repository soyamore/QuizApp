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
            <li><a href="#" class="active">{{ $quiz->subject }}</a></li>
          </ul>
          <!-- END BREADCRUMB -->
        </div>
        <!-- END CONTAINER FLUID -->

        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">

          @if ($quiz->examinees->count())
          <table class="table no-more-tables">
            <thead>
              <tr>
                <th style="width:1%">#</th>
                <th style="width:33%">Candidat</th>
              </tr>
            </thead>
            <tbody>
              @foreach($quiz->examinees as $n => $examinee)
              <tr>
                <td class="v-align-middle">{{ $n + 1 }}</td>
                <td class="v-align-middle">{{ $examinee->name }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif

          <!-- START PANEL -->
          <div class="panel ">
            <div class="panel-heading">
              <div class="panel-title">Ajouter un candidat</div>
            </div>
            <div class="panel-body">
              <div class="panel-body ">
                <form class="col-sm-6" action="{{ route('quizzes.examinees.add', $quiz->id) }}" method="post">
                    <select placeholder="Candidats" name="examinees[]" multiple class="full-width form-group form-group-default form-group-default-select2">
                      <option></option>
                      @foreach($examinees as $examinee)
                      <option {{ in_array($examinee->id, $quiz->examinees()->lists('user_id')->toArray()) ? 'selected' : '' }} value="{{ $examinee->id }}">{{ $examinee->name }}</option>
                      @endforeach
                    </select><br>
                    <button class="btn btn-success btn-cons m-b-10" type="submit">
                      <i class="fa fa-save"></i>
                      <span class="bold">Sauvegarder</span>
                    </button>
                    {!! Form::token() !!}
                </form> 
              </div>
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

</div>
<!-- END PAGE CONTAINER -->

@stop

@section('page_scripts')
<script type="text/javascript">
  $('select').select2();
</script>
@stop