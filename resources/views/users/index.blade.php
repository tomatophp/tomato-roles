<x-tomato-admin-layout>
    <x-slot:header>
        {{ trans('tomato-roles::global.users.index') }}
    </x-slot:header>
    <x-slot:buttons>
        <x-tomato-admin-button :modal="true" :href="route('admin.users.create')" type="link">
            {{trans('tomato-admin::global.crud.create-new')}} {{ trans('tomato-roles::global.users.index') }}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-table :for="$table" striped>
                <x-splade-cell email>
                    <x-tomato-admin-row table type="email" :value="$item->email" />
                </x-splade-cell>

                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-tomato-admin-button success type="icon" title="{{trans('tomato-admin::global.crud.view')}}" modal :href="route('admin.users.show', $item->id)">
                            <x-heroicon-s-eye class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button warning type="icon" title="{{trans('tomato-admin::global.crud.edit')}}" modal :href="route('admin.users.edit', $item->id)">
                            <x-heroicon-s-pencil class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button danger confirm-danger type="icon" title="{{__('Delete User')}}" :href="route('admin.users.destroy', $item->id)"
                                               confirm="{{__('Delete User!')}}"
                                               confirm-text="{{__('Are you sure you want to delete this user?, this action cannot be undone.')}}"
                                               confirm-button="{{__('Delete')}}"
                                               cancel-button="{{__('Cancel')}}"
                                               method="delete"
                        >
                            <x-heroicon-s-trash class="h-6 w-6"/>
                        </x-tomato-admin-button>
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-tomato-admin-layout>
