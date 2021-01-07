<div>
	{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

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
					<label for="">Groupement</label>
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

				@if($membre != null)

				<div class="badge-dark col-md-12">
					{{$membre->first_name.' '. $membre->last_name }} : {{ $membre->compte->name }} 
				</div>

				@endif
				<div class="form-group">
					<label for="">Nom</label>
					<input wire:model="first_name" type="text" required="" class="form-control form-control-sm">
				</div>
				<div class="form-group">
					<label for="">Prénom</label>
					<input wire:model="last_name" type="text" required="" class="form-control form-control-sm">
				</div>

				<div class="form-group">
					<label for="">Sexe</label>
					<div class="d-flex">
						<label for="homme">HOMME</label>
						<input id="homme" wire:model="sexe"  name="sexe" type="radio"  value="HOMME" class="form-control form-control-sm">

						<label for="femme">FEMME</label>

						<input id="femme" wire:model="sexe" name="sexe" type="radio" value="FEMME" class="form-control form-control-sm">
					</div>
				</div>

				<div class="form-group">
					<label for="">MONTANT</label>
					<input wire:model="montant" type="number" required="" class="form-control form-control-sm">
					@error('montant')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
				</div>

				<div class="form-group">
					<label for="">NUMERO DE COMPTE DU PARRANT</label>

					<input type="text" wire:model="parent_code">
					
					@error('parent_code')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
					
				</div>


				<div class="form-group">
					<label for="">CNI</label>
					<input wire:model="cni" type="text" required="" class="form-control form-control-sm">
				</div>

				<div class="form-group">
					<label for="">Téléphone</label>
					<input wire:model="telephone" type="text" required="" class="form-control form-control-sm">
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
