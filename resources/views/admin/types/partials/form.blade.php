{{--Creo un unico form per edit e create || 
    creo una variabile per la rotta--}}

<form action="{{ route($routeName, $type) }}" method="POST" enctype="multipart/form-data" class="py-5">
    @csrf
    {{--Inserisco il metodo PUT per la rotta update // vedere rotte con route:list--}}
    @method($method)

    <div class="card px-5 py-5">

        <div class="form-outline w-25 mb-3">
            <label for="Title" class="form-label @error('name') is-invalid @enderror">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Insert name" name="name" value="{{old('name', $type->name)}}">
            {{--inserisco l'errore sotto al singolo input--}}
            @error('name')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror         
        </div>

        <div class="form-outline w-25 mb-4">
            <label for="color" class="form-label @error('color') is-invalid @enderror">Color</label>
            <input type="color" class="form-control" id="color" placeholder="Insert color" name="color" value="{{old('color', $type->color)}}">
            @error('color')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror                  
        </div>
    
    <div class="card-footer text-end py-2 d-flex justify-content-between">
        <a href="{{ route('admin.types.index')}}" class="btn btn-dark rounded-circle"><i class="fa-solid fa-angles-left"></i></a>
        <button type="submit" class="btn btn-success rounded-circle"><i class="fa-solid fa-plus"></i></i></button>
    </div>

</form>