<div>
	{{-- In work, do what you enjoy. --}}


	<div class="text-center">
		 <div wire:loading.delay>
	        <div class="spinner-border" role="status">
	  			<span class="sr-only">Loading...</span>
			</div>
	    </div>
	</div>


	<form action="" wire:submit.prevent="saveContribution">

		<div class="row">

			<div class="col-md-12">
				<h4>Ajouter une contribution</h4>
			</div>


			<div class="col-md-4">
				<div class="form-group">
					@if(session()->has('message'))
					<div class="alert alert-primary" role="alert">
						{{ session('message') }}
					</div>

					@endif

					@if(session()->has('error'))
					<div class="alert alert-danger" role="alert">
						{{ session('error') }}
					</div>

					@endif
				</div>
				<div class="form-group">

					<label for="">Saisir le code du membre</label>
					<input type="text" placeholder="Saisir le code du membre" wire:model="compteName" class="form-control">

					@error('compteName')
					<span>{{ $message }}</span>
					@enderror

					@if ($compte)
					{{-- expr --}}
					<span>Nom et prénom : {{ $compte->membre->fullName }}</span> <br>
					<span>Montant : {{ $compte->montant }}</span>

					@else
					<span>INVALID COMPTE</span>

					@endif

				</div>


				@if ($compte)

				<div class="form-group">
					<label for="">TYPE DE CONTRIBUTION</label>
					<select class="form-control" name="" wire:model="type_contribution" id="">
						<option value="">Choisissez le type de contribution</option>
			
						<option value="COTISATION MENSUELLE">COTISATION MENSUELLE</option>
						
						<option value="COTRIBUTION AU PROJET">COTRIBUTION AU PROJET</option>
					</select>

					@error('type_contribution')
					<span class="error text-danger">{{ $message }}</span>

					@enderror

				</div>
				<div class="form-group">
					<label for="">Montant</label>
					<input type="number" class="form-control" wire:model="montant">
					@error('montant')
					<span class="error text-danger">{{ $message }}</span>
					@enderror

				</div>


				<div class="form-group">
					<input type="submit" value="Enregistrer" class="btn btn-sm btn-block btn-info">
				</div>
				@endif

			</div>

			<div class="col-md-8">
		

				<div class="row">
				{{-- 	<div class="col w-2">
						<select wire:change="numberPerPage" class="form-control-sm">
							@for($i=0; $i<200; $i+=20)
							<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
					</div> --}}
					<div class="col"><input class="form-control" wire:model="searchValue" type="text" placeholder="Rechercher ici !!!"></div>
					
					
					
				</div>
				<table class="table table-sm">
					<thead class="badge-dark">
						<tr>
							<th>
								#
							</th>
							<th>NUMERO DU MEMBRE</th>
							<th>CODE DE TRANSACTION</th>
							<th>NOM ET PRENOM</th>
							<th>TYPE DE CONTRIBUTION</th>
							<th>MONTANT</th>
							<th>DATE</th>
						</tr>
					</thead>

					<tbody>
						@foreach($contributions as $contribution)
						<tr>
							<td>{{ $contribution->id }}</td>
							<td>{{ $contribution->compte_name }}</td>
							<td>{{ $contribution->code_transaction }}</td>
							<td>{{ $contribution->membre->fullName }}</td>
							<td>{{ $contribution->type_contribution }}</td>
							<td>{{ $contribution->montant }}</td>
							<td>{{ $contribution->created_at }}</td>
							
						</tr>

						@endforeach
					</tbody>
				</table>

				{{ $contributions->links() }}
			</div>
		</div>
	</form>
</div>
