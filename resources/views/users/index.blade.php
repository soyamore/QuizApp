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
                        <a href="#" class="active">Utilisateurs</a>
                    </li>
                </ul>
                <!-- END BREADCRUMB -->
            </div>

            <!-- END CONTAINER FLUID -->

            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                    <div class="panel-heading">
                        <div class="panel-title">Utilisateurs
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">

                            <a href="{{ URL::route('users.create') }}">
                                <button class="btn btn-success btn-cons m-b-10" type="button">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="bold">Nouveau utilisateur</span>
                                </button>
                            </a>

                            <div class="table-responsive">
                                <div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                                  <table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th style="width: 25%;" tabindex="1" aria-controls="basicTable" rowspan="1" colspan="1">Nom</th>
                                        <th style="width: 15%;" tabindex="2" aria-controls="basicTable" rowspan="1" colspan="1">Login</th>
                                        <th style="width: 15%;" tabindex="2" aria-controls="basicTable" rowspan="1" colspan="1">Type</th>
                                        <th style="width: 15%;" tabindex="2" aria-controls="basicTable" rowspan="1" colspan="1">Date de création</th>
                                        <th style="width: 15%;" tabindex="2" aria-controls="basicTable" rowspan="1" colspan="1">Date de modification</th>
                                        <th style="width: 15%;" tabindex="3" aria-controls="basicTable" rowspan="1" colspan="1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($users as $user)
                                    <tr role="row" class="odd">
                                        <td class="v-align-middle">
                                            <p>{{ $user->name }}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <p>{{ $user->username }}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <p>{{ $user->translatedType }}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <p>{{ $user->created_at->format('H:i:s | d-m-Y') }}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <p>{{ $user->updated_at->format('H:i:s | d-m-Y') }}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <div class="btn-group">
                                                <a href="{{ URL::route('users.edit', ['id' => $user->id]) }}">
                                                    <button type="button" class="btn btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                {!! Form::model($user, ['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                                                    <button type="submit" class="btn btn-success">
                                                      <i class="fa fa-trash"></i>
                                                    </button>
                                                  {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                    </a>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
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
        <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->


    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop