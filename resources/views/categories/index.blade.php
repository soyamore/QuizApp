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
                        <a href="#" class="active">Catégories</a>
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
                        <div class="panel-title">Catégories
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                                      <table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                                        <thead>
                                        <tr role="row">
                                            <th style="width: 80%;" tabindex="1" aria-controls="basicTable" rowspan="1" colspan="1">Nom</th>
                                            <th style="width: 20%;text-align: right;" tabindex="1" aria-controls="basicTable" rowspan="1" colspan="1">#</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($categories as $category)
                                        <tr role="row" class="odd">
                                            <td class="v-align-middle">
                                                <p>{{ $category->name }}</p>
                                            </td>
                                            </td>
                                            <td class="v-align-middle text-right">
                                                <div class="btn-group">
                                                    {!! Form::model($category, ['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]) !!}
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

                            <div class="col-md-4">
                                {!! Form::open(['route' => 'categories.store']) !!}
                                    <h3></h3>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default required" aria-required="true">
                                                <label>Nouveau catégorie</label>
                                                {!! Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Nom du catégorie']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        {!! Form::submit('Ajouter',['id' => 'add_category', 'class' => 'btn btn-primary']) !!}
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
        <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->


    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop