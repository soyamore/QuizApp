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
                    <a href="#" class="active">Nouveau utilisateur</a>
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
              <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Nouveau utilisateur</div>
                  </div>

                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-10">
                        @if (isset($user))
                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id], 'files' => true]) !!}
                        @else
                        {!! Form::open(['route' => 'users.store', 'files' => true]) !!}
                        @endif
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default form-group-default-select2 required">
                                <label class="">Type</label>
                                <select name="type" class="full-width" data-placeholder="Type d'utilisateur" data-init-plugin="select2">
                                  <option></option>
                                  <option {{ (isset($user) && $user->type == 'candidat') ? 'selected' : '' }} value="candidat">Candidat</option>
                                  <option {{ (isset($user) && $user->type == 'headhunter') ? 'selected' : '' }} value="HeadHunter">Head Hunter</option>
                                  <option {{ (isset($user) && $user->type == 'admin') ? 'selected' : '' }} value="admin">Admin</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default required" aria-required="true">
                                    <label>Nom complet</label>
                                    {!! Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Nom complet']) !!}
                                </div>
                            </div>
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required" aria-required="true">
                                <label>Login</label>
                                {!! Form::text("username", null, ['class' => 'form-control', 'placeholder' => "Nom d'utilisateur"]) !!}
                              </div>
                            </div>
                          </div>

                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required" aria-required="true">
                                <label>Email</label>
                                {!! Form::email("email", null, ['class' => 'form-control', 'placeholder' => "Email"]) !!}
                              </div>
                            </div>
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required" aria-required="true">
                                <label>Mot de passe</label>
                                {!! Form::text("password", "", ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
                              </div>
                            </div>
                          </div>

                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default" aria-required="false">
                                <label>Cin</label>
                                {!! Form::text("cin", null, ['class' => 'form-control', 'placeholder' => "CIN"]) !!}
                              </div>
                            </div>
                          </div>

                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default" aria-required="false">
                                <label>Tél</label>
                                {!! Form::text("tel", "", ['class' => 'form-control', 'placeholder' => 'N° de téléphone']) !!}
                              </div>
                            </div>
                          </div>

                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default" aria-required="false">
                                <label>Adresse</label>
                                {!! Form::text("address", null, ['class' => 'form-control', 'placeholder' => "Adresse"]) !!}
                              </div>
                            </div>
                          </div>
                          
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default" aria-required="false">
                                <label>Ville</label>
                                {!! Form::text("ville", "", ['class' => 'form-control', 'placeholder' => 'Ville']) !!}
                              </div>
                            </div>
                          </div>

                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default" aria-required="false">
                                <label>Date de naissance</label>
                                {!! Form::input("date","birthday", null, ['class' => 'form-control', 'placeholder' => "Date de naissance"]) !!}
                              </div>
                            </div>
                          </div>

                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default form-group-default-select2">
                                <label class="">Niveau</label>
                                <select name="level" class="full-width" data-placeholder="Niveau" data-init-plugin="select2">
                                  <option></option>
                                  <option {{ (isset($user) && $user->level == 'Débutant') ? 'selected' : '' }} value="Débutant">Débutant</option>
                                  <option {{ (isset($user) && $user->level == 'Junior') ? 'selected' : '' }} value="Junior">Junior</option>
                                  <option {{ (isset($user) && $user->level == 'Senior') ? 'selected' : '' }} value="Senior">Senior</option>
                                  <option {{ (isset($user) && $user->level == 'Expert') ? 'selected' : '' }} value="Expert">Expert</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default" aria-required="false">
                                <label>CV</label>
                                {!! Form::file("cv", "", ['class' => 'form-control', 'placeholder' => 'CV']) !!}
                              </div>
                            </div>
                          </div>



                          <div>
                            {!! Form::submit('Enregistrer',['class' => 'btn btn-primary']) !!}
                          </div>

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

        @include('partials.footer')

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
@stop