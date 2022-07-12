<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Journals') }}
        </h2>
         
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             
              <div class="container">
                  <div class="row">
                      <div class="card">
                        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
             </ul>
           </div>
            @endif
                        @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('Journal has been updated successful.') }}
                        </div>
                         @endif
                        <div class="card-header">
<strong>Edit Journal</strong> </div>
                          <div class="card-body">
                          <form method="POST" action="{{url('category/update/'.$categories->id)}} " enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                              <label for="cat_name" class="form-label">Journal Name</label>
                              <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{$categories->cat_name}}">
                            </div>
                            <div class="col-md-6">
                              <label for="issn" class="form-label">ISSN</label>
                              <input type="text" class="form-control" id="issn" name="issn" value="{{$categories->issn}}">
                            </div>
                            <div class="col-12">
                              <label for="description" class="form-label">Description</label>
                              <input type="text" class="form-control" id="description" name="description" value="{{$categories->description}}">
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label for="journal_image" class="form-label">Journal Image</label>
                              <input type="file" class="form-control" id="journal_image" name="journal_image" class="form-control">
                              <img src="{{asset($categories->journal_image)}}" width="100px" height="100px">
                              
                              <input type="hidden" name="old_image" value="{{$categories->journal_image}}">
                            </div></div>
                            <div class="col-6">
                              <label for="status" class="form-label">Status</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="status">
                              <option selected>Select Status</option>
                              <option >Published</option>
                              <option  >Unpublished</option>
                               
                            </select>
                          </div>    
                            <div class="col-12">
                              <div class="form-check">
                                <button type="submit" class="btn btn-primary">Update Journal</button>
                              </div>
                            </div>
                            <div class="col-12">
                           
                            </div>
                          </form>
                      </div>
                  </div></div>
                      </div>
                  </div>
            </div>
        </div>
    </div>

    <!--- Next Row -->
    
</x-app-layout>
