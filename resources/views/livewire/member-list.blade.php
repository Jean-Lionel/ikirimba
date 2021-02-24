<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


    <link rel="stylesheet" href="{{ asset('css/print_doc.css') }}">

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

    <div>
        <button class="btn btn-info" id="print-btn"><i class="fa fa-print"></i></button>
    </div>
    <div class="row">
    	<table class="" id="test-table">
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

    <div id="printJS-form">

       
        <div class="content-doc">

            <div class="header-doc">
                <div>
                    <p>AEJ BURUNDI</p>
                </div>
                <div style="text-align: right;">
                    LE {{ date('d/M/Y') }}
                </div>
                
            </div>

            <div>
                <h4 style="text-align: center;">Liste des membres</h4>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>PROVINCE</th>
                        <th>COMMUNE</th>
                        <th>COLLINE</th>
                        <th>GROUPEMENT DE BASE</th>
                        <th>NOM ET PRENOM</th>
                        <th>COMPTE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personnes_list as $p)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $p->groupement->name }}</td>
                        <td>{{ $p->fullName }}</td>
                         <td>{{ $p->compte->name }}</td>
                        
                    
                    </tr>

                    @endforeach
                </tbody>
            </table>

            

        </div>


    </div>



</div>


  @push('scripts')

  <script>

    //printJS('printJS-form', 'html');
    
    const  btnPrint = $("#print-btn")

    btnPrint.click(function(event) {
        /* Act on the event */

        $("#printJS-form").show()
       
        printJS({
            printable : 'printJS-form', 
            type : 'html',
            css : "/css/print_doc.css"

        });

        $("#printJS-form").hide()
    });
      

  </script>


  @endpush