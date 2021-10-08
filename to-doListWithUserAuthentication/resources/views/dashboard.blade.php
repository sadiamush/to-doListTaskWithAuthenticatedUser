<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

                 <!-- show task list of authenticate user -->
        @if(count($postData)>0)
            <div class="flex flex-col px-10 mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Task Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($postData as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$data->user->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$data->task_name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                   <a href="{{url('/delete/task/'.$data->id)}}" class="rounded-full bg-red-600 text-white p-2">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        @endif
                         <!-- Toastr of success -->
    <script>
        @if(session("data"))
           toastr.success("{{session('data')}}");
        @endif
        @if(session("delData"))
           toastr.error("{{session('delData')}}");
        @endif
    </script>
    


</x-app-layout>
