@extends('layouts.dashboard-general')

@section('content')

<h1>User</h1>

<div class="flex flex-col mt-4">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="bg-white border-b">
              <tr>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                รหัส
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                  ชื่อ-สกุล
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                  อีเมลล์
                </th>
                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                  วันที่สร้าง
                </th>
              </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
              <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">  {{ $user->id }}</td>

                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                  {{ $user->name }}
                </td>
                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                  {{ $user->email }}
                </td>
                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                  {{ $user->created_at }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="mt-4">
            {{ $users->links() }}
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
