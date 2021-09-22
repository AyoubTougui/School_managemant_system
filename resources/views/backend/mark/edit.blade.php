@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Edit Mark</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('mark.index') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>

        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('mark.update',$marks->id) }}" method="POST" class="w-full max-w-xl px-6 py-12">
                @csrf
                @method('PUT')

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Class name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                            <select name="class_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dynamic" id="grid-state"
                            data-dependent="group_id">
                                <option value="">--Select Class--</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name}}</option>
                                @endforeach
                            </select>
                        @error('name')
                            <p class="text-red-500 text-xs italic">Class name is required</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Group name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                            <select name="group_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 group_id" id="grid-state">
                               
                            </select>
                        @error('name')
                            <p class="text-red-500 text-xs italic">Group name is required</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                           Exams
                        </label>
                    </div>
                    <div class="md:w-2/3">
                            <select name="exam_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 exam_id" id="grid-state">
                               
                            </select>
                        @error('name')
                            <p class="text-red-500 text-xs italic">Exam is required</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                           Students
                        </label>
                    </div>
                    <div class="md:w-2/3">
                            <select name="student_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 student_id" id="grid-state">
                               
                            </select>
                        @error('name')
                            <p class="text-red-500 text-xs italic">Student is required</p>
                        @enderror
                    </div>
                </div>



               <!--  {{ csrf_field() }} -->

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Mark
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="mark"class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text">
                        @error('date')
                            <p class="text-red-500 text-xs italic">Mark is required</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Update Group
                        </button>
                    </div>
                </div>
            </form>        
        </div>
        
    </div>
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
                var id=$(this).val();

               $.ajaxSetup({
                   headers:{
                       'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   type:'POST',
                   url:"{{ route('mark.fetchGroup')}}",
                   datatype:'json',
                   data:{id:id},
                   success:function(data){ 
                       exam = data['exam'];
                       student = data['student'];
                       txt3 = '<option value="">--Select Exam--</option>';
                       for(var i=0;i<exam.length;i++)
                       {
                           txt3+='<option value="'+exam[i].id+'">'+exam[i].name+'</option>';
                       }
                       $('.exam_id').html(txt3);

                       txt4 = '<option value="">--Select Student--</option>';
                       for(var i=0;i<student.length;i++)
                       {
                           txt4+='<option value="'+student[i].id+'">'+student[i].name+'</option>';
                       }
                       $('.student_id').html(txt4);
                   },
                   error:function(data){
                       alert(data.responseJSON);
                   }
               });
            
        });
    });
</script>
@endpush