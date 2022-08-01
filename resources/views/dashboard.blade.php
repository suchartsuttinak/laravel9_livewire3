@extends('layouts.dashboard')

@section('content')
<header class="flex items-center justify-between w-full">
    <div class="flex items-center">
        <!-- if your user doesnt have any avatar, you can uncomment th code bellow -->
        <!-- <span class="px-4 py-3 text-white rounded-full bg-theme-primary">M</span> -->
        <img src="{{ Auth::user()->profile_photo_path != null ? asset('storage/'.Auth::user()->profile_photo_path)
                 : asset('storage/nopic.png') }}"
                   class="rounded-full h-14 w-14" alt="User Avatar">

        <div class="ml-5">
            <h5 class="font-bold">สวัสดี คุณ{{ Auth::user()->name }}!</h5>
            <small class="text-gray-500">These are stats for your dashboard</small>
        </div>
    </div>
    <div class="hidden md:block">
        <button class="btn btn-lg btn-primary">+ Add new task</button>
    </div>
</header>
<!-- Top cards section -->
            <section class="mt-6">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <div class="card hover:shadow">
                        <div class="card-header">
                            <h5>View Our Job</h5>

                            <span class="icon-area">
                                👀
                            </span>
                        </div>
                        <div class="card-body">
                            <h6 class="inline-block font-bold">24.5k </h6>
                            <span class="inline-block badge badge-danger">-21%</span>
                        </div>
                    </div>

                    <div class="card hover:shadow">
                        <div class="card-header">
                            <h5>View Our Job</h5>
                            <span class="icon-area">
                                🧳
                            </span>
                        </div>
                        <div class="card-body">
                            <h6 class="inline-block font-bold">24.5k </h6>
                            <span class="inline-block badge badge-success">-21%</span>
                        </div>
                    </div>

                    <div class="card hover:shadow">
                        <div class="card-header">
                            <h5>View Our Job</h5>
                            <span class="icon-area">
                                🎉
                            </span>
                        </div>
                        <div class="card-body">
                            <h6 class="inline-block font-bold">24.5k </h6>
                            <span class="inline-block badge badge-yellow">-21%</span>
                        </div>
                    </div>

                    <div class="card hover:shadow">
                        <div class="card-header">
                            <h5>View Our Job</h5>
                            <span class="icon-area">
                                🚀
                            </span>
                        </div>
                        <div class="card-body">
                            <h6 class="inline-block font-bold">24.5k </h6>
                            <span class="inline-block badge badge-info">-21%</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Second section -->
            <section class="grid grid-cols-1 gap-4 mt-6 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <div class="card hover:shadow">
                        <div class="justify-between card-header">
                            <h5 class='flex items-center font-bold'>
                                <ion-icon class='mr-2 text-gray-400' name="stats-chart"></ion-icon>
                                Website analytics
                            </h5>

                            <button class="pt-2">
                                <ion-icon name="ellipsis-horizontal"></ion-icon>
                            </button>
                        </div>
                        <div class="card-body">
                            <canvas id="analyticsChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-4">
                    <div class="card hover:shadow">
                        <div class="justify-between mb-4 card-header">
                            <h5 class='flex items-center font-bold'>
                                <ion-icon class='mr-2 text-gray-400' name="notifications"></ion-icon>
                                Recent notifications
                            </h5>

                            <button class="pt-2">
                                <ion-icon name="ellipsis-horizontal"></ion-icon>
                            </button>
                        </div>
                        <div class="space-y-3 card-body">

                            <div class="items-center card card-bg-gray flex-card">
                                <span class="px-2 py-1 mr-3 border border-gray-200 rounded-full">
                                    <ion-icon class='mt-1' name="dice-outline"></ion-icon>
                                </span>
                                <div>
                                    <div class="text-lg font-bold card-header">This notification title</div>
                                    <div class="card-body">
                                        This is notification body, what do you think about it?
                                    </div>
                                </div>
                            </div>

                            <div class="items-center card card-bg-gray flex-card">
                                <span class="px-2 py-1 mr-3 border border-gray-200 rounded-full">
                                    <ion-icon class='mt-1' name="dice-outline"></ion-icon>
                                </span>
                                <div>
                                    <div class="text-lg font-bold card-header">This notification title</div>
                                    <div class="card-body">
                                        This is notification body, what do you think about it?
                                    </div>
                                </div>
                            </div>

                            <div class="items-center card card-bg-gray flex-card">
                                <span class="px-2 py-1 mr-3 border border-gray-200 rounded-full">
                                    <ion-icon class='mt-1' name="dice-outline"></ion-icon>
                                </span>
                                <div>
                                    <div class="text-lg font-bold card-header">This notification title</div>
                                    <div class="card-body">
                                        This is notification body, what do you think about it?
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="text-center card-footer">
                            <a class='block mt-4 text-theme-primary hover:text-theme-darked-primary' href="#">View all</a>
                        </div>
                    </div>
                </div>
            </section>
@endsection
