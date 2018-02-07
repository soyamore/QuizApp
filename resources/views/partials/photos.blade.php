<style type="text/css">

.photos-container ul { list-style: none; }
.photos-container .buttons { margin-bottom: 20px; }
.photos-container .list li { width: 100%; border-bottom: 1px dotted #CCC; margin-bottom: 10px; padding-bottom: 10px; }
.photos-container .grid li { float: left; width: 20%; height: 150px; border-right: 1px dotted #CCC; border-bottom: 1px dotted #CCC; padding: 20px; }
.photos-container .list img { width:30px }
.photos-container .grid img { width:130px }
.photos-container .grid .filename { display:none; }

</style>

<!-- Modal -->
<div class="modal fade stick-up disable-scroll" id="modalStickUp" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                    <h5>File <span class="semi-bold">manager</span></h5>
                    <p class="p-b-10">{!! $photos->count() !!} files</p>
                </div>

                <div class="modal-body">

                    <div class="form-group-attached">
                      <div class="row">
                        <div class="col-sm-12 photos-container">
                          <div class="buttons">
                            <a href="#" class="grid">Grid View</a>
                            <a href="#" class="list">List View</a>
                          </div>

                          <ul class="list">
                            @foreach ($photos as $photo)
                            <li>
                              <input type="checkbox" name="photos[{!! $photo->id !!}]" id="{!! $photo->id !!}" data-photo-src="{!! asset('uploads/' . $photo->thumb160x160) !!}">
                              <label for="checkbox{!! $photo->id !!}}" ><img src="{!! asset('uploads/' . $photo->thumb160x160) !!}" ></label>
                              <span class="filename">{!! $photo->filename !!}</span>
                            </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-8">
                      </div>
                      <div class="col-sm-4 m-t-10 sm-m-t-10">
                        <button id="btn-select-photo" disabled type="submit" class="btn btn-primary btn-block m-t-5">Saýla</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>