@extends('common::layouts.master')


@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل البيانات  </h4>
            </div>
            <div class="card-body">
                
                <form class="form form-horizontal" action="{{ route('admin.updateMainCategory') }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $mainCategory->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الاسم  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" required value="{{$mainCategory['name']}}" class="form-control" name="name" placeholder="العنوان" />
                                        @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="category_type" value="1">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                <label class="col-form-label" for="fname-icon">    الضريبة % </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="number" class="form-control" name="tax" step="any" required value="{{ $mainCategory->tax }}" placeholder=""  />
                                        @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الترتيب  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="number" class="form-control" name="order" required value="{{ $mainCategory->order }}" placeholder=""  />
                                        @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="pass-icon">الصوره</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="image"></i></span>
                                        <input type="file" id="pass-icon" class="form-control" name="image" placeholder="image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        </div>


                       
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary me-1">تاكيد</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

