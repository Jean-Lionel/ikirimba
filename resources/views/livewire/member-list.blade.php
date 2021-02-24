<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="row">
    	<div class="col">
    		Province <br>

    		<select wire:model="selectedProvince" name="" id="">
    			<option value="">Choisissez</option>
    			@foreach($provinces as $province)
    			<option value="{{ $province->id }}">
    				{{ $province->name }}
    			</option>
    			@endforeach
    		</select>

    		{{-- {{ $selectedProvince }} --}}
    	</div>
    	<div class="col">
    		Commune <br>
    		<select wire:model="selectCommune" name="" id="">
    			<option value="">Choisissez</option>
    			@foreach($communes as $commune)
    			<option value="{{ $commune->id }}">
    				{{ $commune->name }}
    			</option>
    			@endforeach
    		</select>
    	</div>
    	<div class="col">
    		Coline <br>

    		<select wire:model="selectColline" name="" id="">
    			<option value="">Choisissez</option>
    			@foreach($collines as $colline)
    			<option value="{{ $colline->id }}">
    				{{ $colline->name }}
    			</option>
    			@endforeach
    		</select>
    	</div>
    	<div class="col">
    		Groupement <br>
            <select wire:model="selectGroupement" name="" id="">
                <option value="">Choisissez</option>
                @foreach($groupements as $groupement)
                <option value="{{ $groupement->id }}">
                    {{ $groupement->name }}
                </option>
                @endforeach
            </select>
    	</div>
    	<div class="col">
    		Nom et prénom <br>
            <input type="text" wire:model="searchKey">
    	</div>
    	
    </div>

    <div class="row">
    	<table class="table-hover table">
    		<thead>
    			<tr>
    				<th>Numéro</th>
                    <th>Compte du Membre</th>
    				<th>Nom et Prénom</th>
    				<th>Groupement de base</th>
    				<th>Date</th>
    			</tr>
    		</thead>

    		<tbody>
    			@foreach($personnes as $key=> $personne)

    			<tr>
    				<td>{{ ++$key }}</td>
                    <td>{{ $personne->compte->name }}</td>
    				<td>{{ $personne->fullName }}</td>
    				<td>{{ $personne->groupement->name }}</td>
    				
    				<td>{{ $personne->created_at->format('d/m/Y') }}</td>
    			</tr>

    			@endforeach
    		</tbody>
    	</table>
        {{ $personnes->links()}}


    </div>



</div>


  @push('scripts')

  <script>
      
      
  </script>


  @endpush