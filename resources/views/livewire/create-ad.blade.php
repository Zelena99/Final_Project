<div>
  
    <form wire:submit.prevent="store">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label text-white">{{__('Título:')}}</label>
            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label text-white">{{__('Precio:')}}</label>
            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
            @error('price')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label text-white">{{__('Descripción:')}}</label>
            <textarea wire:model="body" cols="30" rows="15" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
            {{$message}}
            @enderror
        </div>
          

        <div class="mb-3">
            <label for="category" class="form-label text-white">{{__('Categorías:')}}</label>
            <select wire:model.defer="category" class="form-control">
                <option value="">{{__('Seleccionar categoría')}}</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>    
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
            @error('temporary_images.*')
                <p class="text-danger mt-2"> {{$message}} </p>
            @enderror
        </div>

        @if(!empty($images))
        <div class="row">
            <div class="col-12">

                <p class="text-white">{{__('Vista previa')}}:</p>
                
                <div class="row">
                    @foreach ($images as $key=>$image)
                    <div class="col-12 col-md-4">
                        <img src="{{$image->temporaryUrl()}}" alt="" class="img-fluid mb-2">
                        <button type="button" class="btn btn-danger" wire:click="removeImage 
                        ({{$key}})">{{__('Eliminar')}}</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <div class="text-center mt-2">
            <button type="submit" class="btn btn-dark">{{__('Crear')}}</button>        
        </div>    
    </form>
</div>
