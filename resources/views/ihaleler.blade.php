<x-app-layout>

    <div class="py-4 pt-3">
        <center>
            <x-primary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'authentication-modal')"
                >{{ __('İhale Dosyası Oluştur') }}
            </x-primary-button>
            <x-modal name="authentication-modal" focusable>
                <form method="post" action="{{ route('bids.store') }}" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('post')
        
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Lütfen ihale detaylarını girin!') }}
                    </h2>
        
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Yükleme sırasında bir hatayla karşılaşırsanız sistem yöneticisine başvurun!') }}
                    </p>
        
                    <div class="mt-6">
                        <x-input-label  value="{{ __('Parola') }}" class="sr-only" />
        
                        <x-text-input
                            name="bid_name"
                            type="text"
                            class="mt-1 block w-3/4"
                            placeholder="İhale No"
                        />
                    </div>
                    
                    <div class="mt-6">
                        <x-input-label  value="{{ __('Parola') }}" class="sr-only" />
        
                        <x-text-input
                            name="bid_date"
                            type="date"
                            class="mt-1 block w-3/4"
                            placeholder="İhale Tarihi"
                        />
                    </div>

                    <div class="mt-6">
        
                        <x-text-input
                            name="file"
                            type="file"
                            class="mt-1 block w-3/4"
                        />
                    </div>
        
                    <div class="mt-6 flex justify-end">
                       
                        <x-secondary-button class="ml-3" x-on:click="$dispatch('close')">
                            {{ __('Vazgeç') }}
                        </x-secondary-button>
        
                        <x-primary-button class="ml-3">
                            {{ __('Kaydet') }}
                        </x-primary-button>
        
                    </div>
                </form>
            </x-modal>
            </center>

        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <table id="example2" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>İhale No</th>
                        <th>İhale Tarihi</th>
                        <th>Fotoğraf</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bids as $bid)
                        
                    <tr>
                        <td>{{$bid->name}}</td>
                        <td>{{\Carbon\Carbon::parse($bid->date)->format('d/m/Y')}}</td>
                        <td><img src="{{$bid->getFirstMediaUrl()}}"/></td>
                    </tr>
                    
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>İhale No</th>
                        <th>İhale Tarihi</th>
                        <th>Fotoğraf</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>
