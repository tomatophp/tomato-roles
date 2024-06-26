<x-tomato-admin-layout>
    <x-slot:header>
        {{trans('tomato-roles::global.roles.index')}}
    </x-slot:header>
    <x-slot:icon>
        bx bxs-lock
    </x-slot:icon>
    <x-slot:buttons>
        <x-tomato-admin-button :href="route('admin.roles.create')" type="link">
            {{trans('tomato-admin::global.crud.create-new')}} {{trans('tomato-roles::global.roles.single')}}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-table :for="$table" striped>
                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-tomato-admin-button modal success type="icon" title="{{trans('tomato-admin::global.crud.view')}}"  :href="route('admin.roles.show', $item->id)">
                            <x-heroicon-s-eye class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button warning type="icon" title="{{trans('tomato-admin::global.crud.edit')}}"  :href="route('admin.roles.edit', $item->id)">
                            <x-heroicon-s-pencil class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button danger type="icon" title="{{trans('tomato-admin::global.crud.delete')}}" :href="route('admin.roles.destroy', $item->id)"
                                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
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
