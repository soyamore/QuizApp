@extends('layout')

@section('page_css')
  <link type="text/css" rel="stylesheet" href="{{ asset('pages/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@stop

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
          <li><a href="#" class="active">Ajouter un Quiz</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
        @endif
      </div>

      <!-- END CONTAINER FLUID -->

      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">
        <!-- START PANEL -->
        <div class="panel panel-transparent">
          <div class="panel-heading">
            <div class="panel-title">Ajouter un Quiz</div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-10">
                {!! Form::open(['route' => 'quizzes.store', 'method' => 'post', 'autocomplete' => 'off']) !!}
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="content-title m-t-10">
                              <p>Titre du Quiz :</p>
                            </div>
                            <div>
                              {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Titre: Développement web', 'id' => 'subject']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="content-title m-t-10">
                              <p>Commentaire:</p>
                            </div>
                            <div>
                              {!! Form::textarea('commentaire', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Ce test pour ...', 'id' => 'description']) !!}
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="content-title m-t-10">
                              <p>Nombre de secondes: (s) </p>
                            </div>
                            <div>
                              {!! Form::input('number','time', null, ['class' => 'form-control', 'placeholder' => 'Nombre de secondes souhaités pour chaque questions ...', 'id' => 'time']) !!}
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="content-title m-t-10">
                              <p>Type: </p>
                            </div>
                            <div>
                              {!! Form::select('categorie_id', $categories, ['class' => 'form-control', 'placeholder' => '', 'id' => 'categorie']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  @include('partials.question', ['i' => 1])

                  <div class="row">
                    <div class="col-xs-12">
                      <button class="pull-right btn btn-success" type="submit">Sauvegarder</button>
                      <button type="button" href="#" class="btn btn-new-question pull-right" style="margin-right: 15px;">Nouvelle question</button>
                    </div>
                  </div>

                {!! Form::close() !!}
              </div>
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
<script src="{{ asset('pages/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript">
  $(function() {
    var i = 2;
    //$('.wysiwyg').wysihtml5();

    $('.btn-new-question').click(function() {

  //    question = $('.question:last').clone();

  //    question.insertAfter($('.question:last'));

      $.get('/question', {
        question_number: i
      }).done(function(data) {
        $(data).insertAfter('.question:last');
        i++;
        //$('.wysiwyg').wysihtml5();
        //console.log(i);
      });
    });
  })

</script>

<script type="text/javascript">
  $('select').select2();
</script>

@stop