<div>
	{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

	<div class="row">
		<h5 class="text-center col-md-12">Les informations des comptes</h5>
		<div class="col-md-6">

			<ul class="list-group">

				<li class="list-group-item">
					Numéro de compte
					<input type="text" wire:model="compteName">
					{{-- {{ $compteName}} --}}
					
				</li>

				<li class="list-group-item">

					@if ($compte)
					{{-- expr --}}
					<span>Nom et prénom : {{ $compte->membre->fullName }}</span> <br> <br>
					<span>Montant : {{number_format( $compte->montant )}} FBU</span>
					@else
					<span>INVALID COMPTE</span>

					@endif
					
				</li>

				<li class="list-group-item">
					@if($membre)
					<h5 class="text-center">Parent</h5>
					<p>
						{{$membre->parentDirect()->fullName ?? "" }}
					</p>

					@endif
				</li>

			</ul>

		</div>

		<div class="col-md-6">

			@if($membre)

			<ul class="list-group">
				<li class="list-group-item">
					<h5>Liste des enfants</h5>
					{{-- {{ $membre->findChildren()}} --}}
					<ul class="list-group">
					@forelse ($membre->findChildren() as $key=> $enfant)
					 <li class="list-group-item">
					 	{{ ++$key}} : {{ $enfant->fullName}}
					 	
					 </li>
					@empty
					<p>Aucun enfant</p>
					@endforelse
					</ul>
				</li>

				<li class="list-group-item">
					<h5>Abo binjiriye rimwe</h5>
					{{-- {{ $membre->findChildren()}} --}}
					<ul class="list-group">
					@forelse ($membre->simblings() as $key=> $enfant)
					 <li class="list-group-item">
					 	{{ ++$key}} : {{ $enfant->fullName}}
					 	
					 </li>
					@empty
					<p>Aucun enfant</p>
					@endforelse
					</ul>

				</li>
				
			</ul>
			@endif

		</div>
	</div>
</div>
