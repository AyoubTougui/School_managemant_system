@extends('layouts.app')

@section('content')
<div class="roles">

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-gray-700 uppercase font-bold">Create Planning</h2>
    </div>
    <div class="flex flex-wrap items-center">
        <a href="{{ route('planning.index') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
            <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
            <span class="ml-2 text-xs font-semibold">Back</span>
        </a>
    </div>
</div> 

<div class="table w-full mt-8 bg-white rounded">
    <form action="{{ route('planning.store',['class' => request()->query('class'),'group' => request()->query('group') , 'day' => request()->query('day') , 'time' => request()->query('time') ]) }}" method="POST" class="w-full max-w-xl px-6 py-12">
        @csrf
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Subject
                </label>
            </div>
            <div class="md:w-2/3">
                    <select name="subject_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 " id="grid-state"
                    >
                        <option value="">--Select Subject--</option>
                        @foreach ($subjects as $subject) 
                            <option value="{{ $subject->id }}">{{ $subject->name}}</option>
                        @endforeach
                    </select>
                @error('name')
                    <p class="text-red-500 text-xs italic">Subject is required</p>
                @enderror
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                Teacher
                </label>
            </div>
            <div class="md:w-2/3">
                    <select name="teacher_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 " id="grid-state"
                    >
                        <option value="">--Select Teacher--</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name}}</option>
                        @endforeach
                    </select>
                @error('name')
                    <p class="text-red-500 text-xs italic">Teacher is required</p>
                @enderror
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Class Room
                </label>
            </div>
            <div class="md:w-2/3">
                    <select name="room_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state"
                    >
                        <option value="">--Select Room--</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name}}</option>
                        @endforeach
                    </select>
                @error('name')
                    <p class="text-red-500 text-xs italic">Room is required</p>
                @enderror
            </div>
        </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Add Planning
                </button>
            </div>
        </div>
    </form>        
</div>

</div>
@endsection
