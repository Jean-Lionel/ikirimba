<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
{{-- {{ $provinces->map->id }} --}}

  
    <div class="row">
    	<div class="col-md-12">
    		  <h2>Liste des membres</h2>
    	</div>
    	<div class="col-md-12">
    		<div class="row">

                 @if(!$isUpdate)
    			
                <div class="col-md-3 col-sm-6">
                    <label for="">Rechercher</label>
                   <input type="text" wire:model="searchValue" placeholder="Saisissez ici" class="form-control">
                </div>

                @endif

    		</div>

            @if($isUpdate)
            <div class="row">
                <div class="col">
        
                    <label for="">Province</label>
                    <select wire:model="selectedProvince" class="form-control  form-control-sm">
                        <option value="" selected>Choisissez une provinces</option>
                        @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">

                    <label for="">Commune</label>
                    <select wire:model="selectCommune" class="form-control  form-control-sm">
                        <option value="" selected>Choisissez une commune</option>
                        @foreach($communes as $commune)
                        <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                        @endforeach
                    </select>
                    

                </div>
                <div class="col">

                     <label for="">Colline</label>
                    <select wire:model="selectColline" class="form-control  form-control-sm">
                        <option value="" selected>Choisissez une colline</option>
                        @foreach($collines as $colline)
                        <option value="{{ $colline->id }}">{{ $colline->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">

                      <label for="">Groupement de base</label>
                    <select wire:model="selectedGroupement" class="form-control  form-control-sm">
                        <option value="" selected>Choisissez une colline</option>
                        @foreach($groupements as $groupement)
                        <option value="{{ $groupement->id }}">{{ $groupement->name }}</option>
                        @endforeach
                    </select>
                    

                </div>
            </div>

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

                    <button wire:click="updatePerson" class="mt-3 btn btn-sm btn-info btn-block">Modifier</button>
                    
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


