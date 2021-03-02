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
                        <button class="btn-info" wire:click="showFormChangePassWord()">Modifier Le mot de pass</button>
                    </li>
                    @if($message)

                    <li class="list-group-item">
                        {!! $message !!}
                        

                    </li>


                    @endif

                   @if($showForm)
                   <li class="list-group-item">
                        <label for="">Nouveau Mot de pass</label>
                       <input type="password" wire:model="passWord" class="form-control">
                        @error('passWord')
                            <p class="error text-danger">{{ $message }}</p>
                       @enderror
                       <label for="">Confirm votre Mot de pass</label>

                       <input type="password" wire:model="confirmPassWord" class="form-control">

                        @error('confirmPassWord')
                             <p class="error text-danger">{{ $message }}</p>
                       @enderror
                       
                       <div class="d-flex mt-3 justify-content-center">
                        <button class="btn-info mr-3" wire:click="changePassWord">Change</button>
                        <button class="btn-warning ml-3" wire:click="annulerModification">Annuler</button>
                           
                       </div>

                   </li>

                   @endif
    				
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
