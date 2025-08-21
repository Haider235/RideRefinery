<x-app-layout>

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Orders</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Customer</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="border px-4 py-2">{{ $order->id }}</td>
                <td class="border px-4 py-2">{{ $order->first_name }} {{ $order->last_name }}</td>
                <td class="border px-4 py-2">{{ $order->email }}</td>
                <td class="border px-4 py-2">${{ $order->amount }}</td>
                <td class="border px-4 py-2 capitalize">{{ $order->status }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-500">View</a>
                    <a href="{{ route('admin.orders.edit', $order) }}" class="text-green-500">Edit</a>
                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
</x-app-layout>