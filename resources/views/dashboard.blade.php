<x-app-layout>

    <div class="py-4 pt-3">
    <center>
    <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'authentication-modal')"
        >{{ __('Excel Dosyası Yükle') }}
    </x-primary-button>
    <x-modal name="authentication-modal" focusable>
        <form method="post" action="{{ route('file-import') }}" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('post')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Yüklemek istediğiniz Excel dosyasını seçin!') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Yükleme sırasında bir hatayla karşılaşırsanız lütfen örnek Excel dosyasını inceleyin.') }}
            </p>

            <div class="mt-6">
                <x-input-label  value="{{ __('Parola') }}" class="sr-only" />

                <x-text-input
                    name="file"
                    type="file"
                    class="mt-1 block w-3/4"
                />
            </div>

            <div class="mt-6 flex justify-end">
               
                <x-secondary-button class="mr-5" target="_blank">
                  <a href="/ornek-excel.xlsx" > {{ __('Örnek Dosya İNDİR') }}</a>
                </x-secondary-button>
                <x-secondary-button class="ml-3" x-on:click="$dispatch('close')">
                    {{ __('Vazgeç') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Yükle') }}
                </x-primary-button>

            </div>
        </form>
    </x-modal>
    </center>

        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8 pt-2">
            <table id="example" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>Malzeme Adı</th>
                        <th>İrsaliye Tarihi</th>
                        <th>İrsaliye No</th>
                        <th>Fatura Tarihi</th>
                        <th>Fatura No</th>
                        <th>Hareket Yönü</th>
                        <th>Sevk Yeri</th>
                        <th>Birim</th>
                        <th>Çıkış Miktar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $post)
                    <tr>
                        <td> {{$post->product_name}} </td>
                        <td> {{\Carbon\Carbon::parse($post->waybill_date)->format('d/m/Y')}} </td>
                        <td> {{$post->waybill_number}} </td>
                        <td> {{\Carbon\Carbon::parse($post->invoice_date)->format('d/m/Y')}} </td>
                        <td> {{$post->bill_number}} </td>
                        <td> {{$post->movement_direction}} </td>
                        <td> {{$post->dispatch_place}} </td>
                        <td> {{$post->unit}} </td>
                        <td> {{$post->output_quantity}} </td>

                        {{-- <td class="v-align-middle">
                            <p>
                              <form action="{{route('product.destroy',$post->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <x-primary-button class="ml-3">
                                    {{ __('SİL') }}
                                </x-primary-button>
                              </form>
                            </p>
                        </td> --}}

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Malzeme Adı</th>
                        <th>İrsaliye Tarihi</th>
                        <th>İrsaliye No</th>
                        <th>Fatura Tarihi</th>
                        <th>Fatura No</th>
                        <th>Hareket Yönü</th>
                        <th>Sevk Yeri</th>
                        <th>Birim</th>
                        <th>Çıkış Miktar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
</x-app-layout>
