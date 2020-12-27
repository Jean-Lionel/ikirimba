<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
{{-- {{ $provinces->map->id }} --}}

  
    <div class="row">
    	<div class="col-md-4">
    		  <h2>Liste des membres</h2>
              <div><a href="{{ route('people.create') }}" class="btn btn-sm btn-info btn-block">Nouveau Membre</a></div>
    	</div>
    	<div class="col-md-8">
    		<div class="row">
    			<div class="col-md-3 col-sm-6">
    				<label for="">Province</label>
    				<select name="" wire:model="selectedProvince" id="" class="form-control form-control-sm">
    					<option value="">Choisissez ....</option>

    					@foreach($provinces as $province)
    					<option value="{{ $province->id }}">{{ $province->name }}</option>

    					@endforeach
    				</select>
    			</div>
    			<div class="col-md-3 col-sm-6">
    				<label for="">Commune</label>
    				<select name="" wire:model="selectCommune" id="" class="form-control form-control-sm">
                        <option value="">Choisissez ....</option>
                        @foreach($communes as $commune)
                        <option value="{{ $commune->id }}">{{ $commune->name }}</option>

                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 col-sm-6">
                    <label for="">Colinne</label>
                    <select name="" id="" wire:model="selectColline" class="form-control form-control-sm">
                        <option value="">Choisissez ici ....</option>
                        @foreach($collines as $colline)
                        <option value="{{ $colline->id }}">{{ $colline->name }}</option>

                        @endforeach
                    </select>
                </div>
    			
    			<div class="col-md-3 col-sm-6">
    				<label for="">Groupement</label>
    				<select name="" id="" wire:model="selectedGroupement" class="form-control form-control-sm">
                        <option value="">Choisissez ici ....</option>
                        @foreach($groupements as $groupement)
                        <option value="{{ $groupement->id }}">{{ $groupement->name }}</option>

                        @endforeach
                        
                    </select>
    			</div>
    		</div>
    		
    	</div>

    	<div class="col-md-12">
    		<table class="table">
    			<thead class="badge-dark">
    				<tr>
    					<th>#</th>
    					<th>CODE</th>
    					<th>NOM</th>
    					<th>PRENOM</th>
    					<th>TELEPHONE</th>
    					<th>CNI</th>
    					<th>COLINE</th>
    					<th>GROUPEMENT</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($persons as $person)

    				<tr>
    					<td>{{ $person->id }}</td>
    					<td>{{ $person->compte->name ?? '' }}</td>
    					<td>{{ $person->first_name }}</td>
    					<td>{{ $person->last_name }}</td>
    					<td>{{ $person->telephone }}</td>
    					<td>{{ $person->cni }}</td>
    					<td>{{ $person->groupement->colline->name ?? "" }}</td>
    					<td>{{ $person->groupement->name ?? "" }}</td>
    				
    				</tr>


    				@endforeach


    			</tbody>
    		</table>



             <div style="height: 100px; width: 100%; overflow: hidden;">
           {{ $persons->links() }}
             </div>
    	</div>
    </div>
</div>
