<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
{{-- {{ $provinces->map->id }} --}}

  
    <div class="row">
    	<div class="col-md-12">
    		  <h2>Liste des membres</h2>
    	</div>
    	<div class="col-md-12">
    		<div class="row">
    			
                <div class="col-md-3 col-sm-6">
                    <label for="">Rechercher</label>
                   <input type="text" wire:model="searchValue" placeholder="Saisissez ici" class="form-control">
                </div>


    		</div>

            @if($isUpdate)

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" wire:model="first_name" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Prénom</label>
                        <input type="text" wire:model="last_name" class="form-control form-control-sm">
                    </div>

                </div>
               
                <div class="col-md-3">
                     <div class="form-group">
                        <label for="">Téléphone</label>
                        <input type="text" wire:model="telephone" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-3 pt-3">

                    <button wire:click="updatePerson" class="mt-3 btn btn-sm btn-info">Modifier</button>
                    
                </div>
            </div>

            @endif
    		
    	</div>

    	<div class="col-sm-12">
    		<table class="table-sm table table-hover">
    			<thead class="badge-dark">
    				<tr>
    					<th>N°</th>
    					<th>COMPTE DU MEMBRE</th>
    					<th>NOM</th>
    					<th>PRENOM</th>
    					<th>TELEPHONE</th>
    					
    					<th>COLINE</th>
    					<th>GROUPEMENT</th>
                        <th>Date</th>
                        <th>Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($persons as $key =>$person)

    				<tr>
    					<td>{{ ++$key }}</td>
    					<td>{{ $person->compte->name ?? '' }}</td>
    					<td>{{ $person->first_name }}</td>
    					<td>{{ $person->last_name }}</td>
    					<td>{{ $person->telephone }}</td>
    					<td>{{ $person->groupement->colline->name ?? "" }}</td>
                        <td>{{ $person->groupement->name ?? "" }}</td>
                        <td>{{ $person->created_at }}</td>
    					

                        <td>
                            <button wire:click="modifier({{ $person->id }})" class="btn btn-warning btn-sm">Modifier</button>
                        </td>
    				
    				</tr>

    				@endforeach


    			</tbody>
    		</table>



          
           {{ $persons->links() }}
             
    	</div>
    </div>
</div>
