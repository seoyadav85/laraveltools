<div class="row">
    <div class="col-md-12">
      <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
           <input type="text" name="title" class="form-control" placeholder="Title*" required value="{{old('title', isset($data->title) ? $data->title : '')}}" >
          <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Short Description</label>
        <div class="col-sm-9">
            <textarea  name="description" class="form-control">{{old('description', isset($data->description) ? $data->description : '')}}</textarea>
           <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            <select class="form-control" name="status">
              <option value="">Please Select Status</option>
              <option value="1"  <?php if(isset($data) && $data->status == 1){ echo "selected='selected'"; } ?>>Active</option>
              <option value="0" <?php if(isset($data) && $data->status == 0){ echo "selected='selected'"; } ?>>In-Active</option>
            </select>
        </div>
      </div>
    </div>
  </div>