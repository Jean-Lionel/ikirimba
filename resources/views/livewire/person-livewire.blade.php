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
	 @can('is-admin')

	<div class="row container mb-2">

		<div class="btn-group" role="group" aria-label="Basic example">
			<button wire:click="$set('showForm',true)" type="button" class="btn btn-secondary">Adhésion du membre</button>
			<button wire:click="$set('showForm',false)" type="button" class="btn ml-2 btn-primary">
				<i class="fas far fa-bell"></i><span class="badge badge-light">{{ $membreNonApprouver->count() }}</span> Approuver 
			</button>
			
		</div>

		
	</div>

	@endcan

	@if($showForm)
	<form action="">

		<div class="row">
			<div class="col-md-6">
				<h6>IDENTIFICATION DU NOUVEAU MEMBRE DANS LE L.C.P.C</h6>

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

				{{-- <div class="form-group row container">
					<label class="col-8" for="">Numéro du Indirrect</label>

					<input type="text" class="col-4" wire:model="code_parrent_indirect">
					
					@error('code_parrent_indirect')
					<p class="error text-danger">{{ $message }}</p>
					@enderror
					
				</div> --}}


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

	@else

	<div class="row container">
		<table class="table-hover table-bordered table-sm">
			<thead>
				<tr>
					<th>Nom et prénom</th>
					<th>Téléphone</th>
					<th>Région</th>
					
					<th>Parrainage</th>
					<th>Action</th>
				</tr>
				
			</thead>

			<tbody>

				@foreach($membreNonApprouver as $key=>$membre )
				<tr>
					<td>{{ $membre->first_name . ' '.$membre->last_name }}</td>
					<td>{{ $membre->telephone }}</td>
					<td>
						<ul class="list-group">
							<li class="list-group-item">
								Groupement :{{$membre->groupement->name ?? ""  }}
							</li>
							<li class="list-group-item">
								Colline :{{$membre->groupement->colline->name ?? ""  }}
							</li>

							<li class="list-group-item">
								Commune :{{$membre->groupement->colline->commune->name ?? ""  }}
							</li>

							<li class="list-group-item">
								Province :{{$membre->groupement->colline->commune->province->name  ?? "" }}
							</li>
						</ul>
					</td>

					<td>
						<ul class="list-group">
							<li class="list-group-item">PARRANT DIRRECT
								@php
								$person = $membre->getPersonneById($membre->code_parrent) ;
								$parent_2 = $membre->getPersonneByCompteName($membre->code_parrent_indirect);
								@endphp
								<br>
								Nom et Prénom :
								{{$person->first_name .' '.$person->last_name }} <br>

								NUMERO : {{ $person->compte->name ?? "" }}

							</li>

							<li class="list-group-item bg-info">
								PARRANT INDIRRECT <br>

								Nom et Prénom :
								{{$parent_2->first_name ?? "".' '.$parent_2->last_name ?? ""}}
								<br>

								NUMERO : {{ $parent_2->compte->name ?? "" }}


							</li>
							
						</ul>
					</td>

					<td>
						<button wire:click="approuverEnregistrement({{ $membre->id }})"> Appouver</button>
						{{-- <button wire:click="refuserEnregistrement({{  $membre->id }})" onclick="return confirm('êtez-vous sur ?')"> Refuser</button>
 --}}

						@if($confirming===$membre->id)
						<button wire:click="refuserEnregistrement({{ $membre->id }})"
							class="btn-info">Sure?</button>
						<button class="btn-warning" wire:click="$set('confirming', false)" >NON</button>
						@else
						<button wire:click="confirmDelete({{ $membre->id }})"
								class="btn-danger">Delete</button>
								@endif

								
							</td>
						</tr>

						@endforeach
						
					</tbody>
				</table>
			</div>



			@endif

		</div>
