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
      <div class="form-group row {{ $errors->has('category_id') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Category</label>
        <div class="col-sm-9">
            <select class="form-control" name="category_id">
              <option value="">Please Select Category</option>
              <?php 
                if(!empty($dataCategory))
                {
                  foreach ($dataCategory as $key => $value)
                  {
                     ?>
                      <option <?php if(!empty($data) && $data->category_id == $value->id){ echo "selected='selected'"; } ?> value="{{$value->id}}"><?php echo $value->title; ?></option>
                     <?php
                  }
                }
              ?>
            </select>
             <span class="text-danger">{{ $errors->first('category_id') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <input type="hidden" name="old_img" value="<?php echo isset($data->icon)?:''; ?>">
      <div class="form-group row {{ $errors->has('icon') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Tool Icon</label>
        <div class="col-sm-9">
           <input type="file" name="icon">
          <span class="text-danger">{{ $errors->first('icon') }}</span>
        </div>
      </div>
    </div>
   <div class="col-md-12">
      <div class="form-group row {{ $errors->has('short_description') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Short Description</label>
        <div class="col-sm-9">
            <textarea  name="short_description" class="form-control">{{old('short_description', isset($data->short_description) ? $data->short_description : '')}}</textarea>
           <span class="text-danger">{{ $errors->first('short_description') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Content</label>
        <div class="col-sm-9">
            <textarea class="ckedito" name="description" id="editor">{{old('title', isset($data->description) ? $data->description : '')}}</textarea>
           <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group row {{ $errors->has('meta_title') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Meta Title</label>
        <div class="col-sm-9">
           <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" value="{{old('meta_title', isset($data->meta_title) ? $data->meta_title : '')}}" >
          <span class="text-danger">{{ $errors->first('meta_title') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group row {{ $errors->has('meta_keyword') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Meta Keyword</label>
        <div class="col-sm-9">
           <input type="text" name="meta_keyword" class="form-control" placeholder="Meta Keyword" value="{{old('meta_keyword', isset($data->meta_keyword) ? $data->meta_keyword : '')}}" >
          <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
        </div>
      </div>
    </div>
     <div class="col-md-12">
      <div class="form-group row {{ $errors->has('meta_description') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Meta Description</label>
        <div class="col-sm-9">
            <textarea  name="meta_description" class="form-control">{{old('meta_description', isset($data->meta_description) ? $data->meta_description : '')}}</textarea>
           <span class="text-danger">{{ $errors->first('meta_description') }}</span>
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