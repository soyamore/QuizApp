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
                      <a href="#">SYNAGLAR</a>
                  </li>
                  <li>
                      <a href="#" class="active">ELÝETERLI SYNAGLAR</a>
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
                <div class="panel-title">SYNAGLAR</div>
              </div>
              <div class="panel-body">
                <div class="panel-body">
                  <div class="table-responsive">
                    <div class="dataTables_wrapper form-inline no-footer table-responsive">
                      <table class="table table-hover no-footer" role="grid">
                        <thead>
                        <tr role="row">
                          <th style="width: 20%;" aria-controls="basicTable">#</th>
                          <th style="width: 30%;" aria-controls="basicTable">Temasy</th>
                          <th style="width: 30%;" aria-controls="basicTable">Mugallymy</th>
                          <th style="width: 20%;" aria-controls="basicTable"></th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ([] as $product)
                          <tr role="row" class="odd">
                              <td class="v-align-middle">
                                  <p>{{ $product->kod}}</p>
                              </td>
                              <td class="v-align-middle">
                                  <p>{{ $product->aciklama  }}</p>
                              </td>
                              <td class="v-align-middle">
                                  <p><a href="#">{{ $product->urun  }} / {{ $product->alturun  }} / {{ $product->uruncesidi  }}</a></p>
                              </td>
                              <td class="v-align-middle" align="right">
                                  <div class="btn-group">
                                      <a href="#">
                                          <button type="button" class="btn btn-success">
                                              <i class="fa fa-pencil"></i>
                                          </button>
                                      </a>
                                      <a href="#">
                                          <button type="button" class="btn btn-success">
                                              <i class="fa fa-trash-o"></i>
                                          </button>
                                      </a>
                                  </div>
                              </td>
                          </tr>
                          </a>
                          @endforeach
                        </tbody>
                      </table>

                      {!! '#' !!}
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


    </div>
    <!-- END PAGE CONTENT WRAPPER -->


    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop