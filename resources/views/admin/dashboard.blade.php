@extends('dashboard')
@section('title-dashboard', 'Dashboard - Analytics')
@section('content-dashboard')

    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-600">Total Post</h5>
                        <h3 class="font-bold text-3xl">{{ $count_posts }}<span class="text-green-500"><i
                                    class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--/Metric Card-->
            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-600">Total Categorias</h5>
                        <h3 class="font-bold text-3xl">{{ $count_categories }}<span class="text-green-500"><i
                                    class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--/Metric Card-->
            <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-600">Total Visitantes</h5>
                        <h3 class="font-bold text-3xl">{{ $count_visitors }}<span class="text-green-500"><i
                                    class="fas fa-exchange-alt"></i></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-graph :data="$chart_data" />
    <x-table :columns="['Fecha', 'Visitantes']">
        @forelse ($visitors as $day)
            <x-table-row :row="[date('d.m.Y', strtotime($day->date)), $day->total]" />
        @empty
            <x-table-row :row="['-', 'No hay datos']" />
        @endforelse
    </x-table>

@endsection
