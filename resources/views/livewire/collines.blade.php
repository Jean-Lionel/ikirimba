<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <form action="">
    	@if($provinces)
    	<div class="col-md-6">
    		<div class="form-group">
    			<label for="">Province</label>
    			 <select wire:model="selectedProvince" class="form-control">
                <option value="" selected>Choisissez une provinces</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
    			
    		</div>
           
        </div>
    	@endif

    	@if(count($communes) > 0)
    	<div class="col-md-6">
            <div class="form-group">
            	<label for="">Commune</label>
            	<select wire:model="selectCommune" class="form-control">
                <option value="" selected>Choisissez une communes</option>
                @foreach($communes as $commune)
                    <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
    	@endif


    	@if($selectCommune > 0)
    	<div class="col-md-6">
            <div class="form-group">
            	<label for="">Colline | Quartier</label>
            	<input required="" type="text" wire:model="colline" class="form-control">
            	
            </select>
            </div>

            <div class="form-group">
            	<button wire:click.prevent="store()" class="btn-info btn  btn-block">Enregistrer</button>
            </div>
        </div>
    	@endif


    </form>
</div>
