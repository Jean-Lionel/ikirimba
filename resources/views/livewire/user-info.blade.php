<div>
    {{-- Be like water. --}}

    <div class="container mt-4 mb-2">
    	<h5  class="text-center">information du Memebre</h5>
    	
    	<div class="row">

    		<div class="col-md-6">
    			<ul class="list-group">
    				<li class="list-group-item">Nom et prénom : {{ $connected_user->name }} </li>
    				<li class="list-group-item">
    					Compte : {{ $connected_user->compteName }}
    				</li>
    				<li class="list-group-item">
    					Nom d'utilisateur : {{ $connected_user->username }}
    				</li>
    				<li class="list-group-item">
    					Contact : {{ $connected_user->email }}
    				</li>

                    <li class="list-group-item">
                        <button>Modifier Le mot de pass</button>
                    </li>
    				
    			</ul>
    		</div>
    		<div class="col-md-6">
    			

    			<ul class="list-group">
    				<li class="list-group-item">Balance , Compte : {{ number_format($compte->montant) }} FBU</li>
    				
    			</ul>
    		</div>
    		
    	</div>
    </div>
   

</div>
