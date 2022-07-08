<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
         
    </x-slot>
     
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="row">
                      <div class="container">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                          <div class="col">
                            <div class="card h-100">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
