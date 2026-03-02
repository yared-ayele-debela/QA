@csrf
<div class="form-group">
    <label for="question-title" class="form-label">Title</label>
    <input type="text" class="form-control {{$errors->has('title')? 'is-invalid':''}}" name="title" value="{{old('title',$question->title)}}" id="question-title" >
    @error('title')
    <small class="text-danger ">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="question-body" class="form-label">Question Detail</label>
    <textarea class="form-control {{$errors->has('body')? 'is-invalid':''}}" name="body" id="question-body" rows="6">
        {{old('body',$question->body)}}
    </textarea>
    @error('body')
    <small class=" text-danger ">{{$message}}</small>
    @enderror
</div>
<div class="form-group pt-2">
    <button  type="submit" class="btn btn-primary">{{$buttonText}}</button>
</div>
