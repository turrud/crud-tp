<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.explores.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('explores.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.explores.inputs.title')
                        </h5>
                        <span>{{ $explore->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.explores.inputs.description')
                        </h5>
                        <span>{{ $explore->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.explores.inputs.main_image')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $explore->main_image ? \Storage::url($explore->main_image) : '' }}"
                            size="150"
                        />
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('explores.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Explore::class)
                    <a href="{{ route('explores.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\ExploreImage::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Explore Images </x-slot>

                <livewire:explore-explore-images-detail :explore="$explore" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\explore_tagexplore::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Tagexplores </x-slot>

                <livewire:explore-tagexplores-detail :explore="$explore" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>