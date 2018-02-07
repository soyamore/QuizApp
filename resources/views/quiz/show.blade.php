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
          <li>
            <a href="#">Accueil</a>
          </li>
          <li>
            <a href="#" class="active">{{ $quiz->subject }}</a>
          </li>
        </ul>
        <!-- END BREADCRUMB -->
      </div>

      <!-- END CONTAINER FLUID -->

      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

          <!-- START PANEL -->
          <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                  {{ $quiz->subject }}
                </div>
                <p class="pull-right">Nombre de question: {{ count($questions) }} / Time: <span id="timing">{{ ( $quiz->time * count($questions) ) }}s</span></p>
                <hr>
            </div>

            <div class="panel-body">
              <div id="quiz-intro" class="row">
                <div class="col-sm-12">
                    <h4>Bienvenue <b>{{ $user->name }}</b></h4>

                    <h5>

                      <p>
                        <b>Type: </b> {{ $quiz->category->name }}
                      </p>

                      <p>
                          Le nombre des questions : {{ count($questions) }}
                        </p>

                        <p>
                          Le Temps pour passer ce test : {{ ($quiz->time * count($questions)) }} seconds
                        </p>
                    </h5>

                    <div class="panel panel-warning">
                      
                      <div class="panel-heading">
                          <div class="panel-title">
                            Note:
                          </div>
                          <hr>
                      </div>

                      <div class="panel panel-body">
                        <ul>
                          <li>
                            Cliquez sur le bouton "Sauvegarder" au bas de cette page pour soumettre vos réponses;
                          </li>
                          <li>
                            Le test sera soumis après l'expiration du délai;
                          </li>
                          <li>
                            Ne pas actualiser la page.
                          </li>
                        </ul>
                      </div>

                    </div>

                    <p class="pull-right">
                      {!! Form::button("C'est parti !", ['id' =>"start-quiz", 'class' => 'btn btn-primary']) !!}
                    </p>
                    
                </div>
              </div>
              <div class="row" id="quiz-body" style="display: none;">
                <div class="col-sm-12">
                  {!! Form::open(['route' => 'tests.store']) !!}

                  @foreach($questions as $i => $question)
                    <div class="form-group question" id="question-{{ ($i + 1) }}" style="{{ ($i != 0) ? 'display: none;' : '' }}">
                      <div class="panel panel-transparent">
                        <div class="panel-heading">
                          <div class="panel-title">{!! ($i + 1) . ') ' . $question->text !!}</div>
                        </div>

                        <div class="panel-body">
                          <div class="row-fluid">
                            <div class="radio radio-success">
                            @for ($j = 0; $j < sizeof($question->answers) / 4; $j += 1)
                            @for ($k = 0; $k < 4 && (4 * $j + $k < sizeof($question->answers)); $k += 1)
                              <div class="col-xs-12">
                                <input type="radio" value="{{ $question->answers[4 * $j + $k]->id }}" name="{{ $question->id }}" id="{{ $question->answers[4 * $j + $k]->id }}" aria-invalid="false">
                                <label for="{{ $question->answers[4 * $j + $k]->id }}">{{ $choices[$k] . '. ' . $question->answers[4 * $j + $k]->text }}</label>
                              </div>
                            @endfor
                            @endfor

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                  <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                  <input type="hidden" id="counter" name="counter" value="{{ count($questions) }}">
                  <input type="hidden" id="time" name="time" value="{{ $quiz->time }}">

                  {!! Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) !!}

                  <p class="pull-right">
                      {!! Form::button("Suivant", ['class' => 'btn btn-success next']) !!}
                  </p>

                  {!! Form::token() !!}

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

    <!-- START COPYRIGHT -->
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg footer">
        <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
                <span class="hint-text">Copyright © 2018 </span>
                <span class="font-montserrat">Anass BOUTAKAOUA</span>.
                <span class="hint-text">All rights reserved. </span>
            </p>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- END COPYRIGHT -->
  </div>
  <!-- END PAGE CONTENT WRAPPER -->


  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop
@section('page_scripts')
    <script type="text/javascript">
        $('select').select2();
    </script>

    <script type="text/javascript" src="{!! asset('js/main.js?v=' . time()) !!}"></script>
@stop