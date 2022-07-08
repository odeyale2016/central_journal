<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Submission') }}
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
                            {{ __('Issue has been updated successful.') }}
                        </div>
                         @endif
                        <div class="card-header">
  <strong>Edit submission</strong> </div>
                          <div class="card-body">
                          <form method="POST" action="{{url('submission/update/'.$submission->id)}} ">
                            @csrf
                            <div class="col-md-6">
                              <label for="title" class="form-label">Title</label>
                              <input type="text" class="form-control" id="title" name="title" value="{{$submissions->title}}">
                            </div>
                            <div class="col-md-6">
                              <label for="volume" class="form-label">Volume</label>
                              <input type="text" class="form-control" id="volume" name="volume"value="{{$submissions->volume}}">
                            </div>
                            <div class="col-6">
                              <label for="number" class="form-label">Number</label>
                              <input type="text" class="form-control" id="number" name="number" value="{{$submissions->number}}">
                            </div>
                            <div class="col-6">
                              <label for="year" class="form-label">Year</label>
                              <input type="text" class="form-control" id="year" name="year" value="{{$submissions->year}}">
                            </div>
                            <div class="col-6">
                              <label for="date" class="form-label">Date Published</label>
                              <input type="text" class="form-control" id="date" name="startDate" value="{{$submissions->startDate}}">
                            </div>
                             
                          
                            
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
                                <button type="submit" class="btn btn-primary">Update Issue</button>
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
  