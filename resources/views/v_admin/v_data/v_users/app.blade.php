@include('base.start')
@include('base.navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexch arts.css">
    <!-- Styles lainnya -->
    @stack('styles')
</head>

<body>
    <!-- strat wrapper -->
    <div class="flex h-screen">
        @include('base.sidebar')
        <div class="bg-white rounded-xl w-full">
            <h2 class="text-sm font-bold mb-4 p-5">Users</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b text-gray-500">
                        <tr>
                            <th class="py-3 px-4">User</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Username</th>
                            <th class="py-3 px-4">Phone</th>
                            <th class="py-3 px-4">Address</th>
                            <th class="py-3 px-4">Joined</th>
                            <th class="py-3 px-4">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-gray-50">
                                <!-- User -->
                                <td class="py-4 flex items-center gap-3 py-3 px-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-xs">
                                        {{ strtoupper(substr($user->first_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-xs">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </p>
                                        <p class="text-[11px] text-gray-500 truncate w-32">
                                            {{ $user->email }}
                                        </p>
                                    </div>
                                </td>

                                <td class="text-xs py-3 px-4">{{ $user->email }}</td>
                                <td class="text-xs py-3 px-4">{{ $user->username }}</td>
                                <td class="text-xs py-3 px-4">{{ $user->phone ?? '-' }}</td>

                                <td class="text-xs  py-3 px-4">
                                    {{ $user->address ?? '-' }}
                                </td>

                                <td class="text-xs">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>

                                <!-- Action -->
                                <td class="text-right">
                                    {{-- <a href="{{ route('users.show', $user->id) }}"
                                        class="text-blue-500 text-xs font-semibold">
                                        Detail
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</body>