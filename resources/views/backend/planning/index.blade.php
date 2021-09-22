@extends('layouts.app')

@section('content')
    @role('Admin')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Plannings</h2>
            </div>
        </div>
    <form action="{{ route('planning.DisplayPlanning') }}" method="get" class="form">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <select name="class_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dynamic" id="grid-state"
                    data-dependent="group_id">
                    <option value="">--Select Class--</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
                &nbsp;&nbsp;&nbsp;
            <div class="md:w-1/3">
                <select name="group_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 group_id" id="grid-state">

                </select>
            </div>
        </div>
    </form>
    @if($empty)
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3"></div>
                <div class="w-2/12 px-4 py-3">8:00/10:00</div>
                <div class="w-2/12 px-4 py-3">10:00/12:00</div>
                <div class="w-1/12 px-4 py-3"></div>
                <div class="w-2/12 px-4 py-3">14:00/16:00</div>
                <div class="w-2/12 px-4 py-3">16:00/18:00</div>
            </div>

            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Monday <br> <br> <br> <br> </div>
                @if($m8)
                <div class="w-2/12 px-4 py-3">Subject : {{$m8->Subjectname($m8->subject_id)}} <br>Teacher : {{$m8->TeacherName($m8->teacher_id)}} <br>Room : {{$m8->Roomname($m8->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$m8->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$m8->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button> 
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Monday' , 'time' => '8:00/10:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($m10)
                <div class="w-2/12 px-4 py-3">Subject : {{$m10->Subjectname($m10->subject_id)}} <br>Teacher : {{$m10->TeacherName($m10->teacher_id)}} <br>Room : {{$m10->Roomname($m10->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$m10->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$m10->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Monday' , 'time' => '10:00/12:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($m14)
                <div class="w-2/12 px-4 py-3">Subject : {{$m14->Subjectname($m14->subject_id)}} <br>Teacher : {{$m14->TeacherName($m14->teacher_id)}} <br>Room : {{$m14->Roomname($m14->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$m14->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$m14->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Monday' , 'time' => '14:00/16:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($m16)
                <div class="w-2/12 px-4 py-3">Subject : {{$m16->Subjectname($m16->subject_id)}} <br>Teacher : {{$m16->TeacherName($m16->teacher_id)}} <br>Room : {{$m16->Roomname($m16->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$m16->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$m16->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Monday' , 'time' => '16:00/18:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Tuesday <br> <br> <br> <br> </div>
                @if($t8)
                <div class="w-2/12 px-4 py-3">Subject : {{$t8->Subjectname($t8->subject_id)}} <br>Teacher : {{$t8->TeacherName($t8->teacher_id)}} <br>Room : {{$t8->Roomname($t8->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$t8->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$t8->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Tuesday' , 'time' => '8:00/10:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($t10)
                <div class="w-2/12 px-4 py-3">Subject : {{$t10->Subjectname($t10->subject_id)}} <br>Teacher : {{$t10->TeacherName($t10->teacher_id)}} <br>Room : {{$t10->Roomname($t10->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$t10->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$t10->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Tuesday' , 'time' => '10:00/12:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($t14)
                <div class="w-2/12 px-4 py-3">Subject : {{$t14->Subjectname($t14->subject_id)}} <br>Teacher : {{$t14->TeacherName($t14->teacher_id)}} <br>Room : {{$t14->Roomname($t14->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$t14->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$t14->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Tuesday' , 'time' => '14:00/16:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($t16)
                <div class="w-2/12 px-4 py-3">Subject : {{$t16->Subjectname($t16->subject_id)}} <br>Teacher : {{$t16->TeacherName($t16->teacher_id)}} <br>Room : {{$t16->Roomname($t16->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$t16->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$t16->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Tuesday' , 'time' => '16:00/18:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Wednesday <br> <br> <br> <br> </div>
                @if($w8)
                <div class="w-2/12 px-4 py-3">Subject : {{$w8->Subjectname($w8->subject_id)}} <br>Teacher : {{$w8->TeacherName($w8->teacher_id)}} <br>Room : {{$w8->Roomname($w8->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$w8->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$w8->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Wednesday' , 'time' => '8:00/10:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($w10)
                <div class="w-2/12 px-4 py-3">Subject : {{$w10->Subjectname($w10->subject_id)}} <br>Teacher : {{$w10->TeacherName($w10->teacher_id)}} <br>Room : {{$w10->Roomname($w10->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$w10->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$w10->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Wednesday' , 'time' => '10:00/12:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($w14)
                <div class="w-2/12 px-4 py-3">Subject : {{$w14->Subjectname($w14->subject_id)}} <br>Teacher : {{$w14->TeacherName($w14->teacher_id)}} <br>Room : {{$w14->Roomname($w14->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$w14->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$w14->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Wednesday' , 'time' => '14:00/16:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($w16)
                <div class="w-2/12 px-4 py-3">Subject : {{$w16->Subjectname($w16->subject_id)}} <br>Teacher : {{$w16->TeacherName($w16->teacher_id)}} <br>Room : {{$w16->Roomname($w16->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$w16->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$w16->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Wednesday' , 'time' => '16:00/18:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Thursday <br> <br> <br> <br> </div>
                @if($th8)
                <div class="w-2/12 px-4 py-3">Subject : {{$th8->Subjectname($th8->subject_id)}} <br>Teacher : {{$th8->TeacherName($th8->teacher_id)}} <br>Room : {{$th8->Roomname($th8->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$th8->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$th8->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Thursday' , 'time' => '8:00/10:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($th10)
                <div class="w-2/12 px-4 py-3">Subject : {{$th10->Subjectname($th10->subject_id)}} <br>Teacher : {{$th10->TeacherName($th10->teacher_id)}} <br>Room : {{$th10->Roomname($th10->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$th10->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$th10->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Thursday' , 'time' => '10:00/12:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($th14)
                <div class="w-2/12 px-4 py-3">Subject : {{$th14->Subjectname($th14->subject_id)}} <br>Teacher : {{$th14->TeacherName($th14->teacher_id)}} <br>Room : {{$th14->Roomname($th14->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$th14->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$th14->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Thursday' , 'time' => '14:00/16:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($th16)
                <div class="w-2/12 px-4 py-3">Subject : {{$th16->Subjectname($th16->subject_id)}} <br>Teacher : {{$th16->TeacherName($th16->teacher_id)}} <br>Room : {{$th16->Roomname($th16->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$th16->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$th16->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Thursday' , 'time' => '16:00/18:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Friday <br> <br> <br> <br> </div>
                @if($f8)
                <div class="w-2/12 px-4 py-3">Subject : {{$f8->Subjectname($f8->subject_id)}} <br>Teacher : {{$f8->TeacherName($f8->teacher_id)}} <br>Room : {{$f8->Roomname($f8->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$f8->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$f8->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Friday' , 'time' => '8:00/10:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($f10)
                <div class="w-2/12 px-4 py-3">Subject : {{$f10->Subjectname($f10->subject_id)}} <br>Teacher : {{$f10->TeacherName($f10->teacher_id)}} <br>Room : {{$f10->Roomname($f10->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$f10->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$f10->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Friday' , 'time' => '10:00/12:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($f14)
                <div class="w-2/12 px-4 py-3">Subject : {{$f14->Subjectname($f14->subject_id)}} <br>Teacher : {{$f14->TeacherName($f14->teacher_id)}} <br>Room : {{$f14->Roomname($f14->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$f14->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$f14->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Friday' , 'time' => '14:00/16:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
                @if($f16)
                <div class="w-2/12 px-4 py-3">Subject : {{$f16->Subjectname($f16->subject_id)}} <br>Teacher : {{$f16->TeacherName($f16->teacher_id)}} <br>Room : {{$f16->Roomname($f16->room_id)}} 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('planning.edit',$f16->id) }}">
                            <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('planning.destroy',$f16->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('planning.create',['day'=> 'Friday' , 'time' => '16:00/18:00' ,'class' => $cl , 'group' => $id]) }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">NEW</span>
                    </a>
                </div>
                </div>
                @endif
            </div>
           
        </div>
    @else
        <h2 class="text-gray-700 uppercase" style="margin:50px;">Pick a group</h2>
    @endif

    </div>
    @endrole 
    @role('Student')
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Planning</h2>
            </div>
        </div>
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3"></div>
                <div class="w-2/12 px-4 py-3">8:00/10:00</div>
                <div class="w-2/12 px-4 py-3">10:00/12:00</div>
                <div class="w-1/12 px-4 py-3"></div>
                <div class="w-2/12 px-4 py-3">14:00/16:00</div>
                <div class="w-2/12 px-4 py-3">16:00/18:00</div>
            </div>

            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Monday <br> <br> <br> <br> </div>
                @if($m8)
                <div class="w-2/12 px-4 py-3">
                Subject : {{$m8->Subjectname($m8->subject_id)}} <br>Teacher : {{$m8->TeacherName($m8->teacher_id)}} <br>Room : {{$m8->Roomname($m8->room_id)}}  
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($m10)
                <div class="w-2/12 px-4 py-3">Subject : {{$m10->Subjectname($m10->subject_id)}} <br>Teacher : {{$m10->TeacherName($m10->teacher_id)}} <br>Room : {{$m10->Roomname($m10->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($m14)
                <div class="w-2/12 px-4 py-3">Subject : {{$m14->Subjectname($m14->subject_id)}} <br>Teacher : {{$m14->TeacherName($m14->teacher_id)}} <br>Room : {{$m14->Roomname($m14->room_id)}} 
                   
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($m16)
                <div class="w-2/12 px-4 py-3">Subject : {{$m16->Subjectname($m16->subject_id)}} <br>Teacher : {{$m16->TeacherName($m16->teacher_id)}} <br>Room : {{$m16->Roomname($m16->room_id)}} 
                   
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Tuesday <br> <br> <br> <br> </div>
                @if($t8)
                <div class="w-2/12 px-4 py-3">Subject : {{$t8->Subjectname($t8->subject_id)}} <br>Teacher : {{$t8->TeacherName($t8->teacher_id)}} <br>Room : {{$t8->Roomname($t8->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($t10)
                <div class="w-2/12 px-4 py-3">Subject : {{$t10->Subjectname($t10->subject_id)}} <br>Teacher : {{$t10->TeacherName($t10->teacher_id)}} <br>Room : {{$t10->Roomname($t10->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($t14)
                <div class="w-2/12 px-4 py-3">Subject : {{$t14->Subjectname($t14->subject_id)}} <br>Teacher : {{$t14->TeacherName($t14->teacher_id)}} <br>Room : {{$t14->Roomname($t14->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($t16)
                <div class="w-2/12 px-4 py-3">Subject : {{$t16->Subjectname($t16->subject_id)}} <br>Teacher : {{$t16->TeacherName($t16->teacher_id)}} <br>Room : {{$t16->Roomname($t16->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Wednesday <br> <br> <br> <br> </div>
                @if($w8)
                <div class="w-2/12 px-4 py-3">Subject : {{$w8->Subjectname($w8->subject_id)}} <br>Teacher : {{$w8->TeacherName($w8->teacher_id)}} <br>Room : {{$w8->Roomname($w8->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($w10)
                <div class="w-2/12 px-4 py-3">Subject : {{$w10->Subjectname($w10->subject_id)}} <br>Teacher : {{$w10->TeacherName($w10->teacher_id)}} <br>Room : {{$w10->Roomname($w10->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($w14)
                <div class="w-2/12 px-4 py-3">Subject : {{$w14->Subjectname($w14->subject_id)}} <br>Teacher : {{$w14->TeacherName($w14->teacher_id)}} <br>Room : {{$w14->Roomname($w14->room_id)}} 
 
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($w16)
                <div class="w-2/12 px-4 py-3">Subject : {{$w16->Subjectname($w16->subject_id)}} <br>Teacher : {{$w16->TeacherName($w16->teacher_id)}} <br>Room : {{$w16->Roomname($w16->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Thursday <br> <br> <br> <br> </div>
                @if($th8)
                <div class="w-2/12 px-4 py-3">Subject : {{$th8->Subjectname($th8->subject_id)}} <br>Teacher : {{$th8->TeacherName($th8->teacher_id)}} <br>Room : {{$th8->Roomname($th8->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($th10)
                <div class="w-2/12 px-4 py-3">Subject : {{$th10->Subjectname($th10->subject_id)}} <br>Teacher : {{$th10->TeacherName($th10->teacher_id)}} <br>Room : {{$th10->Roomname($th10->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($th14)
                <div class="w-2/12 px-4 py-3">Subject : {{$th14->Subjectname($th14->subject_id)}} <br>Teacher : {{$th14->TeacherName($th14->teacher_id)}} <br>Room : {{$th14->Roomname($th14->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($th16)
                <div class="w-2/12 px-4 py-3">Subject : {{$th16->Subjectname($th16->subject_id)}} <br>Teacher : {{$th16->TeacherName($th16->teacher_id)}} <br>Room : {{$th16->Roomname($th16->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Friday <br> <br> <br> <br> </div>
                @if($f8)
                <div class="w-2/12 px-4 py-3">Subject : {{$f8->Subjectname($f8->subject_id)}} <br>Teacher : {{$f8->TeacherName($f8->teacher_id)}} <br>Room : {{$f8->Roomname($f8->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($f10)
                <div class="w-2/12 px-4 py-3">Subject : {{$f10->Subjectname($f10->subject_id)}} <br>Teacher : {{$f10->TeacherName($f10->teacher_id)}} <br>Room : {{$f10->Roomname($f10->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($f14)
                <div class="w-2/12 px-4 py-3">Subject : {{$f14->Subjectname($f14->subject_id)}} <br>Teacher : {{$f14->TeacherName($f14->teacher_id)}} <br>Room : {{$f14->Roomname($f14->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($f16)
                <div class="w-2/12 px-4 py-3">Subject : {{$f16->Subjectname($f16->subject_id)}} <br>Teacher : {{$f16->TeacherName($f16->teacher_id)}} <br>Room : {{$f16->Roomname($f16->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
           
        </div>
    @endrole 
    @role('Parent')
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Planning</h2>
            </div>
        </div>
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3"></div>
                <div class="w-2/12 px-4 py-3">8:00/10:00</div>
                <div class="w-2/12 px-4 py-3">10:00/12:00</div>
                <div class="w-1/12 px-4 py-3"></div>
                <div class="w-2/12 px-4 py-3">14:00/16:00</div>
                <div class="w-2/12 px-4 py-3">16:00/18:00</div>
            </div>

            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Monday <br> <br> <br> <br> </div>
                @if($m8)
                <div class="w-2/12 px-4 py-3">
                Subject : {{$m8->Subjectname($m8->subject_id)}} <br>Teacher : {{$m8->TeacherName($m8->teacher_id)}} <br>Room : {{$m8->Roomname($m8->room_id)}}  
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($m10)
                <div class="w-2/12 px-4 py-3">Subject : {{$m10->Subjectname($m10->subject_id)}} <br>Teacher : {{$m10->TeacherName($m10->teacher_id)}} <br>Room : {{$m10->Roomname($m10->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($m14)
                <div class="w-2/12 px-4 py-3">Subject : {{$m14->Subjectname($m14->subject_id)}} <br>Teacher : {{$m14->TeacherName($m14->teacher_id)}} <br>Room : {{$m14->Roomname($m14->room_id)}} 
                   
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($m16)
                <div class="w-2/12 px-4 py-3">Subject : {{$m16->Subjectname($m16->subject_id)}} <br>Teacher : {{$m16->TeacherName($m16->teacher_id)}} <br>Room : {{$m16->Roomname($m16->room_id)}} 
                   
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Tuesday <br> <br> <br> <br> </div>
                @if($t8)
                <div class="w-2/12 px-4 py-3">Subject : {{$t8->Subjectname($t8->subject_id)}} <br>Teacher : {{$t8->TeacherName($t8->teacher_id)}} <br>Room : {{$t8->Roomname($t8->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($t10)
                <div class="w-2/12 px-4 py-3">Subject : {{$t10->Subjectname($t10->subject_id)}} <br>Teacher : {{$t10->TeacherName($t10->teacher_id)}} <br>Room : {{$t10->Roomname($t10->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($t14)
                <div class="w-2/12 px-4 py-3">Subject : {{$t14->Subjectname($t14->subject_id)}} <br>Teacher : {{$t14->TeacherName($t14->teacher_id)}} <br>Room : {{$t14->Roomname($t14->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($t16)
                <div class="w-2/12 px-4 py-3">Subject : {{$t16->Subjectname($t16->subject_id)}} <br>Teacher : {{$t16->TeacherName($t16->teacher_id)}} <br>Room : {{$t16->Roomname($t16->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Wednesday <br> <br> <br> <br> </div>
                @if($w8)
                <div class="w-2/12 px-4 py-3">Subject : {{$w8->Subjectname($w8->subject_id)}} <br>Teacher : {{$w8->TeacherName($w8->teacher_id)}} <br>Room : {{$w8->Roomname($w8->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($w10)
                <div class="w-2/12 px-4 py-3">Subject : {{$w10->Subjectname($w10->subject_id)}} <br>Teacher : {{$w10->TeacherName($w10->teacher_id)}} <br>Room : {{$w10->Roomname($w10->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($w14)
                <div class="w-2/12 px-4 py-3">Subject : {{$w14->Subjectname($w14->subject_id)}} <br>Teacher : {{$w14->TeacherName($w14->teacher_id)}} <br>Room : {{$w14->Roomname($w14->room_id)}} 
 
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($w16)
                <div class="w-2/12 px-4 py-3">Subject : {{$w16->Subjectname($w16->subject_id)}} <br>Teacher : {{$w16->TeacherName($w16->teacher_id)}} <br>Room : {{$w16->Roomname($w16->room_id)}} 
                    
                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Thursday <br> <br> <br> <br> </div>
                @if($th8)
                <div class="w-2/12 px-4 py-3">Subject : {{$th8->Subjectname($th8->subject_id)}} <br>Teacher : {{$th8->TeacherName($th8->teacher_id)}} <br>Room : {{$th8->Roomname($th8->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($th10)
                <div class="w-2/12 px-4 py-3">Subject : {{$th10->Subjectname($th10->subject_id)}} <br>Teacher : {{$th10->TeacherName($th10->teacher_id)}} <br>Room : {{$th10->Roomname($th10->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($th14)
                <div class="w-2/12 px-4 py-3">Subject : {{$th14->Subjectname($th14->subject_id)}} <br>Teacher : {{$th14->TeacherName($th14->teacher_id)}} <br>Room : {{$th14->Roomname($th14->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($th16)
                <div class="w-2/12 px-4 py-3">Subject : {{$th16->Subjectname($th16->subject_id)}} <br>Teacher : {{$th16->TeacherName($th16->teacher_id)}} <br>Room : {{$th16->Roomname($th16->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Friday <br> <br> <br> <br> </div>
                @if($f8)
                <div class="w-2/12 px-4 py-3">Subject : {{$f8->Subjectname($f8->subject_id)}} <br>Teacher : {{$f8->TeacherName($f8->teacher_id)}} <br>Room : {{$f8->Roomname($f8->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($f10)
                <div class="w-2/12 px-4 py-3">Subject : {{$f10->Subjectname($f10->subject_id)}} <br>Teacher : {{$f10->TeacherName($f10->teacher_id)}} <br>Room : {{$f10->Roomname($f10->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                <div class="w-1/12 px-4 py-3"></div>
                @if($f14)
                <div class="w-2/12 px-4 py-3">Subject : {{$f14->Subjectname($f14->subject_id)}} <br>Teacher : {{$f14->TeacherName($f14->teacher_id)}} <br>Room : {{$f14->Roomname($f14->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
                @if($f16)
                <div class="w-2/12 px-4 py-3">Subject : {{$f16->Subjectname($f16->subject_id)}} <br>Teacher : {{$f16->TeacherName($f16->teacher_id)}} <br>Room : {{$f16->Roomname($f16->room_id)}} 

                </div>
                @else
                <div class="w-2/12 px-4 py-3">
                    <div class="flex flex-wrap items-center">
                        <p class="text-gray-700">Not set</p>
                    </div>
                </div>
                @endif
            </div>
           
        </div>
    @endrole 
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.dynamic').change(function () {
                var id=$(this).val();
               $.ajaxSetup({
                   headers:{
                       'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   type:'POST',
                   url:"{{ route('mark.fetch')}}",
                   datatype:'json',
                   data:{id:id},
                   success:function(data){
                       group = data['group'];
                       subject = data['subjects'];
                       txt = '<option value="">--Select Group--</option>';
                       for(var i=0;i<group.length;i++)
                       {
                           txt+='<option value="'+group[i].id+'">'+group[i].name+'</option>';
                       }
                       $('.group_id').html(txt);
                   },
                   error:function(data){
                       alert(data.responseJSON);
                   }
               });
            
        });
        $('.group_id').change(function () {
            $(".form").submit();
        });
    });
</script>
@endpush