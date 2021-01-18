<div>
	{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

	<div>
        @if (session()->has('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

	<div class="text-center">
		 <div wire:loading.delay>
	        <div class="spinner-border" role="status">
	  			<span class="sr-only">Loading...</span>
			</div>
	    </div>
	</div>

	<form action="">

		<div class="row">
			<div class="col-md-6">
				<h6>IDETIFICATION DU NOUVEAU MEMBRE DANS LE L.C.P.C</h6>

				@if($provinces)

				<div class="form-group">
					<label for="">Province</label>
					<select wire:model="selectedProvince" class="form-control  form-control-sm">
						<option value="" selected>Choisissez une provinces</option>
						@foreach($provinces as $province)
						<option value="{{ $province->id }}">{{ $province->name }}</option>
						@endforeach
					</select>

				</div>
				@endif

				@if(count($communes) > 0)

				<div class="form-group">
					<label for="">Commune</label>
					<select wire:model="selectCommune" class="form-control form-control-sm">
						<option value="" selected>Choisissez une communes</option>
						@foreach($communes as $commune)
						<option value="{{ $commune->id }}">{{ $commune->name }}</option>
						@endforeach
					</select>
				</div>

				@endif


				@if(count($collines) > 0)

				<div class="form-group">
					<label for="">Colline ou Quartier</label>
					<select wire:model="selectColline" class="form-control form-control-sm">
						<option value="" selected>Choisissez une quartier</option>
						@foreach($collines as $colline)
						<option value="{{ $colline->id }}">{{ $colline->name }}</option>
						@endforeach
					</select>
				</div>

				@endif



				@if(count($groupements) > 0)

				<div class="form-group">
					<label for="">Groupement de base</label>
					<select wire:model="selectedGroupement" class="form-control form-control-sm">
						<option value="" selected>Choisissez une quartier</option>
						@foreach($groupements as $groupement)
						<option value="{{ $groupement->id }}">{{ $groupement->name }}</option>
						@endforeach
					</select>
				</div>

				@endif


			</div>


			@if($selectedGroupement)
			<div class="col-md-6">
				<h6 >ENREGISTREMENT DU MEMBRE DANS LE PROJET <b>L.C.P.C</b></h6>

				@if($membre != null)

				<div class="badge-dark col-md-12">
					{{$membre->first_name.' '. $membre->last_name }} : {{ $membre->compte->name }} 
				</div>

				@endif
				<div class="form-group row container">

					<label class="col-4" for="">Nom</label>
					<input wire:model="first_name" type="text" required="" class="col-8">
					@error('first_name')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
				</div>
				<div class="form-group row container">
					<label  class="col-4" for="">Prénom</label>
					<input wire:model="last_name" type="text" required="" class="form-control form-control-sm col-8">
					@error('last_name')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
				</div>

				<div class="form-group row container">
					<label class="col-4" for="">Sexe</label>
					<div class="d-flex col-8">
						<label for="homme">HOMME</label>
						<input id="homme" wire:model="sexe"  name="sexe" type="radio"  value="HOMME" class="form-control form-control-sm">

						<label for="femme">FEMME</label>

						<input id="femme" wire:model="sexe" name="sexe" type="radio" value="FEMME" class="form-control form-control-sm">
					</div>
				</div>

				<div class="form-group row container">
					<label class="col-4" for="">Montant d'adhésion</label>
					<input wire:model="montant" type="text" required="" class="form-control form-control-sm col-8">
					@error('montant')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
				</div>

				<div class="form-group row container">
					<label class="col-8" for="">Numéro du parrain</label>

					<input type="text" class="col-4" wire:model="parent_code">
					
					@error('parent_code')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
					
				</div>


				<div class="form-group row container">
					<label class="col-4" for="">Téléphone</label>
					<input wire:model="telephone" type="text" required="" class="form-control form-control-sm col-8">
					@error('telephone')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
				</div>

				<div class="form-group">
					<button type="submit" wire:click.prevent="store()" class="btn-info btn  btn-block">Enregistrer</button>
				</div>


				@if($membre != null)
				<div class="badge-dark col-md-12">
					{{$membre->first_name.' '. $membre->last_name }} : {{ $membre->compte->name }} 
				</div>

				@endif

			</div>

			@endif
		</div>

	</form>

</div>
