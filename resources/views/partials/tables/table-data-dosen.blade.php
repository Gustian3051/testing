<div class="relative overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" style="100%"
        id="data-barang">
        <thead class=" text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Dosen
                </th>
                <th scope="col" class="px-6 py-3">
                    NIDN/NIP
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataDosen as $data)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="col" class="px-6 py-3">
                        {{ $loop->iteration }}
                    </td>
                    <td scope="col" class="px-6 py-3">
                        {{ $data->nama }}
                    </td>
                    <td scope="col" class="px-6 py-3">
                        {{ $data->nidn }}
                    </td>
                    <td scope="col" class="px-6 py-3">
                        {{ $data->username }}
                    </td>
                    <td scope="col" class="flex items-center gap-2 px-6 py-3 justify-center">
                        <div>
                            <button type="button" data-modal-target="detail{{ $data->id }}"
                                data-modal-toggle="detail{{ $data->id }}"
                                class="flex items-center px-2 py-2 text-sm text-white bg-yellow-400 rounded">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        <div>
                            <form id="delete-form-{{ $data->id }}" action="{{ route('dosen.destroy', $data->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $data->id }})"
                                    class="flex items-center px-2 py-2 text-sm text-white bg-red-500 rounded">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div>
                            <button type="button" data-modal-target="edit{{ $data->id }}"
                                data-modal-toggle="edit{{ $data->id }}"
                                class="flex items-center px-2 py-2 text-sm text-white bg-blue-500 rounded">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                @include('partials.modals.detail.modal-dosen', ['dataDosen' => $dataDosen])

                @include('partials.modals.edit.modal-dosen', ['dataDosen' => $dataDosen])
            @endforeach
        </tbody>
    </table>
</div>