<div class="grid grid-cols-[200px_200px] gap-5 flex items-center text-black">
    <select name="role"
        wire:model="key_employee_inputs.{{ $key }}.user_role_id">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}"
                @if ($role->id == old('role'))
                    selected="selected"
                @endif
                >{{ $role->name }}</option>
        @endforeach
    </select>

    <select name="user"
        wire:model="key_employee_inputs.{{ $key }}.user_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                @if ($user->id == old('user'))
                    selected="selected"
                @endif
                >{{ $user->name }}</option>
        @endforeach
    </select>
</div>