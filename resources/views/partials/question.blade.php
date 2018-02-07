<div class="panel panel-default question">
  <div class="panel-body">
    <div class="form-group">
      <div class="row">
        <div class="col-xs-12">

          <div class="input-title m-b-10">
            <span class="bold"><span class="number">{{ $i }}. </span>Question</span>
          </div>

          <div class="m-b-20" >
            <textarea  class="form-control" style="width: 100%;" name="questions[{{$i - 1}}][text]" placeholder="Question ..."></textarea>
          </div>
        </div>
      </div>
      <p>Réponses</p>
      
      <div class="form-group">
        <label>a.</label>
        <span class="radio radio-success pull-right m-t-0" style="display: inline;">
          <input type="radio" value="0" name="questions[{{$i-1}}][correct_answer]" id="{{ $i }}-a">
          <label for="{{ $i }}-a">La réponse</label>
        </span>
        <input type="text" name="questions[{{$i-1}}][answers][]" class="form-control" required>
      </div>

      <div class="form-group">
        <label>b.</label>
        <span class="radio radio-success pull-right m-t-0" style="display: inline;">
          <input type="radio" value="1" name="questions[{{$i-1}}][correct_answer]" id="{{ $i }}-b">
          <label for="{{ $i }}-b">La réponse</label>
        </span>
        <input type="text" name="questions[{{$i-1}}][answers][]" class="form-control" required>
      </div>

      <div class="form-group">
        <label>c.</label>
        <span class="radio radio-success pull-right m-t-0" style="display: inline;">
          <input type="radio" value="2" name="questions[{{$i-1}}][correct_answer]" id="{{ $i }}-c">
          <label for="{{ $i }}-c">La réponse</label>
        </span>
        <input type="text" name="questions[{{$i-1}}][answers][]" class="form-control" required>
      </div>

      <div class="form-group">
        <label>d.</label>
        <span class="radio radio-success pull-right m-t-0" style="display: inline;">
          <input type="radio" value="3" name="questions[{{$i-1}}][correct_answer]" id="{{ $i }}-d">
          <label for="{{ $i }}-d">La réponse</label>
        </span>
        <input type="text" name="questions[{{$i-1}}][answers][]" class="form-control" required>
      </div>
    </div>
  </div>
</div>
