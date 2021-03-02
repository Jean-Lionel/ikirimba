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
					<input type="text" placeholder="Saisir le code du membre" wire:model="compteName" class="form-control form-control-sm">

					@error('compteName')
					<span>{{ $message }}</span>
					@enderror

					@if ($compte)
					{{-- expr --}}
					<span>Nom et prénom : {{ $compte->membre->fullName }}</span> <br>
					{{-- <span>Montant : {{ $compte->montant }}</span> --}}

					@else
					<span>INVALID COMPTE</span>

					@endif

				</div>


				@if ($compte)

				<div class="form-group">
					<label for="">TYPE DE CONTRIBUTION</label>
					<select class="form-control form-control-sm" name="" wire:model="type_contribution" id="">
						<option value="">Choisissez le compte à créditer</option>
			
						<option value="A.E.J.T-BURUNDI">A.E.J.T-BURUNDI</option>
						
						{{-- <option value="COTRIBUTION AU PROJET">COTRIBUTION AU PROJET</option> --}}
					</select>
					@if($type_contribution)
					<p>COMPTE : 3350</p>
					<p>ECOCASH : 79 742 610</p>
					@endif

					@error('type_contribution')
					<span class="error text-danger">{{ $message }}</span>

					@enderror

				</div>
				

				<div class="form-group">
					<label for="">Nom et prénom du membre</label>
					<input type="text" wire:model="person_name" class="form-control form-control-sm">
					
				</div>

				<div class="form-group">
					<label for="">Montant depose</label>
					<input type="text" class="form-control form-control-sm" wire:model="montant">
					@error('montant')
					<span class="error text-danger">{{ $message }}</span>
					@enderror
				</div>


				<div class="form-group">
					<input type="submit" value="Valider" class="btn btn-sm btn-block btn-info">
				</div>
				@endif

			</div>

			@can('is-admin')

			<div class="col-md-12 col-sm-12">
		

				<div class="row">
				{{-- 	<div class="col w-2">
						<select wire:change="numberPerPage" class="form-control-sm">
							@for($i=0; $i<200; $i+=20)
							<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
					</div> --}}
					<div class="col-md-4"><input class="form-control" wire:model="searchValue" type="text" placeholder="Rechercher ici !!!"></div>
					
					
					
				</div>


				<h4>Liste des contributions</h4>
				<table class="table table-sm table-hover">
					<thead class="badge-dark">
						<tr>
					
							<th>NUMERO DU MEMBRE</th>
							<th>CODE DE TRANSACTION</th>
							<th>NOM ET PRENOM</th>
							<th>TYPE DE CONTRIBUTION</th>
							<th>COMPTE CREDITER</th>
							<th>MONTANT</th>
							<th>DATE</th>
						</tr>
					</thead>

					<tbody>
						@foreach($contributions as $contribution)
						<tr>
							
							<td>{{ $contribution->compte_name }}</td>
							<td>{{ $contribution->code_transaction }}</td>
							<td>{{ $contribution->membre->fullName }}</td>
							<td>{{ $contribution->type_contribution }}</td>
							<td>3350</td>
							<td>{{ $contribution->montant }}</td>
							<td>{{ $contribution->created_at }}</td>
							
						</tr>

						@endforeach
					</tbody>
				</table>

				{{ $contributions->links() }}
			</div>

			@endcan
		</div>
	</form>
</div>
