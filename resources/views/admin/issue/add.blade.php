<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Add Journals') }}
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
                          {{ __('A new Journal has been created successful.') }}
                      </div>
                       @endif
                      <div class="card-header">
<strong>Add New Journal</strong> </div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('store.issue') }}">
                          @csrf
                          <div class="col-md-6">
                            <label for="journalName" class="form-label">Journal Name</label>
                            <input type="text" class="form-control" id="journalName" name="journalName">
                          </div>
                          <div class="col-md-6">
                            <label for="issn" class="form-label">ISSN</label>
                            <input type="text" class="form-control" id="issn" name="issn">
                          </div>
                          <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="">
                          </div>
                           
                           
                          <div class="col-12">
                            <div class="form-check">
                              <button type="submit" class="btn btn-primary">Add New Journal</button>
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
