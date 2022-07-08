<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
         
    </x-slot>
    <div class="d-flex">
      <div class="p-2 bg-info flex-fill">Total Journals Uploaded: </div>
      <div class="p-2 bg-warning flex-fill">Total Issues Uploaded: </div>
      <div class="p-2 bg-primary flex-fill">Total Submissions Uploaded: </div>
    </div>
 
 
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="row">
                      <div class="container">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                          <div class="col">
                            
                            <div class="card h-100">
                              <img src="{{asset('assets/images/back3.png')}}" class="card-img-top" alt="Our Journal">
                             
                              <div class="card-body">
                   
                                  <x-jet-nav-link href="{{ route('index.category') }}" :active="request()->routeIs('index.category')">  <h5 class="card-title"> {{ ('Add New Journal') }}
                                  </h5> </x-jet-nav-link>
                                <p class="card-text">Our Academic Journal provides information on the latest emerging trends and developments in these ever-expanding subjects.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="{{asset('assets/images/back2.png')}}" class="card-img-top" alt="Our Journal">
                              <div class="card-body">
                                <h5 class="card-title"> <x-jet-nav-link href="{{ route('index.issue') }}" :active="request()->routeIs('index.issue')">
                                  {{ ('Add New Issues') }}
                              </x-jet-nav-link></h5>
                                <p class="card-text">Central Journal is a Complete Package for Academic Journal and Article Publisher. It comes with a Management System to help the chief Editor manage the Publications, Articles, Reviewers, Volumes and present the information </p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="{{asset('assets/images/back1.png')}}" class="card-img-top" alt="Our Journal">
                              <div class="card-body">
                                <h5 class="card-title"> <x-jet-nav-link href="{{ route('index.submission') }}" :active="request()->routeIs('index.submission')">
                                  {{ ('New Submission') }}
                              </x-jet-nav-link></h5>
                                <p class="card-text">Central Journal is a Complete Package for Academic Journal and Article Publisher. It comes with a Management System to help the chief Editor manage the Publications, Articles, Reviewers, Volumes and present the information .</p>
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
    <div class="jumbotron text-center" style="margin-bottom:0">
      <p>&copy; Copyright 2022 Central Journal. All Right Reserved </p>
    </div>
</x-app-layout>
