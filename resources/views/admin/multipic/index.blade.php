<x-app-layout>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
              <div class="Title">
                <h3>Multiple Image Uplode</h3>
                {{-- success messate --}}
              @if(session('Success'))
              <div class="alert alert-success" style="width: fit-content" role="alert">
                {{session('Success')}}
              </div>
              @endif

              </div>

              <div class="row">
                  @foreach ($images as $item)
                   <div class="col-md-3 gy-2">
                        <div class="card">
                            <img class="card-img-top" src="{{asset($item->image)}}" alt="">
                        </div>
                    </div>
                  @endforeach
                 
              </div>
              
              {{ $images->links() }}
            </div>
            <div class="col-md-4">
              

                <div class="coverdiv p-5">
                    <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      
    
                      <div class="mb-3">
                        <label for="image" class="form-label">Multi Image</label>
                        <input type="file" name="image[]" class="form-control" id="image" multiple="">
    
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                      </div>
                      <button type="submit" class="btn btn-primary">Add Brand</button>
                    </form>
                  </div>

            </div>
        </div>
    </div>

    


</x-app-layout>


