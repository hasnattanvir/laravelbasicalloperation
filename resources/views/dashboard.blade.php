<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
          <p>HI I'm<b> {{Auth::user()->name}}</b></p>
          <p style="background-color: green; color:#fff; padding:4px; border-radius:3px;">Total User: {{count($users)}}</p>
        </div>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}

    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    {{-- <td>{{$item->created_at->diffForHumans()}}</td> --}}
                    <td>{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>


