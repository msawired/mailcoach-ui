<div  step="2">

    You have arrived at the next step

    <div id="back" class="underline mt-2" wire:click="previousStep">Go back</div>


    <div>My count: {{ $this->counter }}</div>
    <div>My value: {{ $this->myValue }}</div>

    <div class="underline" id="increment" wire:click="increment">Increment</div>


    <form class="mt-2" wire:submit.prevent="submit">

        <div>
            <label>Name</label>
            <input type="text" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="text" wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button class="underline" type="submit">Save Contact</button>
    </form>



</div>
