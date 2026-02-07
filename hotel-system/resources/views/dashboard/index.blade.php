@extends('layouts.dashboard')

@section('content')

{{-- Page Header --}}
<div class="mb-8">
<h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
    សូមស្វាគមន៍មកកាន់ទំព័រ <span class="text-indigo-700">ដើម</span>
  </h1>
  <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
    Overview of your application
  </p>
</div>
<div class="space-y-4">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="relative w-full md:w-96 group">
            <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-neutral-500 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35M19 11a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"/></svg>
            </div>
            <input type="text" id="table-search" class="block w-full p-2.5 ps-10 text-sm text-neutral-900 border border-neutral-200 rounded-xl bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-neutral-900 dark:border-white/10 dark:placeholder-neutral-400 dark:text-white transition-all" placeholder="Global search guests...">
        </div>

        <div class="flex items-center gap-2">
            <button type="button" class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-neutral-700 bg-white border border-neutral-200 rounded-xl hover:bg-neutral-50 dark:bg-neutral-900 dark:text-neutral-300 dark:border-white/10 dark:hover:bg-white/5 transition-all">
                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2.586a1 1 0 0 1-.293.707l-6.414 6.414a1 1 0 0 0-.293.707V17l-4 4v-6.586a1 1 0 0 0-.293-.707L3.293 7.293A1 1 0 0 1 3 6.586V4Z"/></svg>
                Filters
            </button>
            <button type="button" class="inline-flex items-center px-4 py-2.5 text-sm font-bold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-500/30 transition-all active:scale-95">
                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M12 5v14m7-7H5"/></svg>
                Add Guest
            </button>
        </div>
    </div>

    <div class="relative overflow-hidden bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-white/10 rounded-2xl shadow-sm transition-colors duration-300">
        
        <div id="loading-overlay" class="hidden absolute inset-0 z-10 flex items-center justify-center bg-white/50 dark:bg-neutral-900/50 backdrop-blur-[2px]">
            <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-indigo-600"></div>
        </div>

        <div class="overflow-x-auto max-h-[600px] scrollbar-thin scrollbar-thumb-neutral-200 dark:scrollbar-thumb-white/10">
            <table class="w-full text-sm text-left text-neutral-500 dark:text-neutral-400 border-collapse">
                <thead class="sticky top-0 z-20 text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-800/50 dark:text-neutral-300 backdrop-blur-md">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">
                            <div class="flex items-center cursor-pointer group hover:text-indigo-600 transition-colors">
                                Guest Name
                                <svg class="w-3 h-3 ms-1.5 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24"><path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Z"/></svg>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Event Date</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200 dark:divide-white/5">
                    <tr class="hover:bg-neutral-50 dark:hover:bg-white/5 transition-colors group">
                        <td class="px-6 py-4 font-medium text-neutral-900 dark:text-white whitespace-nowrap">
                            <div class="flex items-center">
                                <img class="w-9 h-9 rounded-lg" src="https://ui-avatars.com/api/?name=John+Doe&background=random" alt="">
                                <div class="ms-3">
                                    <div class="text-sm font-bold">Johnathan Doe</div>
                                    <div class="text-xs text-neutral-500">john@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-500/10 dark:text-green-400 border border-green-200 dark:border-green-500/20">
                                Checked In
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Feb 24, 2024</td>
                        <td class="px-6 py-4 text-right">
                            <button class="p-2 hover:bg-neutral-100 dark:hover:bg-white/10 rounded-lg transition-all text-neutral-400 hover:text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="empty-state" class="hidden flex flex-col items-center justify-center p-20 text-center">
            <div class="w-16 h-16 bg-neutral-100 dark:bg-white/5 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-8 4-8-4"/></svg>
            </div>
            <h3 class="text-lg font-bold text-neutral-900 dark:text-white">No guests found</h3>
            <p class="text-neutral-500 mt-1 max-w-xs">Try adjusting your filters or search terms to find what you're looking for.</p>
        </div>

        <div class="flex items-center justify-between px-6 py-4 bg-neutral-50/50 dark:bg-neutral-800/30 border-t border-neutral-200 dark:border-white/10">
            <span class="text-sm text-neutral-500 dark:text-neutral-400">
                Showing <span class="font-bold text-neutral-900 dark:text-white">1</span> to <span class="font-bold text-neutral-900 dark:text-white">10</span> of <span class="font-bold text-neutral-900 dark:text-white">45</span>
            </span>
            <div class="flex items-center gap-1">
                <button class="p-2 rounded-lg border border-neutral-200 dark:border-white/10 hover:bg-white dark:hover:bg-white/5 disabled:opacity-50 transition-all" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
                </button>
                <button class="px-3.5 py-1.5 rounded-lg text-sm font-bold bg-indigo-600 text-white shadow-sm">1</button>
                <button class="px-3.5 py-1.5 rounded-lg text-sm font-medium text-neutral-600 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-white/5 transition-all">2</button>
                <button class="p-2 rounded-lg border border-neutral-200 dark:border-white/10 hover:bg-white dark:hover:bg-white/5 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@stack('scripts')